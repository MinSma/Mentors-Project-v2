<?php

// Mentors
Route::get('mentors/', 'MentorsController@index')->name('mentors.index')->middleware('auth');
Route::get('mentors/{mentor}/block', 'MentorsController@block')->name('mentors.block')->middleware('auth');
Route::get('mentors/appointments', 'MentorsController@appointments')->name('mentors.appointments');
Route::get('mentors/students', 'MentorsController@students')->name('mentors.students')->middleware('auth:mentor');
Route::get('mentors/dashboard', 'MentorsController@dashboard')->name('mentors.dashboard')->middleware('auth:mentor');
Route::get('mentors/dashboard/change',
    'MentorsController@changePassword')->name('mentors.changePassword')->middleware('auth:mentor');
Route::get('mentors/{mentor}/touch-mentors',
    'MentorsController@touchMentors')->name('mentors.touchMentors')->middleware('auth:student');
Route::post('mentors/dashboard/change',
    'MentorsController@storePassword')->name('mentors.storePassword')->middleware('auth:mentor');
Route::get('mentors/create', 'MentorsController@create')->name('mentors.create');
Route::get('mentors/{mentor}/', 'MentorsController@show')->name('mentors.show');
Route::group(['middleware' => ['auth' || 'auth:mentor']], function () {
    Route::get('mentors/{mentor}/edit', 'MentorsController@edit')->name('mentors.edit');
    Route::get('mentors/{mentor}/block', 'MentorsController@block')->name('mentors.block');
});
Route::post('mentors/', 'MentorsController@store')->name('mentors.store');
Route::post('mentors/{mentor}/block', 'MentorsController@blockStore')->name('mentors.blockStore')->middleware('auth');
Route::post('mentors/{mentor}/send', 'MentorsController@touchMentorsSend')
    ->name('mentors.touchMentorsSend');
Route::put('mentors/{mentor}/update', 'MentorsController@update')->name('mentors.update');
Route::delete('mentors/{mentor}/delete', 'MentorsController@destroy')->name('mentors.delete')->middleware('auth');

// Students
Route::get('students/', 'StudentsController@index')->name('students.index')->middleware('auth');
Route::get('students/{student}/block', 'StudentsController@block')->name('students.block')->middleware('auth');
Route::get('students/mentors', 'StudentsController@mentors')->name('students.mentors')->middleware('auth:student');
Route::get('students/dashboard',
    'StudentsController@dashboard')->name('students.dashboard')->middleware('auth:student');
Route::get('students/dashboard/change',
    'StudentsController@changePassword')->name('students.changePassword')->middleware('auth:student');
Route::post('students/dashboard/change',
    'StudentsController@storePassword')->name('students.storePassword')->middleware('auth:student');
Route::get('students/create', 'StudentsController@create')->name('students.create');
Route::get('students/{student}/', 'StudentsController@show')->name('students.show');
Route::group(['middleware' => ['auth' || 'auth:student']], function () {
    Route::get('students/{student}/edit', 'StudentsController@edit')->name('students.edit');
    Route::get('students/{student}/block', 'StudentsController@block')->name('students.block');
});
Route::post('students/', 'StudentsController@store')->name('students.store');
Route::post('students/{student}/block', 'StudentsController@blockStore')->name('students.blockStore')->middleware('auth');
Route::put('students/{student}/update', 'StudentsController@update')->name('students.update');
Route::delete('students/{student}/delete', 'StudentsController@destroy')->name('students.delete')->middleware('auth');

// Users
Route::get('users/studentsAskings', 'UsersController@askings')->name('users.askings')->middleware('auth');
Route::get('users/{bankAccount}/askings', 'UsersController@confirmAskings')->name('users.confirmAskings')->middleware('auth');
Route::get('users/', 'UsersController@index')->name('users.index')->middleware('auth');
Route::get('users/dashboard', 'UsersController@dashboard')->name('users.dashboard')->middleware('auth');
Route::get('users/dashboard/change',
    'UsersController@changePassword')->name('users.changePassword')->middleware('auth');
