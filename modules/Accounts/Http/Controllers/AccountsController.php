<?php

namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Accounts\Http\Requests\AccountsRequest;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AccountsController extends Controller {

    /**
     * @var Mt4Group
     */
    protected $oUsers;

    public function __construct(
    Users $oUsers, Mt4User $oMt4User
    ) {
        $this->oUsers = $oUsers;

        $this->oMt4User = $oMt4User;
    }

    public function index() {
        return view('accounts::index');
    }

    public function getAccountsList(AccountsRequest $oRequest) {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];




        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->oUsers->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);
        }



        return view('accounts::accountsList')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getEditAccount(Request $oRequest) {
        

        if ($oRequest->has('delete_id')) {
            $result = $this->oUsers->deleteUser($oRequest->delete_id);
            return Redirect::route('accounts.accountsList')->withErrors($result);
        }
     $userInfo = [  'edit_id'=>0,
            'first_name' => '',
            'last_name' => '',
            'password'=>'',
            'email' => '',
            'nickname' => '',
            'location' => '',
            'birthday' =>'',
            'phone' => '',
            'country' => '',
            'city' => ''];
        
        if ($oRequest->has('edit_id')) {
             $oResult=$this->oUsers->getUserDetails($oRequest->edit_id);
             $countryName=$this->oUsers->getCountry($oResult['country']);
           
            $userInfo = [
            'edit_id' => $oRequest->edit_id,      
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'password'=>'',
            'nickname' => $oResult['nickname'],
            'location' => $oResult['location'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $countryName,
            'city' => $oResult['city'],
                ];
        }

        return view('accounts::addAccount')->with('userInfo', $userInfo);
    }

    public function postEditAccount(AddUserRequest $oRequest) {
        
        $result = false;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {
            $result = $this->oUsers->updateUser($oRequest);
        } else {
            $role = explode(',', Config::get('fxweb.client_default_role'));
            $result = $this->oUsers->addUser($oRequest, $role);
        }

        if ($result === true) {
            return Redirect::route('accounts.accountsList');
        } else {
            return view('accounts::addAccount')
                            ->withErrors($resultMessage)
                            ->withErrors($result)
                            ->with('userInfo', [
                                'edit_id' => $oRequest->edit_id,
                                'first_name' => $oRequest->first_name,
                                'last_name' => $oRequest->last_name,
                                'email' => $oRequest->email,
                                'password' => $oRequest->password
                                    ]);
        }
    }

    public function getAsignMt4Users(Request $oRequest) {
        $account_id = $oRequest->account_id;

        $oGroups = $this->oMt4User->getAllGroups();
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'name' => '',
            'all_groups' => true,
            'group' => '',
            'sort' => $sSort,
            'order' => $sOrder,
            'signed' => 1,
            'account_id' => $account_id,
        ];

        foreach ($oGroups as $oGroup) {
            $aGroups[$oGroup->group] = $oGroup->group;
        }



        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['signed'] = $oRequest->signed;
            $aFilterParams['account_id'] = $account_id;
            $aFilterParams['order'] = $oRequest->order;
        }

        $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, $sOrder, $sSort);

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, true, $sOrder, $sSort);
            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Login'),
                trans('reports::reports.Name'),
                trans('reports::reports.Group'),
                trans('reports::reports.Equity'),
                trans('reports::reports.Balance'),
                trans('reports::reports.Comments')
            ];

            foreach ($oResults as $oResult) {
                $aData[] = [
                    $oResult->LOGIN,
                    $oResult->NAME,
                    $oResult->GROUP,
                    $oResult->EQUITY,
                    $oResult->BALANCE,
                    $oResult->COMMENTS,
                ];
            }
            $oExport = new Export($aHeaders, $aData);
            return $oExport->export($sOutput);
        }

        return view('accounts::fastAsignMt4Users')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('account_id', $account_id)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function postAsignMt4Users(Request $oRequest) {
        if ($oRequest->has('asign_mt4_users_submit')|| $oRequest->has('asign_mt4_users_submit_id')) {

            $users_checkbox =($oRequest->has('asign_mt4_users_submit_id'))? [$oRequest->get('asign_mt4_users_submit_id')]:$oRequest->users_checkbox;
            
            $account_id = $oRequest->account_id;
            $this->oUsers->asignMt4UsersToAccount($account_id, $users_checkbox);
return $this->getAsignMt4Users($oRequest);
            return Redirect::route('accounts.asignMt4Users')->with('account_id', $account_id);
        }

        if ($oRequest->has('un_sign_mt4_users_submit') || $oRequest->has('un_sign_mt4_users_submit_id')) {

            $users_checkbox =($oRequest->has('un_sign_mt4_users_submit_id'))? [$oRequest->get('un_sign_mt4_users_submit_id')]:$oRequest->users_checkbox;
            
            $account_id = $oRequest->account_id;
            $this->oUsers->unsignMt4UsersToAccount($account_id, $users_checkbox);
            
            return $this->getAsignMt4Users($oRequest);
            return Redirect::route('accounts.asignMt4Users')->with('account_id', $account_id);
        }
    }
    
    public function getDetailsAccount(Request $oRequest)
    {
        $oResult=$this->oUsers->getUserDetails($oRequest->edit_id);
        
        $user_detalis=[
            'id'=>$oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'location' => $oResult['location'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            'city' => $oResult['city'],
    ];
        
        return view('accounts::detailsAccount')->with('user_detalis',$user_detalis);
    }
    
    public function getEditClientInfo(Request $oRequest)
    { 
        
        $userInfo = [  'edit_id'=>0,
            'first_name' => '',
            'last_name' => '',
            'password'=>'',
            'email' => '',
            'nickname' => '',
            'location' => '',
            'birthday' =>'',
            'phone' => '',
            'country' => '',
            'city' => ''];
        if ($oRequest->has('edit_id')) {
            
            $oResult=$this->oUsers->getUserDetails($oRequest->edit_id);
         
            $userInfo = [
            'edit_id'=>$oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'password'=>'',
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'location' => $oResult['location'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            'city' => $oResult['city'],
                ];
        }

        return view('accounts::addAccount')->with('userInfo', $userInfo);
    }

}
