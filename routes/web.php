<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\LiveLocationController;
use App\Http\Controllers\WeatherForecastController;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\TarotCardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('about', [HomeController::class , 'ShowAbout'])->name('about');
Route::get('privacy-policy', [HomeController::class , 'ShowPrivacy'])->name('privacy');
Route::get('terms-condition', [HomeController::class , 'ShowTerms'])->name('terms');

Route::get('/weather-forecast', [WeatherForecastController::class, 'weatherDetail']);
Route::get('/live-location', [LiveLocationController::class, 'liveLocation']);


//OpenAI
Route::get('ask', [WeatherForecastController::class, 'askOpenAi'])->name('askOpenAi');
Route::post('/openai-img', [WeatherForecastController::class, 'openAiGenerate'])->name('openAiGenerate');


//Read Tarot
Route::get('ask-tarot', [WeatherForecastController::class, 'askTarot'])->name('askTarot');
Route::post('/tarot-card', [WeatherForecastController::class, 'tarotCard'])->name('tarotCard');

// Admin Screen OpenAI
Route::get('admin-query', [WeatherForecastController::class, 'adminQuery'])->name('adminQuery');
Route::post('/admin-save-query', [WeatherForecastController::class, 'saveAdminQuery'])->name('saveAdminQuery');

// User Screen OpenAI
Route::get('user-response', [WeatherForecastController::class, 'userResponse'])->name('userResponse');
Route::get('del-response/{id}', [WeatherForecastController::class, 'delUserResponse'])->name('delUserResponse');


// Backend Routes
Route::get('/admin',[LoginController::class, 'index'])->name('admin');
Route::post('/login',[LoginController::class, 'store'])->name('login');


Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'auth'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('user', UserController::class);
    Route::get('user-profile/{id?}',[UserController::class,'profile'])->name('profile');
    Route::get('edit-user-profile/{id?}',[UserController::class,'editProfile'])->name('editprofile');
    Route::post('user-profile-update',[UserController::class,'updateProfile'])->name('userupdate');
    Route::post('user-pass-update',[UserController::class,'updatePassword'])->name('uppass');
    Route::post('user-signup',[UserController::class,'UserStore'])->name('userstore');

    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::get('/role-has-permission',[PermissionController::class,'rolePermission'])->name('rolePermission');
    Route::post('/fetch-permission',[PermissionController::class,'fetchPermission'])->name('fetchPermission');
    Route::post('/assign-permission',[PermissionController::class,'assignPermission'])->name('assignPermission');
    Route::resource('tarot', TarotCardController::class);
    Route::get('tarot-background',[TarotCardController::class,'T_Background'])->name('tarot-get');
    Route::post('tarot-background-store',[TarotCardController::class,'T_Background_post'])->name('tarot-post');
    Route::get('tarot-background-delete/{id}',[TarotCardController::class,'T_Background_delete'])->name('tarot-delete');
    Route::resource('about', AboutController::class);
    Route::get('terms-condition',[AboutController::class,'terms_condition'])->name('terms-condition');
    Route::get('privacy-policy',[AboutController::class,'privacy_policy'])->name('privacy-policy');
    Route::post('terms-condition/store',[AboutController::class,'store_terms_condition'])->name('terms-condition.store');
    Route::post('privacy-policy/store',[AboutController::class,'store_privacy_policy'])->name('privacy-policy.store');
    Route::resource('subscription',SubscriptionController::class);


});

Route::group(['prefix'=>'google','as'=>'google.'],function(){
    Route::get('/login',[SocialLoginController::class,'loginWithGoogle'])->name('login');
    Route::get('/callback',[SocialLoginController::class,'callbackFromGoogle'])->name('callback');
});

Route::get('lockscreen', [UserController::class, 'lockscreen'])->name('lockscreen');


Route::get('/optimize', function(){
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
});
