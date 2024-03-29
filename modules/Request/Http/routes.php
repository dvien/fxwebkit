<?php

Route::group(['prefix' => 'request', 'namespace' => 'Modules\Request\Http\Controllers'], function()
{
	Route::get('/', 'RequestController@index');
});


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'Modules\Request\Http\Controllers\admin'], function()
{

	Route::controller('request', 'RequestController', [
		'getIntenalTransferRequestList'=>'admin.request.internalTransfer',
		'getForwordIntenalTransferRequest'=>'admin.request.forwordInternalTransfer',
		'getIntenalTransferEdit'=>'admin.request.intenalTransferEdit',

		'getForwordWithdrawalRequest'=>'admin.request.forwordWithdrawal',
		'getWithdrawalEdit'=>'admin.request.withdrawalEdit',
		'getWithdrawalList'=>'admin.request.withdrawal',

		'getChangeLeverageRequestList'=>'admin.request.changeLeverage',
		'getForwordChangeLeverageRequest'=>'admin.request.forwordChangeLeverage',
		'getChangeLeverageEdit'=>'admin.request.changeLeveragetEdit',

		'getChangePasswordRequestList'=>'admin.request.changePassword',
		'getForwordChangePasswordRequest'=>'admin.request.forwordChangePassword',
		'getChangePasswordEdit'=>'admin.request.changePasswordEdit',


		'getAddAccountList'=>'admin.request.addAccount',
		'getForwordAddAccountRequest'=>'admin.request.forwordAddAccount',
		'getAddAccountEdit'=>'admin.request.addAccountEdit',


		'getAssignAccountRequestList'=>'admin.request.assignAccount',
		'getForwordAssignAccountRequest'=>'admin.request.forwordAssignAccount',
		'getAssignAccountEdit'=>'admin.request.assignAccountEdit',

		'getActivateUser'=>'admin.request.activateUser'


	]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'client', 'namespace' => 'Modules\Request\Http\Controllers\client'], function()
{

	Route::controller('client-request', 'RequestController', [
		'getPlanList'=>'client.ibportal.planList',

	]);
});