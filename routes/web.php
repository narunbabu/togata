<?php
Route::get('/', function () {
    return view('home.index');
});


// Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginUser']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'registerUser']);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
// Confirm Account
Route::get('/confirm/{code}',[App\Http\Controllers\UserController::class, 'confirmAccount']);
Route::post('/confirm/{code}',[App\Http\Controllers\UserController::class, 'confirmAccount']);

// Forgot Password
Route::get('/forgot/password',[App\Http\Controllers\UserController::class, 'forgotPassword']);
Route::post('/forgot/password',[App\Http\Controllers\UserController::class, 'forgotPassword']);


// Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
// Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
Route::get('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
Route::patch('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('auth.change_password_a');
// Route::prefix('/admin')->namespace('Admin')->group(function(){
//     Route::group(['middleware'=>['admin']], function(){

//         // //dashboard
//         // // Route::get('/dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
        
//         Route::get('/home',function (){return 'Hello';});
//         // //logout
//         // Route::get('/logout',[App\Http\Controllers\Admin\AdminController::class, 'logout']);
//         // // 
    
    
    
    
//         // //Product
    
    
    
//         // Route::get('/product',[App\Http\Controllers\Admin\ProductController::class, 'product']);
//         // Route::get('/delete-product/{id}',[App\Http\Controllers\Admin\ProductController::class, 'deleteProduct']);
//         // Route::get('/add-edit-product/{id?}',[App\Http\Controllers\Admin\ProductController::class, 'addEditProduct']);
//         // Route::post('/add-edit-product/{id?}',[App\Http\Controllers\Admin\ProductController::class, 'addEditProduct']);
    
    
//     });
// });

// Route::get('/', function () { return redirect('/admin/attendance'); });

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
// Route::post('login', 'Auth\LoginController@login')->name('auth.login');
// Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Route::post('/login', [Auth\LoginController::class, 'showLoginForm'])->name('auth.login');
// Route::post('/login', [Auth\LoginController::class, 'login'])->name('auth.login');

// // Change Password Routes...


// Route::get('/change_password', [Auth\ChangePasswordController::class, 'showChangePasswordForm']);
// Route::patch('/change_password', [Auth\ChangePasswordController::class, 'changePassword']);
// // Password Reset Routes...
// // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
// // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
// // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Route::get('/password/reset', [Auth\ForgotPasswordController::class, 'showLinkRequestForm']);
// Route::post('/password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail']);
// Route::get('/password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm']);
// Route::post('/password/reset', [Auth\ResetPasswordController::class, 'reset']);
// // Registration Routes..
// Route::get('/register', [Auth\RegisterController::class, 'showRegistrationForm']);
// Route::post('/register', [Auth\RegisterController::class, 'register']);
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
// Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    // Route::get('/home',function (){return 'Hello';});
    Route::get('/dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
    // Route::get('/dashboard',function(){return ['something'];});
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('expense_categories', 'Admin\ExpenseCategoriesController');
    Route::post('expense_categories_mass_destroy', ['uses' => 'Admin\ExpenseCategoriesController@massDestroy', 'as' => 'expense_categories.mass_destroy']);
    Route::resource('income_categories', 'Admin\IncomeCategoriesController');
    Route::post('income_categories_mass_destroy', ['uses' => 'Admin\IncomeCategoriesController@massDestroy', 'as' => 'income_categories.mass_destroy']);
    Route::resource('incomes', 'Admin\IncomesController');
    Route::post('incomes_mass_destroy', ['uses' => 'Admin\IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);
    Route::resource('expenses', 'Admin\ExpensesController');
    Route::post('expenses_mass_destroy', ['uses' => 'Admin\ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);
    Route::resource('monthly_reports', 'Admin\MonthlyReportsController');
    Route::resource('currencies', 'Admin\CurrenciesController');
    Route::post('currencies_mass_destroy', ['uses' => 'Admin\CurrenciesController@massDestroy', 'as' => 'currencies.mass_destroy']);
    Route::post('currencies_restore/{id}', ['uses' => 'Admin\CurrenciesController@restore', 'as' => 'currencies.restore']);
    Route::delete('currencies_perma_del/{id}', ['uses' => 'Admin\CurrenciesController@perma_del', 'as' => 'currencies.perma_del']);

    
    

 
});
//for ATTENDANCE routes

// Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function (){
//     Route::get('attendance/{id}/delete', 'AttendanceController@deleteAttendance')->name('deleteattendance');
//     Route::resource('attendance','AttendanceController');

//     Route::get('attendance','AttendanceController@index')->name('attendance');

//     Route::get('addAttendance','AttendanceController@addAttendance')->name('addAttendance');

    
//     Route::get('attendances','AttendanceController@all')->name('attendances');
// });
Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function (){
    Route::get('attendance/{id}/delete', 'AttendanceController@deleteAttendance')->name('deleteattendance');
    Route::resource('attendance','AttendanceController');
    // Route::resource('attendance', [App\Http\Controllers\Admin\AttendanceController::class, 'attendance']);
    // Route::get('attendance', [App\Http\Controllers\AttendanceController::class, 'index']);
    // Route::get('attendance','AttendanceController@index')->name('attendance');
    Route::get('attendance','AttendanceController@index')->name('attendance');

    Route::get('addAttendance','AttendanceController@addAttendance')->name('addAttendance');

    
    Route::get('attendances','AttendanceController@all')->name('attendances');

    // Route::get('attendance/details/{id}','AttendanceController@getAttendance');
    // Route::get('atedit/{id}','AttendanceController@editAttendance');
    // Route::get('attendance/delete/{id}','AttendanceController@deleteAttendance');
    

    Route::get('search','AttendanceController@searchAttendance')->name('search');
    

    Route::post('trytoaddattendance','AttendanceController@store')->name('trytoaddattendance');
    Route::post('trytoupdateattendance','AttendanceController@update')->name('trytoupdateattendance');
    Route::post('trytodeleteattendance','AttendanceController@delete')->name('trytodeleteattendance');
    Route::post('attendance/byDate','AttendanceController@searchByDate')->name('byDate');
    Route::post('attendance/byMonth','AttendanceController@searchByMonth');
    Route::post('attendance/byYear','AttendanceController@searchByYear');
    Route::post('attendance/byUsername','AttendanceController@searchByUsername');

// for EMPLOYEES routes
    Route::get('employees','EmployeesController@index')->name('employee');
    Route::get('addemployee','EmployeesController@addEmployee')->name('addemployee');
    Route::get('employee/details/{id}','EmployeesController@getEmployee');
    Route::get('employee/edit/{id}','EmployeesController@editEmployee');
    Route::get('employee/delete/{id}','EmployeesController@deleteEmployee');
    Route::post('trytoaddemployee','EmployeesController@create');
    Route::post('trytoupdateemployee',array('uses'=>'EmployeesController@update'));
    Route::post('trytodeleteemployee',array('uses'=>'EmployeesController@delete'));
    // Route::post('trytoaddtask','TasksController@create')->name('trytoaddtask');


//for TASKS routes
    Route::get('tasks','TasksController@index')->name('task');
    Route::get('addtask','TasksController@addTask')->name('addtask');
    Route::get('mytasks','TasksController@adminTasks')->name('mytask');
    
    Route::get('task/details/{id}','TasksController@getTask');
    Route::get('task/edit/{id}','TasksController@editTask');
    Route::get('task/delete/{id}','TasksController@deleteTask');

    Route::post('trytoaddtask','TasksController@create')->name('trytoaddtask');
    Route::post('trytoupdatetask',array('uses'=>'TasksController@update'))->name('trytoupdatetask');
    Route::post('trytoupdatemytask',array('uses'=>'TasksController@update'));
    Route::post('trytodeletetask',array('uses'=>'TasksController@delete'))->name('trytodeletetask');

});


