<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Mail;

class Email extends Controller {

    protected $fromEmail = '';
    protected $fromName = '';

    public function __construct() {
        $this->fromEmail = env('FromEmail');
        $this->fromName = env('FromName');
    }

    public function sendEmail($sTemplate, $aTemplateVariables, $toEmail, $subject) {
        $info = [
            'to' => $toEmail,
            'subject' => $subject,
            'from' => $this->fromEmail,
            'fromName' => $this->fromName,
        ];
        Mail::send($sTemplate, $aTemplateVariables, function ($message) use ($info) {
            $message->from('m.hashim@mqplanet.com', 'Mqplanet');
            $message->to($info['to'])->subject($info['subject']);
        });
    }

    public function signUpWelcome($aUserInfo) {

        $this->sendEmail('admin.email.templates.en.signUpWelcome',
                [
                    'first_name' => $aUserInfo['first_name'],
                    'last_name' => $aUserInfo['last_name']
                ],
                $aUserInfo['email'], 
                'Welcome in Fxwebkit');
    }

    public function newContract($info) {

        $this->sendEmail('admin.email.templates.en.newContract',
            [
                'name' => $info['name'],
                'expiryHtml'=>$info['expiryHtml']
            ],
            $info['email'],
            'expiry symbols details');
    }

    public function massMailler($info) {


        Mail::raw($info['content'], function ($message) use ($info)
        {

            $message->from('m.hashim@mqplanet.com', 'Mqplanet');

            $message->to($info['email']);
        });



    }


    public function newUserSignUp($info) {


        $this->sendEmail('admin.email.templates.en.newUserSignUp',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'New User Sign Up');


    }


    public function activeAccount($info) {


        $this->sendEmail('admin.email.templates.en.activeAccount',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'Active Account');


    }

    public function forgetPassword($info) {


        $this->sendEmail('admin.email.templates.en.forgetPassword',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'Reset Password');


    }



    public function changeLeverage($info) {


        $this->sendEmail('admin.email.templates.en.changeLeverage',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'User change leverage');


    }



    public function changeMt4Password($info) {


        $this->sendEmail('admin.email.templates.en.changeMt4Password',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'Change Mt4 Password');


    }


    public function internalTransfers($info) {


        $this->sendEmail('admin.email.templates.en.internalTransfers',
            [
                'name' =>'',
                'expiryHtml'=>''
            ],
            $info['email'],
            'Internal Transfers');


    }




//
//Leverage
//Change Password
//Internal Transfer

}
