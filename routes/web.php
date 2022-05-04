<?php

use Illuminate\Support\Facades\Route;


 Auth::routes();
// UserAccountController ROUTES

Route::get('pradmin/musuem', 'MuseumRecordController@index');
Route::get('/pradmin','MuseumRecordController@home')->name('pradmin')->middleware('pradmin');
Route::get('pradmin/musuem/create','MuseumRecordController@create');
Route::get('pradmin/musuem/{id}/edit','MuseumRecordController@edit')->name('editMuseumPost');


Route::get('/pradmin/posts', 'EventController@index')->name('events');
Route::get('pradmin/posts/create','EventController@create');
Route::get('pradmin/posts/{id}/edit','EventController@edit')->name('editPost');

Route::resource('musuem','MuseumRecordController');
Route::resource('posts','EventController');



Route::get('/events', 'PagesController@event');
Route::get('/museum', 'PagesController@museum');



Route::controller(PagesController::class)->group(function(){
    Route::get('/','index');
    Route::get('/about','about');
    Route::get('/events/upcomingevent','events');
    Route::get('/events/pastevent','events');
    Route::get('/museum','museum');
    Route::get('/contact','contactus');
});

//MemberController Routing

Route::get('/member','MemberController@home')->name('member-mgr')->middleware('memberadmin');
Route::get('/register','MemberController@register')->name('register');
Route::get('/user/donate','MemberController@donate')->name('donate');
Route::get('/user/promise_status','MemberController@status')->name('status');
Route::get('users/updateUserProfile/{id}','MemberController@edit')->name('editMember');
Route::resource('member/manage-members', MemberController::class);


//  AdminController
Route::get('managers/updateProfile/{id}','AdminController@edit')->name('editAdmin');
Route::resource('admin/managemgrs', AdminController::class);
Route::get('/admin','AdminController@home')->name('admin')->middleware('super');


Route::controller(UserAccountController::class)->group(function(){
    Route::get('/user','user')->name('user')->middleware('member');
    Route::post('/login', 'login')->name('login');
});

//Church Profile Routing
Route::resource('/pradmin/church_profile', ChurchProfileController::class);

//Education Material Controller Routes
Route::get('user/books','EducMaterialController@displayBooks');
Route::get('user/articles','EducMaterialController@displayArticles');
Route::get('user/books/{id}','EducMaterialController@download')->name('download');
Route::get('/educAdmin','EducMaterialController@home')->name('educmgr')->middleware('educadmin');
Route::resource('/educAdmin/educ_material', EducMaterialController::class);

// Tithe Routing
Route::resource('financeAdmin/tithe', TitheController::class);
Route::get('/financeAdmin','TitheController@home')->name('financemgr')->middleware('financeadmin');;

// Offering Routing
Route::resource('financeAdmin/offering', OfferingController::class);

// Promise Routing
Route::resource('financeAdmin/promise', PromiseController::class);

// ServicePayment Routing
Route::resource('financeAdmin/servicePayment', ServicePaymentController::class);

//Message Controller
Route::resource('message', MessageController::class);