<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as Withdrawal;
use Modules\Request\Entities\RequestChangeLeverage as ChangeLeverage;
use Modules\Request\Entities\RequestChangePassword as ChangePassword;
use Modules\Request\Entities\RequestAddAccount as addAccount;
use Modules\Request\Entities\RequestAssignAccount as AssignAccount;
use Fxweb\Repositories\Admin\User\EloquentUserRepository as Users;
use Input;

class RequestController extends Controller
{

    public function __construct(){

    }

    public function insertInternalTransferRequest($fromLogin, $toLogin,$server_id, $amount = 0, $comment = '', $reason = '', $status = 0)
    {
       $existResult= InternalTransfer::where([
           'from_login' => $fromLogin,
           'to_login' => $toLogin,
           'server_id'=>$server_id,
           'amount' => $amount,
           'status' => 0
       ])->get();
        if(count($existResult)){ return false;}

        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = new InternalTransfer();

        $log->create([
            'from_login' => $fromLogin,
            'to_login' => $toLogin,
            'server_id'=>$server_id,
            'amount' => $amount,
            'comment' => $comment,
            'reason' => $reason,
            'status' => $status
        ]);
        $log->save();
        return $log->id;


    }

    public function insertWithdrawalRequest($login,$server_id, $amount = 0, $comment = '', $reason = '', $status = 0)
    {
        $existResult= Withdrawal::where([
            'login' => $login,
            'server_id'=>$server_id,
            'amount' => $amount,
            'status' => 0
        ])->get();
        if(count($existResult)){ return false;}

        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);

        $log = new Withdrawal();

        $log->create([
            'login' => $login,
            'server_id'=>$server_id,
            'amount' => $amount,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        $log->save();
        return $log->id;


    }

    public function updateInternalTransferRequest($logId, $fromLogin, $toLogin, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = InternalTransfer::find($logId);

        $log->from_login = $fromLogin;
        $log->to_login = $toLogin;
        $log->amount = $amount;
        //	$log->comment=$comment;
        //	$log->reason=$reason;
        $log->status = $status;
        $log->save();
        return true;


    }

    public function updateWithdrawalRequest($logId, $login, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = Withdrawal::find($logId);


        $log->login = $login;
        $log->amount = $amount;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertChangeLeverageRequest($login,$server_id, $leverage, $comment = '', $reason = '', $status = 0)
    {
        $existResult= ChangeLeverage::where([
            'login' => $login,
            'server_id'=>$server_id,
            'leverage' => $leverage,
            'status' => 0
        ])->get();
        if(count($existResult)){ return false;}
        $log = new ChangeLeverage();

        $log->create([
            'login' => $login,
            'server_id'=>$server_id,
            'leverage' => $leverage,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);
$log->save();
        return $log->id;
    }

    public function updateChangeLeverageRequest($logId, $login, $leverage = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = ChangeLeverage::find($logId);


        $log->login = $login;
      //  $log->leverage = $leverage;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertChangePasswordRequest($login,$server_id, $newPassword, $passwordType,$comment = '', $reason = '', $status = 0)
    {

        $existResult= ChangePassword::where([

            'login' => $login,
            'server_id' => $server_id,
            'newPassword' => $newPassword,
            'password_type'=>$passwordType,
            'status' => 0
        ])->get();
        if(count($existResult)){ return false;}
        $log = new ChangePassword();

        $log->create([
            'login' => $login,
            'server_id' => $server_id,
            'newPassword' => $newPassword,
            'password_type'=>$passwordType,
            'comment'=>''.Input::get('comment'),
            //	'reason'=>$reason,
            'users_id'=>current_user()->getUser()->id,
            'status' => $status
        ]);
        $log->save();
        return $log->id;
    }

    public function updateChangePasswordRequest($logId, $login, $newPassword = 0, $comment = '', $reason = '', $status = 0,$passwordType)
    {


        $log = ChangePassword::find($logId);


        $log->login = $login;
     //   $log->newPassword = $newPassword;
        $log->status = $status;
        $log->password_type = $passwordType;

        $log->save();
        return $log->id;


    }


    public function insertMt4UserFullDetailsRequest($server_id,$mt4_user_details,$status=0,$accountId)
    {

        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $existResult= addAccount::where([

            'accountId' => $accountId,

            'status' => 0
        ])->get();
        if(count($existResult)){ return false;}


        $log = new addAccount();

        $log->create([
            'server_id'=>$server_id,
            'first_name' => $mt4_user_details['first_name'],
            'last_name' => $mt4_user_details['last_name'],
            'email' => $mt4_user_details['email'],
            'password' => $mt4_user_details['password'],
            'investor' => $mt4_user_details['investor'],
            'birthday' => $mt4_user_details['birthday'],
            'leverage' => $mt4_user_details['array_leverage'],
            'array_deposit' => $mt4_user_details['array_deposit'],
            'array_group' => $mt4_user_details['array_group'],
            'phone' => $mt4_user_details['phone'],
            'country' => $mt4_user_details['country'],
            'city' => $mt4_user_details['city'],
            'address' => $mt4_user_details['address'],
            'zip_code' => $mt4_user_details['zip_code'],
            'accountId'=>$accountId,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status'=>$status
        ]);


        $log->save();
        return $log->id;



    }


    public function updateMt4UserFullDetailsRequest($logId,$mt4_user_details,$status,$login,$accountId)
    {


        $log = addAccount::find($logId);

        $log->first_name=$mt4_user_details['first_name'];
        $log->last_name=$mt4_user_details['last_name'];
        $log->email=$mt4_user_details['email'];
        $log->password=$mt4_user_details['password'];
        $log->investor=$mt4_user_details['investor'];
        $log->birthday=$mt4_user_details['birthday'];
        $log->leverage=$mt4_user_details['leverage'];
        $log->array_deposit=$mt4_user_details['array_deposit'];
        $log->array_group=$mt4_user_details['array_group'];
        $log->phone=$mt4_user_details['phone'];
        $log->country=$mt4_user_details['country'];
        $log->city=$mt4_user_details['city'];
        $log->address=$mt4_user_details['address'];
        $log->zip_code=$mt4_user_details['zip_code'];
        $log->status=$status;
        $log->save();


        if($login>0 ){
            $user= new Users();
            $result=$user->asignMt4UsersToAccount($accountId, [$login],$mt4_user_details['server_id']);
           return ($result==true)? true:false;
        }
        return true;


    }

    public function insertAssignAccountRequest($login,$server_id, $password, $comment = '', $reason = '', $status = 0)
    { $user = current_user()->getUser();
        $existResult= AssignAccount::where([

            'accountId' => $user->id,

            'status' => 0
        ])->get();
        if(count($existResult)){ return false;}



        $log = new AssignAccount();

        $log->insert([
            'accountId'=>$user->id,
            'name'=>$user->first_name .' '.$user->last_name,
            'login' => $login,
            'server_id'=>$server_id,
            'password' => $password,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        return true;
    }

    public function updateAssignAccountRequest($logId, $login,$password, $comment = '', $reason = '', $status = 0)
    {


        $log = AssignAccount::find($logId);

        $log->login = $login;
        $log->password = $password;
        $log->status = $status;
        $log->save();
        return true;


    }

}