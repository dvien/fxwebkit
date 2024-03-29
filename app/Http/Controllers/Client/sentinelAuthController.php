<?php

namespace Fxweb\Http\Controllers\Client;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

//use Cartalyst\Sentinel\Users;
//use Guzzle\Http\Message\Request;
use Modules\Accounts\Entities\Users;
use Fxweb\Http\Controllers\Controller;
use Fxweb\Http\Requests\Client\LoginRequest;
use Fxweb\Http\Requests\Client\RegisterRequest;
use Exception,
    Sentinel,
    Lang,
    Redirect,
    Config,
    Log,
    Activation;
use Carbon\Carbon;
use Cartalyst\Sentinel\Addons\Social\Laravel\Facades\Social;
use Cartalyst\Sentinel\Addons\Social\Models\LinkInterface;
use Fxweb\Models\UsersDetails;
use Fxweb\Http\Controllers\Admin\Email;
use Fxweb\Http\Controllers\Admin\EmailController as Email2;
use Illuminate\Http\Request;

use Fxweb\Repositories\Admin\User\UserContract;

use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;
use Modules\Ibportal\Entities\IbportalAgentUser as AgentUser;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;

class AuthController extends Controller
{


    protected $oUsers;
    protected $oUserRepostry;

    public function __construct(
        Users $oUsers, UserContract $oUserRepostry
    )
    {
        $this->oUserRepostry = $oUserRepostry;
        $this->oUsers = $oUsers;
    }

    public function getLogin()
    {
        return view('client.user.login')
            ->with('random', rand(1, 3));
    }

    public function postLogin(LoginRequest $oRequest)
    {
        try {
            $oUser = Sentinel::authenticate([
                'email' => $oRequest->email,
                'password' => $oRequest->password,
            ]);
        } catch (ThrottlingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.LoginSuspended')]);
        } catch (NotActivatedException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.LoginNotActive')]);
        } catch (Exception $e) {
            Log::error('Login', ['context' => __FILE__ . ' : ' . __LINE__ . ' : ' . $e->getMessage()]);
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }

        if ($oUser) {
            return Redirect::intended('/client');
        } else {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
    }

    public function getLogout()
    {
        Sentinel::logout(null, true);
        return redirect()->route('client.auth.login');
    }

    public function getRegister(Request $request)
    {
        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);
        $country_array = $this->oUserRepostry->getCountry(null);

        $ibid = ($request->has('ibid')) ? $request->ibid : '';
        $planId = ($request->has('planId')) ? $request->planId : '';

        return view('client.user.register')
            ->with('default_birthday', $dt->format('Y/m/d'))
            ->with('country_array', $country_array)
            ->with('ibid', $ibid)
            ->with('planId', $planId)
            ->with('random', rand(1, 3));
    }