Route::post('users/dashboard/change', 'UsersController@storePassword')->name('users.storePassword')->middleware('auth');
Route::get('users/create', 'UsersController@create')->name('users.create');
Route::get('users/{user}/', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit')->middleware('auth');
Route::post('users/', 'UsersController@store')->name('users.store');
Route::put('users/{user}/update', 'UsersController@update')->name('users.update')->middleware('auth');
Route::delete('users/{user}/delete', 'UsersController@destroy')->name('users.delete')->middleware('auth');

// Login routing
Route::get('login/', 'LoginController@index')->name('login');
Route::get('login/disconnect', 'LoginController@disconnect')->name('login.disconnect');
Route::post('login/connect', 'LoginController@connect')->name('login.connect');
Route::get('/registerSelection', 'LoginController@registerSelection')->name('registerSelection');

// Guest routing
Route::get('/', 'AppearanceController@home')->name('guestPages.home');

// Conctact up routing
Route::get('/contactus', 'ContactsController@show');
Route::post('/contactus', 'ContactsController@mailToAdmin');

// Comments routing
Route::post('mentors/{mentor}/comment', 'CommentsController@store')->name('comments.store');
Route::delete('comments/{comment}', 'CommentsController@destroy')->name('comments.delete')->middleware('auth');

// Reservation routing
Route::get('mentors/{appointment}/reservation', 'ReservationsController@store')->name('reservation.store');
Route::get('mentors/{reservation}/confirm', 'ReservationsController@confirm')->name('reservations.confirm');
Route::get('reservations/students', 'ReservationsController@showForStudents')->name('reservations.showForStudents');
Route::get('mentors/{mentor}/unreservation', 'ReservationsController@unstore')->name('reservation.unstore');
Route::get('/reservations/dashboard', 'ReservationsController@show')->name('reservations.dashboard');
Route::delete('reservations/{reservation}/delete', 'ReservationsController@destroy')->name('reservations.delete');


// Rating routing
Route::get('mentors/{mentor}/resetrating', 'MentorsController@resetRating')->name('mentors.resetRating')->middleware('auth');
Route::post('mentors/{mentor}/rating', 'RatingsController@store')->name('rating.store');

// Lessons routing
Route::get('/lessons/dashboard', 'LessonsController@showLessons')->name('lessons.dashboard');
Route::get('/lessons/students-lessons', 'LessonsController@showForStudents')->name('lessons.showForStudents');
Route::get('/lessons/create', 'LessonsController@create')->name('lessons.create');
Route::post('/lessons', 'LessonsController@store')->name('lessons.store');
Route::delete('lessons/{lesson}/delete', 'LessonsController@destroy')->name('lessons.delete');
Route::get('lessons/search', 'LessonsController@search')->name('lessons.search');
Route::get('lessons/found', 'LessonsController@found')->name('lessons.found');


// Appointments routing
Route::get('/appointments/dashboard', 'AppointmentsController@show')->name('appointments.dashboard');
Route::get('/appointments/create/{lesson}', 'AppointmentsController@create')->name('appointments.create');
Route::group(['middleware' => ['auth' || 'auth:student']], function () {
    Route::get('appointments/{appointment}/edit', 'AppointmentsController@edit')->name('appointments.edit');
});
Route::post('/appointments', 'AppointmentsController@store')->name('appointments.store');
Route::put('appointments/{appointment}/update', 'AppointmentsController@update')->name('appointments.update');
Route::delete('appointments/{appointment}/delete', 'AppointmentsController@destroy')->name('appointments.delete');


Route::get('/payments/pay', 'BankAccountController@showPaymentForm')->name('payments.paymentForm');
Route::post('/payments/ask', 'BankAccountController@ask')->name('payments.ask');

Route::get('/invoices/{reservation}/pay', 'InvoicesController@pay')->name('invoices.pay');
