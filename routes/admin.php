<?php

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
// Route::get('/admin','HomeController@index')->name('admin');


Route::namespace('Auth')->group(function () {

    //Login Routes
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::resources([
    'settings'        => 'SettingController',
    'notifications'   => 'NotificationController',
    'faqs'            => 'FaqController',
    'logs'            => 'LogController',
    'sites'           => 'SiteSettingController',
    'faqs-category'  => 'FaqCategoryController',
    'project'  => 'ProjectController',
    'projectowner'            => 'ProjectOwnerController',
    'projectstatus'           => 'ProjectStatusController',
    'projecttype'  => 'ProjectTypeController',
    'client'  => 'ClientController',
    'business-category'  => 'BusinessCategoryController',
    'product-and-services' => 'ProductAndServiceController',


]);
Route::get('product-service-list', 'ProductAndServiceController@productServiceList');
Route::get('edit-pad/{id}', 'ProductAndServiceController@edit');
Route::post('update-pad', 'ProductAndServiceController@update');
Route::get('delete-pad/{id}', 'ProductAndServiceController@destroy');


Route::get('edit-project-type/{id}', 'ProjectTypeController@edit');
Route::post('update-project-type', 'ProjectTypeController@update');

Route::get('edit-business-category/{id}', 'BusinessCategoryController@edit');
Route::post('update-business-category', 'BusinessCategoryController@update');

Route::get('business-registration', 'SettingController@businessaccountindex');
Route::get('businessregistrationlist', 'SettingController@businessaccountlist');
Route::get('channel-partner', 'SettingController@channelPartner');
Route::get('channel-partnerlist', 'SettingController@channelpartenerlist');

Route::get('addto-channel/{id}', 'SettingController@addtoChannel');

Route::get('clientlist', 'ClientController@list');
Route::get('plan-service-list/{type}','ClientController@planAndServiceList');
Route::get('edit-client/{id}','ClientController@edit');
Route::post('update-client','ClientController@update');
Route::post('data-update','ClientController@updateData');
Route::get('get-partner','ClientController@getPartner');

Route::get('projectstatuslist', 'ProjectStatusController@list');
Route::get('projectstatusdelete/{id}', 'ProjectStatusController@destroy');
Route::get('projectstatusEdit/{id}', 'ProjectStatusController@edit');
Route::post('projectstatusUpdate', 'ProjectStatusController@update');

Route::get('projectownerlist', 'ProjectOwnerController@list');
Route::get('projectownerdelete/{id}', 'ProjectOwnerController@destroy');
Route::get('projectownerEdit/{id}', 'ProjectOwnerController@edit');
Route::post('projectownerUpdate', 'ProjectOwnerController@update');




Route::get('projecttypelist', 'ProjectTypeController@list');
Route::get('projecttypedelete/{id}', 'ProjectTypeController@destroy');

Route::get('projectlist', 'ProjectController@list');
Route::get('projectdelete/{id}', 'ProjectController@destroy');

Route::get('businesscategorylist', 'BusinessCategoryController@list');
Route::get('businesscategorydelete/{id}', 'BusinessCategoryController@destroy');

Route::get('/faqs/edit/{id}', 'FaqController@edit');
Route::post('/faqs/update/{id}', 'FaqController@update');
Route::get('/faqs-category/edit/{id}', 'FaqCategoryController@edit');
Route::post('/faqs-category/update/{id}', 'FaqCategoryController@update');
Route::post('/sites/update/{id}', 'SiteSettingController@update');
Route::post('/account/create', 'SettingController@accountCreate');
Route::post('/account/update', 'SettingController@accountUpdate');
Route::post('/map-settting/', 'SettingController@mapSetting');
Route::post('/seo-settting/', 'SettingController@seoSetting');
Route::post('/password-reset', 'SettingController@passwordReset');
Route::post('/email-settting', 'SettingController@emailSetting');
Route::post('/google', 'SettingController@googleSetting');
Route::post('/facebook/', 'SettingController@facebookSetting');
Route::post('/git', 'SettingController@gitSetting');
Route::post('/privacy-policy', 'SettingController@privacypolicySetting');
Route::post('/terms-condition', 'SettingController@termsconditionSetting');
Route::post('/comming-soon/', 'SettingController@commingsoonSetting');
Route::post('/contact-us', 'SettingController@contactsetting');
Route::post('/sms', 'SettingController@smssetting');
Route::post('/appsetting', 'SettingController@appSetting');

Route::get('send', 'NotificationSettingController@sendNotification');
Route::get('add-to-log', 'UserActivityController@myTestAddToLog');
Route::get('logActivity', 'UserActivityController@logActivity');
