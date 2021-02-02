<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'EssayController@getIndex',
    'as' => 'main.index'
]);

Route::get('/viewModal/{id}', [
    'uses' => 'EssayController@getEssayModal',
    'as' => 'essay.viewEssayModal'
]);

Route::get('/admin/controllAccount',[
    'uses' => 'UserController@getaccountController',
    'as' => 'admin.controllAccount'
]);

Route::post('/user/essay/add', [
    'uses' => 'EssayController@postAddEssay',
    'as' =>  'essay.addEssay'
]);

Route::delete('/user/essay/delete/{id}', [
    'uses' => 'EssayController@deleteEssay',
    'as' => 'essay.delete'
]);

Route::get('/user/essay/edit/{id}', [
    'uses' => 'EssayController@getEditEssay',
    'as' => 'essay.edit'
]);
Route::patch('/user/essay/edit/{id}', [
    'uses' => 'EssayController@patchEditEssay',
    'as' => 'essay.edit'
]);

Route::group(['prefix' => 'user'], function(){

    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signup/{isAdmin}', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        
        Route::post('/signup/{isAdmin}', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        
        
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
        
    });
    Route::get('/essay', [
        'uses' => 'EssayController@getManageEssay',
        'as' => 'user.essay'
    ]);
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        
        
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
    
});
