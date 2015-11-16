<?php namespace Fxweb\Http\Controllers\Client;

use Fxweb\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Http\Requests\Client\editUserRequest;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Redirect;

class UserController extends Controller
{
	protected $oUsers;

    public function __construct(
    Users $oUsers
    ) {
        $this->oUsers = $oUsers;
    }

    public function getProfiles(Request $oRequest) {

        $user = Sentinel::getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);

        $user_details = [
            'id' => $oRequest->edit_id,
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

        return view('client.user.detailsProfile')->with('user_details', $user_details);
    }

    public function getEditProfile(Request $oRequest) {

        $user = Sentinel::getUser();
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
        return view('client.user.editProfile')->with('userInfo', $userInfo);
    }

    public function postEditProfile(editUserRequest $oRequest) {
        $result = 0;

            $oRequest->edit_id = Sentinel::getUser()->id;
            $result = $this->oUsers->updateUser($oRequest);
                
        if ($result > 0) {    
           return Redirect::route('client.users.profile'); 
        } else {   
            return Redirect::route('clinet.editProfile')->withErrors($result);                  
        }
    }
        
}
