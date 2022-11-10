<?php

use App\Http\Controllers\Partner\DashboardController;
use App\Http\Controllers\Partner\ClientController;
use App\Http\Controllers\Partner\PartnerController;

Route::resources([
    'client'  => 'App\Http\Controllers\Partner\ClientController',
]);

//Dashboard
// Route::get('test', 'App\Http\Controllers\Partner\DashboardController@index');

//Client
Route::get('/add_client', 'App\Http\Controllers\Partner\ClientController@create');

Route::group(['prefix' => 'partner'], function(){
    Route::controller(DashboardController::class)->group(function()
    {
        Route::get('dashboard','index')->name('dashboard');
        Route::get('leads','showLeads')->name('leads');
    });

    Route::controller(PartnerController::class)->group(function()
    {
        Route::get('list-leads','index')->name('list-leads');
        Route::get('edit-lead','editLead')->name('edit-lead');
        Route::post('update-lead','updateLead')->name('update-lead');
        Route::post('list-service-plans','listServicePlans')->name('list-service-plans');
        Route::get('leads','showLeads')->name('display-leads');
        Route::post('create-lead','createLead')->name('create-lead');
    });
});