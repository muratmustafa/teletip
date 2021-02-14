<?php

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/login','Auth\UserLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
Route::get('/logout', 'Auth\UserLoginController@logout')->name('user.logout');
Route::get('/home', 'Auth\UserController@index')->name('user.home');

Route::middleware('auth:user')->name('user.')->namespace('My')->group(function() {
    //Route::resource('appointments.meeting','MeetingController')->shallow();
    Route::resource('appointments','MyAppointmentsController');
    Route::resource('doctors','MyDoctorsController');
    Route::resource('profile','ProfileController');

    Route::prefix('appointments')->name('approval.')->group(function($id) {
        Route::get('{id}/approval/step-one', ['as' => 'step.one','uses' => 'ApprovalController@stepOne']);
        Route::post('{id}/approval/step-one', ['as' => 'step.one.post','uses' => 'ApprovalController@postStepOne']);
        
        Route::get('{id}/approval/step-two', ['as' => 'step.two','uses' => 'ApprovalController@stepTwo']);
        Route::post('{id}/approval/step-two', ['as' => 'step.two.post','uses' => 'ApprovalController@postStepTwo']);
        
        Route::get('{id}/approval/step-three', ['as' => 'step.three','uses' => 'ApprovalController@stepThree']);
        Route::post('{id}/approval/step-three', ['as' => 'step.three.post','uses' => 'ApprovalController@postStepThree']);
    });
});

Route::prefix('admin')->name('admin.')->namespace('Auth')->group(function() {
    Route::get('/login','AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminLoginController@login')->name('login.submit');
    Route::get('/logout', 'AdminLoginController@logout')->name('logout');
    Route::get('/', 'AdminController@index')->name('home');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->namespace('Crud')->group(function() {
    Route::resource('appointments','AppointmentCrudController');

    Route::get('/appointments/create/{id}', function($id) {
        return view("admin.appointments.create", ['id' => $id]);
    })->name('appt_create');

    Route::resource('doctors','DoctorCrudController');
    Route::resource('users','UserCrudController');
});

Route::prefix('doctor')->name('doctor.')->namespace('Auth')->group(function() {
    Route::get('/login','DoctorLoginController@showLoginForm')->name('login');
    Route::post('/login', 'DoctorLoginController@login')->name('login.submit');
    Route::get('/logout', 'DoctorLoginController@logout')->name('logout');
    Route::get('/', 'DoctorController@index')->name('home');
});

Route::middleware('auth:doctor')->prefix('doctor')->name('doctor.')->namespace('My')->group(function() {
    //Route::resource('appointments.meeting','MeetingController')->shallow();
    Route::resource('appointments','MyAppointmentsController');

    Route::get('/appointments/create/{id}', function($id) {
        return view("doctor.appointments.create", ['id' => $id]);
    })->name('appt_create');

    Route::resource('users','MyUsersController');
    Route::resource('profile','ProfileController');

    Route::prefix('appointments')->name('survey.')->group(function($id) {
        Route::get('{id}/survey', ['as' => 'index','uses' => 'SurveyController@index']);
    });
});
