<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SobiqController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPage\DipserviceController;
use App\Http\Controllers\Admin\DipserviceController as DipAddmin;
use App\Http\Controllers\MainPage\EmbassyController;
use App\Http\Controllers\Admin\EmbassyController as EmbAdmin;
use App\Http\Controllers\MainPage\MainController;
use App\Http\Controllers\MainPage\Vazorat;
use App\Http\Controllers\Phone\PhoneController;
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



Route::controller(MainController::class)->group(function (){
   Route::get('/', 'index')->name('main');
    Route::get('/main/user/{id}', 'show')->name('show.item');
});
Route::controller(Vazorat::class)->group(function (){
   Route::get('/vazorat', 'index')->name('vazorat');
   Route::get('/vazorat/user/{id}', 'show')->name('vazorat.user');
});

Route::controller(EmbassyController::class)->group(function (){
   Route::get('/main/embassy', 'index')->name('embassy');
   Route::get('/embassy/user/{id}', 'show')->name('embassy.user');
});
Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/loginauth', 'login')->name('login.auth');
    Route::post('logoute', 'logoute')->name('logoute');
});
Route::controller(DipserviceController::class)->group(function (){
    Route::get('/main/dipservice', 'index')->name('dipservice');
    Route::get('/dipservice/user/{id}', 'show')->name('dipservice.user');
});



Route::middleware('auth')->group(function (){
    Route::get('/dash',[AdminController::class,'index'])->name('dashboard');

    Route::controller(UserController::class)->group(function (){
        Route::get('/user/lists', 'index')->name('user.list');
        Route::get('/user/add', 'create')->name('adduser');
        Route::post('/user/store', 'store')->name('user.store');
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::put('/user/update/{id}', 'update')->name('user.update');
        Route::delete('/user/delete/{id}', 'destroy')->name('user.delete');
        Route::get('/user/show/{id}', 'show')->name('show.user');
    });

    Route::controller(DepartmentController::class)->group(function (){
        Route::get('/dep/lists', 'index')->name('dep.list');
        Route::get('/dep/add', 'create')->name('depadd');
        Route::post('/dep/store', 'store')->name('dep.store');
        Route::get('/dep/edit/{id}', 'edit')->name('dep.edit');
        Route::put('/dep/update/{id}', 'update')->name('dep.update');
        Route::delete('/dep/delete/{id}', 'destroy')->name('dep.delete');

    });

    Route::controller(DipAddmin::class)->group(function (){
        Route::get('/dip/lists', 'index')->name('dip.list');
        Route::get('/dip/add', 'create')->name('dipadd');
        Route::post('/dip/store','store')->name('dip.store');
        Route::get('/dip/edit/{id}', 'edit')->name('dip.edit');
        Route::put('/dip/update/{id}', 'update')->name('dip.update');
        Route::delete('/dip/delete/{id}', 'destroy')->name('dip.delete');

    });

    Route::controller(EmbAdmin::class)->group(function (){
        Route::get('/emb/lists', 'index')->name('emb.list');
        Route::get('/emb/add', 'create')->name('embadd');
        Route::post('/emb/store', 'store')->name('emb.store');
        Route::get('/emb/edit/{id}', 'edit')->name('emb.edit');
        Route::put('/emb/update/{id}', 'update')->name('emb.update');
        Route::delete('/emb/delete/{id}', 'destroy')->name('emb.delete');
    });

    Route::controller(SobiqController::class)->group(function (){
        Route::get('/sobiq/lists', 'index')->name('sobiq.index');
        Route::get('/sobiq/edit/{id}', 'edit')->name('sobiq.edit');
        Route::put('/sobiq/update/{id}', 'update')->name('sobiq.update');
        Route::delete('/sobiq/delete/{id}', 'destroy')->name('sobiq.delete');
    });
});
// Admin panel








