<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/**
 *
 * Rotas do site (sem login)
 *
 */

Route::post('auth/login', 'api\\AuthController@login');
Route::post('auth/refresh', 'api\\AuthController@refresh');
Route::get('auth/logout', 'api\\AuthController@logout');


// Rota para cadastrar novos usuários (Pacientes, Médicos, Instituições)
Route::post('patient/users', 'api\\UserController@storePatient');
Route::post('customer/users', 'api\\UserController@storeCustomer');
Route::post('institution/users', 'api\\UserController@storeInstitution');



/**
 *
 * Rotas protegidas por Login e senha
 *
 */

Route::group(['middleware' => ['apiJWT']], function () {


    Route::post('auth/me', 'api\\AuthController@me');


    Route::get('admin/users', 'api\\UserController@index');
    Route::get('admin/users/{id}', 'api\\UserController@show');
    Route::post('admin/users', 'api\\UserController@store');

    /**
     *
     * Rotas de cadastros do ADMIN
     *
     */

    //Institution Type CRUD
    Route::get('admin/institutiontypes', 'api\\InstitutionTypesController@index');
    Route::get('admin/institutiontypes/{id}', 'api\\InstitutionTypesController@show');
    Route::put('admin/institutiontypes/{id}', 'api\\InstitutionTypesController@update');
    Route::post('admin/institutiontypes', 'api\\InstitutionTypesController@store');
    Route::delete('admin/institutiontypes/{id}', 'api\\InstitutionTypesController@destroy');

    //Specialization CRUD
    Route::get('admin/specialization', 'api\\SpecializationsController@index');
    Route::get('admin/specialization/{id}', 'api\\SpecializationsController@show');
    Route::put('admin/specialization/{id}', 'api\\SpecializationsController@update');
    Route::post('admin/specialization', 'api\\SpecializationsController@store');
    Route::delete('admin/specialization/{id}', 'api\\SpecializationsController@destroy');

    //Therapy CRUD
    Route::get('admin/therapy', 'api\\TherapiesController@index');
    Route::get('admin/therapy/{id}', 'api\\TherapiesController@show');
    Route::put('admin/therapy/{id}', 'api\\TherapiesController@update');
    Route::post('admin/therapy', 'api\\TherapiesController@store');
    Route::delete('admin/therapy/{id}', 'api\\TherapiesController@destroy');

    //Exam CRUD
    Route::get('admin/exam', 'api\\ExamsController@index');
    Route::get('admin/exam/{id}', 'api\\ExamsController@show');
    Route::put('admin/exam/{id}', 'api\\ExamsController@update');
    Route::post('admin/exam', 'api\\ExamsController@store');
    Route::delete('admin/exam/{id}', 'api\\ExamsController@destroy');

    //Status CRUD
    Route::get('admin/status', 'api\\StatusController@index');
    Route::get('admin/status/{id}', 'api\\StatusController@show');
    Route::put('admin/status/{id}', 'api\\StatusController@update');
    Route::post('admin/status', 'api\\StatusController@store');
    Route::delete('admin/status/{id}', 'api\\StatusController@destroy');

    //Terminology CRUD
    Route::get('admin/terminology', 'api\\TerminologiesController@index');
    Route::get('admin/terminology/{id}', 'api\\TerminologiesController@show');
    Route::put('admin/terminology/{id}', 'api\\TerminologiesController@update');
    Route::post('admin/terminology', 'api\\TerminologiesController@store');
    Route::delete('admin/terminology/{id}', 'api\\TerminologiesController@destroy');

    /**
     *
     * Rotas do cadastro ORG
     *
     */



     /**
     *
     * Rotas do cadastro Clientes
     *
     */



     /**
     *
     * Rotas do cadastro Pacientes
     *
     */



});

