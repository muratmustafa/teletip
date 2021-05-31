<?php

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

////////////////////////////////////////   U   S   E   R   ////////////////////////////////////////
Route::get('/login','Auth\UserLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
Route::get('/logout', 'Auth\UserLoginController@logout')->name('user.logout');
Route::get('/home', 'Auth\UserController@index')->name('user.home');

Route::middleware('auth:user')->name('user.')->group(function() {
    Route::get('/doctors','Dash\UserDashController@doctor_index')->name('doctors.index');
    Route::get('/doctors/{id}', 'Dash\UserDashController@doctor_show')->name('doctors.show');

    Route::get('/profile','Dash\UserDashController@profile_index')->name('profile.index');
    Route::post('/profile/{id}','Dash\UserDashController@profile_update')->name('profile.update');

    Route::get('/reports','Dash\UserDashController@report_index')->name('reports.index');
    Route::post('/upload/{id}', 'FileController@upload')->name('upload.post');

    Route::resource('appointments','AppointmentController');

    Route::prefix('appointments')->name('approval.')->group(function($id) {
        Route::get('{id}/approval/step-one', ['as' => 'step.one','uses' => 'ApprovalController@stepOne']);
        Route::post('{id}/approval/step-one', ['as' => 'step.one.post','uses' => 'ApprovalController@postStepOne']);

        Route::get('{id}/approval/step-two', ['as' => 'step.two','uses' => 'ApprovalController@stepTwo']);
        Route::post('{id}/approval/step-two', ['as' => 'step.two.post','uses' => 'ApprovalController@postStepTwo']);

        Route::get('{id}/approval/step-three', ['as' => 'step.three','uses' => 'ApprovalController@stepThree']);
        Route::post('{id}/approval/step-three', ['as' => 'step.three.post','uses' => 'ApprovalController@postStepThree']);

        Route::get('{id}/approval/step-last', ['as' => 'step.last','uses' => 'ApprovalController@stepLast']);
    });
});

////////////////////////////////////////   A   D   M   I   N   ////////////////////////////////////////
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

////////////////////////////////////////   D   O   C   T   O   R   ////////////////////////////////////////
Route::prefix('doctor')->name('doctor.')->namespace('Auth')->group(function() {
    Route::get('/login','DoctorLoginController@showLoginForm')->name('login');
    Route::post('/login', 'DoctorLoginController@login')->name('login.submit');
    Route::get('/logout', 'DoctorLoginController@logout')->name('logout');
    Route::get('/', 'DoctorController@index')->name('home');
});

Route::middleware('auth:doctor')->prefix('doctor')->name('doctor.')->group(function() {
    Route::get('/users','Dash\DoctorDashController@user_index')->name('users.index');
    Route::get('/users/{id}', 'Dash\DoctorDashController@user_show')->name('users.show');

    Route::get('/profile','Dash\DoctorDashController@profile_index')->name('profile.index');
    Route::post('/profile/{id}','Dash\DoctorDashController@profile_update')->name('profile.update');

    Route::get('/appointments/{id}/survey','Dash\DoctorDashController@survey_index')->name('survey.index');
    Route::post('/users/{id}/upload', 'FileController@upload')->name('upload.post');

    Route::resource('appointments','AppointmentController');

    Route::get('/appointments/create/{id}', function($id) {
        return view("doctor.appointments.create", ['id' => $id]);
    })->name('appt_create');
});