    public function postRegister(RegisterRequest $oRequest)
    {
        $oClientRole = Sentinel::findRoleBySlug(Config::get('fxweb.client_default_role'));
        $bAutoActivate = Config::get('fxweb.auto_activate_client');

        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        $ibid = ($oRequest->has('ibid')) ? $oRequest->ibid : '';
        $planId = ($oRequest->has('planId')) ? $oRequest->planId : '';


        if ($bAutoActivate) {

            $oUser = Sentinel::registerAndActivate($aCredentials);
            $oClientRole->users()->attach($oUser);
            Sentinel::login($oUser);
            $this->assignNewUserToAgent($ibid, $oUser->id, $planId);
            $aCredentialsFullDetails = [
                'users_id' => $oUser->id,
                'nickname' => $oRequest->nickname,
                'address' => $oRequest->address,
                'birthday' => $oRequest->birthday,
                'phone' => $oRequest->phone,
                'country' => $oRequest->country,
                'city' => $oRequest->city,
                'zip_code' => $oRequest->zip_code,
                'gender' => $oRequest->gender
            ];


            $details = new UsersDetails($aCredentialsFullDetails);
            $details->save();


            // TODO email template new way
//            $oEmail = new Email;
//            @$oEmail->signUpWelcome($aCredentials + $aCredentialsFullDetails);
//           @$oEmail->newUserSignUp(['adminEmail'=>config('fxweb.adminEmail')]+$aCredentials + $aCredentialsFullDetails);
            $email=new  Email2();
            $email->sendSignUp(['id'=> $oUser->id,'status'=>[1]]);

            if(config('accounts.denyLiveAccount')){
               $oUser->permissions = [
                   'user.denyLiveAccount' => true
               ];
                $oUser->save();}
            return redirect()->route('clinet.editProfile');
        } else {

            $oUser = Sentinel::register($aCredentials);
            $oClientRole->users()->attach($oUser);
            $oActivation = Activation::create($oUser);

            $this->assignNewUserToAgent($ibid, $oUser->id, $planId);

            $aCredentialsFullDetails = [
                'users_id' => $oUser->id,
                'nickname' => $oRequest->nickname,
                'address' => $oRequest->address,
                'birthday' => $oRequest->birthday,
                'phone' => $oRequest->phone,
                'country' => $oRequest->country,
                'city' => $oRequest->city,
                'zip_code' => $oRequest->zip_code,
                'gender' => $oRequest->gender
            ];

            $details = new UsersDetails($aCredentialsFullDetails);
            $details->save();

            // TODO email template new way
//            $oEmail = new Email;
//            @$oEmail->activeAccount(['email'=>$oRequest->email,
//                'code'=>$oActivation->code,
//                'userId'=>$oUser->id,
//            'website'=>$oRequest->root()
//            ]);
//            @$oEmail->newUserSignUp(['adminEmail'=>config('fxweb.adminEmail')]+$aCredentials + $aCredentialsFullDetails);


            $email=new  Email2();
            $email->sendSignUp(['id'=> $oUser->id,'status'=>[0,3]]);


            if(config('accounts.denyLiveAccount')){
            $oUser->permissions = [
                'user.denyLiveAccount' => true
            ];
                $oUser->save();}
            return redirect()->route('client.auth.login');
        }
    }

    private function assignNewUserToAgent($ibid, $newUserId, $planId)
    {
        if ($ibid != '') {
            $oAgent = UserIbid::where('user_ibid', $ibid)->first();
            if ($oAgent) {
                AgentUser::create([
                    'agent_id' => $oAgent->user_id,
                    'user_id' => $newUserId,
                    'plan_id' => $planId]);
            }
        }

    }

    public function getRecover()
    {
        return view('client.user.forgetPassword')
            ->with('random', rand(1, 3));
    }

