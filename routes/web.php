<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\BussinessController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Models\Bussiness;
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
    return view('auth.login');
});

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {
        //route dashboard
        Route::get('/sub_group_id', [AkunController::class, 'getSubGroup']);
        Route::get('/getDetails', [AkunController::class, 'getDetails']);

        Route::get('/back_bisnis', [DashboardController::class, 'backBisnis'])->name('back_bisnis');
        Route::get('/back_bisnis', [DashboardController::class, 'backBisnis'])->name('back_bisnis');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        //route resource categories
        Route::resource('/bussiness', BussinessController::class, ['as' => 'admin']);
        Route::resource('/accounting', AkunController::class, ['as' => 'admin']);
    });
});
