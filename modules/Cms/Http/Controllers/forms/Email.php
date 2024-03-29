<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_emailtemplate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Mail;
class Email extends Controller
{


    protected $fromEmail = '';
    protected $fromName = '';

    public function __construct() {
        $this->fromEmail = env('FromEmail');
        $this->fromName = env('FromName');
    }

    public function sendEmail($sTemplate, $aTemplateVariables, $toEmail, $subject) {

        $toEmail=($toEmail=='')? config('fxweb.senderEmail'):$toEmail;

        $mail=cms_forms_emailtemplate::where(['alias'=>$sTemplate])->first();

        $emailBody='';
        if(count($mail)){

            $emailBody=$mail->template;

            foreach($aTemplateVariables as $key=>$value){

                $emailBody=preg_replace('/\{\{[\s]*\$'.$key.'[\s]*\}\}/i',
                    $value,
                    $emailBody);
            }
            if(preg_match('/\@/',$mail->admin_email)){
                $toEmail=$mail->admin_email;
            }else if($mail->admin_email != ''){
                $toEmail=$aTemplateVariables[$mail->admin_email];
            }

        }else{

            foreach($aTemplateVariables as $key=>$value){
                $emailBody.=$key.' : '.$value .'<br>' ;
            }
        }

        $toEmail=(preg_match('/\@/',$toEmail))?  $toEmail:config('fxweb.adminEmail');
        $info = [
            'to' => $toEmail,
            'subject' => ($subject=='')? $mail->name:$subject,
            'from' => $this->fromEmail,
            'fromName' => $this->fromName,
            'content'=>$emailBody
        ];

        if(isset($aTemplateVariables['pdfPath'])){
            $info['pdfPath']=$aTemplateVariables['pdfPath'];
        }
        Mail::raw($info['subject'], function ($message) use ($info)
        {
            $message->from(config('fxweb.senderEmail'), config('fxweb.displayName'));

           // $message->getHeaders()->addTextHeader('Content-type', 'text/html');
            $message->to($info['to']);
            $message->subject($info['subject']);
            if(array_key_exists('bcc' ,$info)){
                $message->bcc($info['bcc']);
            }

//            if(isset($info['pdfPath'])){
//
//                $message->attach($info['pdfPath'], array(
//                    'as' => 'live-account-form.pdf',
//                    'mime' => 'application/pdf'));
//            }
            $message ->setBody($info['content'], 'text/html');
        });


    }


public function sendFormEmail($formName,$variables,$clientEmail=''){
    $this->sendEmail('client_'.$formName, $variables, $clientEmail, '');
    $this->sendEmail('admin_'.$formName, $variables, config('fxweb.adminEmail'), '');
}


    function userLiveAccount($variables,$toEmail){

        $this->sendEmail('liveaccount', $variables, $toEmail, 'Live Account');
    }

    function sendDemoError($variables){

        $this->sendEmail('dummy template', $variables,  config('fxweb.adminEmail'), 'Demo account error');
    }
    function userDemoAccount($variables,$toEmail){

        $this->sendEmail('demoaccount', $variables, $toEmail, 'Demo Account');
    }

    function adminDemoAccount($variables,$toEmail)
    {
        $this->sendEmail('registrationdemoaccount', $variables, $toEmail, 'Registration Demo Account');
    }

    function adminLiveAccount($variables,$toEmail)
    {
        $this->sendEmail('registrationliveaccount', $variables, $toEmail, 'Registration Live Account');
    }

    function paymentSuccess($variables)
    {
        $this->sendEmail('paymentsuccess', $variables, config('fxweb.adminEmail'), 'Success payment');
    }

function contactus ($variables,$toEmail)
{
$this->sendEmail('contactus', $variables, $toEmail, 'Contact us');
}
    function referringpartner ($variables,$toEmail)
    {
        $this->sendEmail('referringpartner', $variables, $toEmail, 'Referring Partner,White Label,Money Managers');
    }

    function sendEditLiveEmail($oFormValues,$toEmail){

        $this->sendEmail('admin_editLiveAccount', $oFormValues, config('fxweb.adminEmail'), 'Client Edit live account');
        $this->sendEmail('client_editLiveAccount', $oFormValues,$toEmail, 'Thank you for update your info');
    }

    function sendChangeLiveStatus($oValues,$toEmail){
        if($oValues->status ==0){
            $this->sendEmail('client_liveFormNeedEdit', $oValues,$toEmail, 'Please update your live account form');
        }else if($oValues->status ==1){

            $this->sendEmail('client_liveFormApproved', $oValues,$toEmail, 'Your live account has been approved');
        }

    }

}
