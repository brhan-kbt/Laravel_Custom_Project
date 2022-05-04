<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { 
    return view('welcome');
});

 Auth::routes();

//  Route::controller(MemberController::class)->group(function(){
//      Route::get('/register', 'register')->name('register');
//  });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', 'UserAccountController@admin')->name('admin')->middleware('super');
// Route::get('/user', 'UserAccountController@user')->name('user')->middleware('member');
// Route::get('/member', 'UserAccountController@memberadmin')->name('member-mgr')->middleware('memberadmin');

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
Route::get('/register','PagesController@register')->name('register');
Route::get('/user/donate','MemberController@donate')->name('donate');
Route::get('/user/promise_status','MemberController@status')->name('status');
Route::resource('member/manage-members', MemberController::class)->middleware('memberadmin');


// Route::post('/login', 'UserAccountController@login');


//  AdminController
Route::resource('admin/managemgrs', AdminController::class);
Route::get('/admin','AdminController@home')->name('admin')->middleware('super');


Route::controller(UserAccountController::class)->group(function(){
    Route::get('/user','user')->name('user')->middleware('member');
    Route::post('/login', 'login')->name('login');

    // Route::get('/pradmin','pradmin')->name('pradmin')->middleware('pradmin');
    // Route::get('/member','memberadmin')->name('member-mgr')->middleware('memberadmin');
    // Route::get('/educAdmin','educmgr')->name('educmgr')->middleware('educadmin');
});

//Church Profile Routing

Route::resource('/pradmin/church_profile', ChurchProfileController::class);

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