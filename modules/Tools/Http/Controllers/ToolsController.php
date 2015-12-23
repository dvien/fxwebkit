<?php

namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Tools\Http\Requests\EditContractRequest;
use Modules\Tools\Http\Requests\AddContractRequest;
use Modules\Tools\Repositories\FutureContract as Future;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Http\Controllers\admin\Email;

class ToolsController extends Controller {

    public function index() {
        return view('tools::index');
    }

    protected $oFuture;
     protected $oUsers;

    public function __construct(
    Future $oFuture, Users $oUsers
    ) {
        $this->oFuture = $oFuture;
         $this->oUsers = $oUsers;
    }

    public function getFutureContract(Request $oRequest) {
        

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'all_groups' => true,
            'sort' => $sSort,
            'order' => $sOrder,
        ];

          if ($oRequest->has('deleteContract')) {
              
              $result = $this->oFuture->deleteContract($oRequest->contract_checkbox);
              
              return Redirect::route('tools.futureContract')->withErrors($result);
        }
        
        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['exchange'] = $oRequest->exchange;
             $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));
            $oResults = $this->oFuture->getContractByFilter($aFilterParams, false, $sOrder, $sSort, $role);
            
        }
  

        return view('tools::future_contract')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }
    
    public function getSendExpiryDate(Request $oRequest){
 
      
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'all_groups' => true,
            'sort' => $sSort,
            'order' => $sOrder,
        ];

          if ($oRequest->has('deleteContract')) {
              
              $result = $this->oFuture->deleteContract($oRequest->contract_checkbox);
              
              return Redirect::route('tools.futureContract')->withErrors($result);
        }
        
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['exchange'] = $oRequest->exchange;
            $aFilterParams['all_groups'] = (($oRequest->has('all_groups')) ? true : false);
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            

            $role = explode(',', Config::get('fxweb.client_default_role'));
            $expiryResults = $this->oFuture->sendExpiryNotificationsEmail();
            $userResults = $this->oUsers->getUsersEmail();

            $userArray = [];
            $expiryArray = [];
            
             $tabelHtml='';
             foreach ($expiryResults as $expiry)
             {
            
                $tabelHtml.='<tr><td>'.$expiry['expiry_date'].'</td><td>'.$expiry['symbol'].'</td></tr>';  
             }
                
           //     $email->newContract(['email'=>'maggalya09@gmail.com','name'=>'taylor','expiryHtml'=>$tabelHtml]);
         
             foreach ($userResults as $user)
             {  
                 //dd($user['email']);
                 $email=new Email();
             $email->newContract(['email'=>$user['email'],'name'=>$user['first_name'],'expiryHtml'=>$tabelHtml]);
             }
          
//        return view('tools::future_contract')
//                        ->with('oResults', $oResults)
//                        ->with('aFilterParams', $aFilterParams);
        
    }

        public function getMarketWatch() {
            return view('tools::marketWatch');
    }
     
    public function getAddContract(Request $oRequest) {
        
         $month_array = $this->oFuture->getMonth(null);
        $exchange_array = $this->oFuture->getExchange();
        $name_array = $this->oFuture->getName();
        

        $contractInfo = [ 'edit_id' => 0,
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'month_array' => $month_array,
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'aExchange'=>$exchange_array,
            'aName'=>$name_array,
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);


            $contractInfo = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'month_array' => $month_array,
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
                'aExchange'=>$exchange_array,
                 'aName'=>$name_array,
            ];
        }
        return view('tools::addContract')->with('contractInfo', $contractInfo);
    }

    public function postAddContract(AddContractRequest $oRequest) {

        $result = 0;
        
        $result = $this->oFuture->addContract($oRequest);
        
        if ($result > 0) {
               
            $oRequest->edit_id = $result;

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);

            $contract_details = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
            ];

        return Redirect::route('tools.futureContract');
        }
    }

    public function getEditContract(Request $oRequest) {
        
        $month_array = $this->oFuture->getMonth(null);
        $exchange_array = $this->oFuture->getExchange();
        $name_array = $this->oFuture->getName();
        
        
        $contractInfo = [ 'id' => '',
             'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'month_array' => $month_array,
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'aExchange'=>$exchange_array,
            'aName'=>$name_array,
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);


            $contractInfo = [
                'id' => $oRequest->edit_id,
               'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'month_array' => $month_array,
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
                'aExchange'=>$exchange_array,
                 'aName'=>$name_array,
            ];
        }
        return view('tools::editContract')->with('contractInfo', $contractInfo);
    }

    public function postEditContract(EditContractRequest $oRequest) {

        $result = 0;

        $result = $this->oFuture->updateContract($oRequest);

        if ($result > 0) {

            $oRequest->id = $result;

            $oResult = $this->oFuture->getContractDetails($oRequest->id);

            $contract_details = [

                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
            ];

         return Redirect::route('tools.futureContract');
        }
    }

    public function getDeleteContract(Request $oRequest) {
        $result = $this->oFuture->deleteContract($oRequest->delete_id);
        return Redirect::route('tools.futureContract')->withErrors($result);
    }

}
