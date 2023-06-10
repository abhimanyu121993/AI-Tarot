<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\LiveLocationController;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\TarotCardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\TarotController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('tarot-read', function () {
    return view('home');
});

Route::get('/', [HomeController::class , 'comingSoon']);
Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

Route::get('home', [HomeController::class , 'home'])->name('home');
Route::get('read-tarot', [HomeController::class , 'readTarot'])->name('readTarot');


//OpenAI
Route::get('ask', [TarotController::class, 'askOpenAi'])->name('askOpenAi');
Route::post('/openai-img', [TarotController::class, 'openAiGenerate'])->name('openAiGenerate');


//Read Tarot
Route::get('ask-tarot', [TarotController::class, 'askTarot'])->name('askTarot');
Route::post('/tarot-card', [TarotController::class, 'tarotCard'])->name('tarotCard');

// Admin Screen OpenAI
Route::get('admin-query', [TarotController::class, 'adminQuery'])->name('adminQuery');
Route::post('/admin-save-query', [TarotController::class, 'saveAdminQuery'])->name('saveAdminQuery');

// User Screen OpenAI
Route::get('user-response', [TarotController::class, 'userResponse'])->name('userResponse');
Route::get('del-response/{id}', [TarotController::class, 'delUserResponse'])->name('delUserResponse');


// Backend Routes
Route::get('/admin',[LoginController::class, 'index'])->name('admin');
Route::post('/login',[LoginController::class, 'store'])->name('login');
Route::get('lockscreen', [UserController::class, 'lockscreen'])->name('lockscreen');


Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('user', UserController::class);
    Route::get('user-profile/{id?}',[UserController::class,'profile'])->name('profile');
    Route::get('edit-user-profile/{id?}',[UserController::class,'editProfile'])->name('editprofile');
    Route::post('user-profile-update',[UserController::class,'updateProfile'])->name('userupdate');
    Route::post('user-pass-update',[UserController::class,'updatePassword'])->name('uppass');

    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::get('/role-has-permission',[PermissionController::class,'rolePermission'])->name('rolePermission');
    Route::post('/fetch-permission',[PermissionController::class,'fetchPermission'])->name('fetchPermission');
    Route::post('/assign-permission',[PermissionController::class,'assignPermission'])->name('assignPermission');
    Route::resource('tarot', TarotCardController::class);
    Route::resource('about', AboutController::class);
    Route::get('terms-condition',[AboutController::class,'terms_condition'])->name('terms-condition');
    Route::get('privacy-policy',[AboutController::class,'privacy_policy'])->name('privacy-policy');
    Route::post('terms-condition/store',[AboutController::class,'store_terms_condition'])->name('terms-condition.store');
    Route::post('privacy-policy/store',[AboutController::class,'store_privacy_policy'])->name('privacy-policy.store');


});


// Google Login
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [SocialLoginController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [SocialLoginController::class, 'callbackFromGoogle'])->name('callback');
});










Route::get('/optimize', function(){
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
});
