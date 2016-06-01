<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');

    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/project/new', 'ProjectController@create');
    Route::post('/admin/project/new', 'ProjectController@create');

    //project routes
    Route::get('/project/{id}', 'ProjectController@get');
    Route::get('/project/delete/{fase_id}', 'ProjectController@delete');
    Route::get('/project/update/{project_id}', 'ProjectController@getUpdate');
    Route::post('/project/update/{project_id}', 'ProjectController@update');

    //fase routes
    Route::post('/fase/new', 'ProjectFaseController@create');
    Route::post('/fase/{fase_id}', 'ProjectFaseController@update');
    Route::get('/fase/delete/{fase_id}', 'ProjectFaseController@delete');

    //media routes
    Route::post('/media/{fase_id}', 'ProjectMediaController@create');

    //vragen routes
    Route::get('/vraag/new', 'VragenController@create');
    Route::get('/vragen/export', 'VragenController@generateCsv');


    //antwoord routes
    Route::post('/antwoord', 'VragenController@answer');
    Route::post('/antwoord/{answer_id}', 'VragenController@answer');

    //JSON endpoints
    Route::get('/json/project/all', 'ProjectController@allJson');
    Route::get('/json/project/{project_id}', 'ProjectController@getProjectJson');
    Route::get('/json/media/all', 'ProjectMediaController@getJson');
    Route::get('/json/fases/all', 'ProjectFaseController@getJson');
    Route::get('/json/fases/{fase_id}', 'ProjectFaseController@getFaseJson');

    Route::get('/json/inspraakvraag/all/{fase_id}', 'VragenController@getAllJson');

    Route::get('/json/fases/active/{project_id}', 'ProjectFaseController@getCurrent');
    Route::get('/json/inspraakvragen/{fase_id}', 'VragenController@allQuestions');


    //Spel routes
    Route::get('/spel/genereervragen/{aantal_vragen}', 'VragenController@genereerVragen');
    Route::post('/spel/login', 'Auth\AuthController@authApp');

});