    public function postRecover(Request $oRequest)
    {
        $message = trans('user.PleaseTryAgain');
        $credentials = [
            'login' => $oRequest->email,
        ];

        $user = Sentinel::findByCredentials($credentials);


        if ($user) {
            $oReminder = Reminder::create($user);

            if ($oReminder) {

                $oEmail = new Email();
                $oEmail->forgetPassword([
                    'userEmail' => $oRequest->email,
                    'code' => $oReminder->code,
                    'userId' => $user->id,
                    'website' => $oRequest->root()
                ]);

                $message = trans('user.checkEmailResetPassword');
            }

        } else {
            $message = trans('user.userNotExist');
        }
        return view('client.user.forgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function getResetForgetPassword($userId, $code)
    {

        return view('client.user.resetForgetPassword')
            ->with('random', rand(1, 3));
    }

    function postResetForgetPassword(Request $oRequest, $userId, $code)
    {
        $message = trans('user.PleaseTryAgain');
        $user = Sentinel::findById($userId);

        /* TODO validate password and confirm from Request not from code */

     if($oRequest->password ==$oRequest->confirmPassword && strlen($oRequest->password) > 7){
        if ($reminder = Reminder::complete($user, $code, $oRequest->password))
        {
            // Reminder was successfull
            return Redirect::route('client.auth.login');
        }
     }else{

         $message=trans('invalidPassord');
     }



        return view('client.user.resetForgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }


    function getActivateAccount(Request $oRequest,$userId,$code){
        $message=trans('PleaseTryAgain');
        $user = Sentinel::findById($userId);

        if (Activation::complete($user,$code)) {
            // Reminder was successfull
            return Redirect::route('client.auth.login');
        }


        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function postResendActivateEmail(Request $oRequest,$userId,$code){

        $oUser = Sentinel::findById($userId);
        $oActivation = Activation::create($oUser);



        $oEmail = new Email;
        @$oEmail->activeAccount(['email'=>$oUser->email,
            'code'=>$oActivation->code,
            'userId'=>$userId,
            'website'=>$oRequest->root()
        ]);

        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3));
    }


    public function getFacebookLogin()
    {

        Social::addConnection(Config('fxweb.facebookLoginProvider'), [
                'driver' => Config('fxweb.facebookLoginDriver'),
                'identifier' => Config('fxweb.facebookLoginIdentifier'),
                'app_id' => Config('fxweb.facebookLoginApp_id'),
                'secret' => Config('fxweb.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        $callback =Config('fxweb.facebookLoginCallback');
        $url = Social::getAuthorizationUrl('facebook', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getFacebookLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback =Config('fxweb.facebookLoginCallback');
        Social::addConnection(Config('fxweb.facebookLoginProvider'), [
                'driver' => Config('fxweb.facebookLoginDriver'),
                'identifier' => Config('fxweb.facebookLoginIdentifier'),
                'app_id' => Config('fxweb.facebookLoginApp_id'),
                'secret' => Config('fxweb.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        try {

            $user = Social::authenticate('facebook', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                Sentinel::login($user);
                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];
                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getGoogleLogin()
    {

        Social::addConnection(Config('fxweb.googleProvider'), [
                'driver' => Config('fxweb.googleDriver'),
                'identifier' => Config('fxweb.googleIdentifier'),
                'secret' => Config('fxweb.googleSecret'),
                'scopes' => ['email'],
            ]
        );

        $callback =Config('fxweb.googleCallback');
        $url = Social::getAuthorizationUrl('google', $callback);


        header('Location: ' . $url);
        exit;
    }

    public function getGoogleLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('fxweb.googleCallback');
        Social::addConnection(Config('fxweb.googleProvider'), [
                'driver' => Config('fxweb.googleDriver'),
                'identifier' => Config('fxweb.googleIdentifier'),
                'secret' => Config('fxweb.googleSecret'),
                'scopes' => ['email'],
            ]
        );
        try {

            $user = Social::authenticate('google', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getLinkedinLogin()
    {


        Social::addConnection(Config('fxweb.linkedinProvider'), [
                'driver' => Config('fxweb.linkedinDriver'),
                'identifier' =>Config('fxweb.linkedinIdentifier'),
                'secret' => Config('fxweb.linkedinSecret'),
            ]
        );

        $callback = Config('fxweb.linkedinCallback');
        $url = Social::getAuthorizationUrl('linkedin', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getLinkedinLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('fxweb.linkedinCallback');


        Social::addConnection(Config('fxweb.linkedinProvider'), [
                'driver' => Config('fxweb.linkedinDriver'),
                'identifier' =>Config('fxweb.linkedinIdentifier'),
                'secret' => Config('fxweb.linkedinSecret'),
            ]
        );
        try {

            $user = Social::authenticate('linkedin', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getTwitterLogin()
    {


        Social::addConnection('twitter', [
                'driver' => 'twitter',
                'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
                'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
                'scopes' => [],
            ]
        );

        $callback = 'http://localhost:8000/client/twitter-callback-login';
        $url = Social::getAuthorizationUrl('twitter', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getTwitterLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = 'http://localhost:8000/client/twitter-callback-login';


        Social::addConnection('twitter', [
                'driver' => 'twitter',
                'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
                'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
                'scopes' => [],
            ]
        );
        try {

            $user = Social::authenticate('twitter', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }




}
