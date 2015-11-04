<?php

/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function()
{
    Route::controller('settings','SettingsController',['getAdminsList'=>'admin.adminsList','getEditUser'=>'general.editUser']);
//	Route::get('/', [
//		'as' => 'admin.index',
//		'uses' => '@getAdminsList'
//	]);
});

