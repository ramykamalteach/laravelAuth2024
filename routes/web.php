<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;

use App\Http\Controllers\ProductController;

use App\Http\Middleware\LoggedMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EditorMiddleware;
use App\Http\Middleware\SuperVisorMiddleware;

use App\Policycheck;

Route::get('/login', function() {
    return view('login.index');
})->name('login');

/* ------------------------------------------------------------------------- */

Route::post('/verifyLogin', [MemberController::class, 'verifyLogin'])->name('verifyLogin.member');

Route::get('/logout', [MemberController::class, 'logout'])->name('logout.member');

/* ------------------------------------------------------------------------------------------------- */

Route::group(['prefix' => 'dashboard', 'middleware' => LoggedMiddleware::class], function () {

    /* --------------------------------------------------------- */
    Route::group(['prefix' => 'admin', 'middleware' => AdminMiddleware::class], function () {

        Route::get('/', function() {
            return view('admin.index');
        })->name('admin.index');

        Route::get('/messages', function() {
            return view('admin.messages');
        })->name('admin.messages');

        Route::get('/info', function() {
            return view('admin.info');
        })->name('admin.info');

    });
    /* --------------------------------------------------------- */
    Route::group(['prefix' => 'editor', 'middleware' => EditorMiddleware::class], function () {

        Route::resource('/products', ProductController::class);

        Route::get('/', function() {
            return view('editor.index');
        })->name('editor.index');

        Route::get('/messages', function() {
            if(Policycheck::pv('messages')) {
                return view('editor.messages');
            }
            else {
                return view('editor.index');
            }
            
        })->name('editor.messages');

        Route::get('/info', function() {
            if(Policycheck::pv('info')) {
                return view('editor.info');
            }
            else {
                return view('editor.index');
            }
            
        })->name('editor.info');        

    });
    /* --------------------------------------------------------- */
    Route::group(['prefix' => 'supervisor', 'middleware' => SuperVisorMiddleware::class], function () {

        Route::get('/', function() {
            return view('supervisor.index');
        })->name('supervisor.index');

        Route::get('/messages', function() {
            return view('supervisor.messages');
        })->name('supervisor.messages');

        Route::get('/info', function() {
            return view('supervisor.info');
        })->name('supervisor.info');

    });

});












Route::get('/', function () {
    return view('welcome');
});
