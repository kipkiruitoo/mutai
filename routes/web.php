<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hire', function () {
    return view('hire');
});
Route::redirect('/admin', '/admin/home', 301);
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('crm_statuses', 'Admin\CrmStatusesController');
    Route::post('crm_statuses_mass_destroy', ['uses' => 'Admin\CrmStatusesController@massDestroy', 'as' => 'crm_statuses.mass_destroy']);
    Route::resource('crm_customers', 'Admin\CrmCustomersController');
    Route::post('crm_customers_mass_destroy', ['uses' => 'Admin\CrmCustomersController@massDestroy', 'as' => 'crm_customers.mass_destroy']);
    Route::resource('crm_notes', 'Admin\CrmNotesController');
    Route::post('crm_notes_mass_destroy', ['uses' => 'Admin\CrmNotesController@massDestroy', 'as' => 'crm_notes.mass_destroy']);
    Route::resource('crm_documents', 'Admin\CrmDocumentsController');
    Route::post('crm_documents_mass_destroy', ['uses' => 'Admin\CrmDocumentsController@massDestroy', 'as' => 'crm_documents.mass_destroy']);



 
});
