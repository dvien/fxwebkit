<?php namespace Fxweb\Http\Controllers\admin;

use Fxweb\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Http\Requests\Admin\EditUserRequest;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Fxweb\Http\Requests\Admin\ChangePasswordRequest;
use Redirect;

class UserController extends Controller
{
    protected $oUsers;

    public function __construct(
        Users $oUsers
    )
    {
        $this->oUsers = $oUsers;
    }

    public function getProfiles(Request $oRequest)
    {

        $user = current_user()->getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);
        

        $user_details = [
            'id' => $user->id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $this->oUsers->getCountry($oResult['country']),
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'gender' => $oResult['gender'],
        ];

        return view('admin.user.detailsProfile')->with('user_details', $user_details);
    }

    public function getEditProfile(Request $oRequest)
    {

        $user = current_user()->getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry(null);

        $userInfo = [
            'edit_id' => $user->id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'password' => '',
            'nickname' => $oResult['nickname'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            'country_array' => $country_array,
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'gender' => $oResult['gender'],
        ];

        return view('admin.user.editProfile')->with('userInfo', $userInfo);
    }

    public function postEditProfile(EditUserRequest $oRequest)
    {

        $result = 0;

        $oRequest->edit_id = current_user()->getUser()->id;
        $result = $this->oUsers->updateUser($oRequest);

        if ($result > 0) {

            $oRequest->edit_id = $result;

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

            $user_details = [
                'edit_id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'password' => '',
                'email' => $oResult['email'],
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender'],
            ];

            return Redirect::route('admin.users.profile')->with('user_details', $user_details);
        } else {
            return Redirect::route('general.editUser')->withErrors($result);
        }
    }

    public function getChangePassword()
    {
        $user = current_user()->getUser();

        $userInfo = [
            'edit_id'=>$user->id,
            'password' => '',
            'password_confirmation' =>'',
        ];
        return view('admin.user.changePassword')->with('userInfo', $userInfo);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {


        $result = $this->oUsers->changePassword($request);

        $userInfo = [
            'edit_id'=>'',
            'password' => '',
            'password_confirmation' =>'',
        ];

        \Session::flash('flash_success',trans('user.successfully'));

        return Redirect::route('admin.users.changePassword')->with('userInfo', $userInfo);
    }

}
