<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LeadsController;
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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about',[App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blogs',[App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('/career',[App\Http\Controllers\CareerController::class, 'index'])->name('career');
Route::get('/contact',[App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact',[App\Http\Controllers\ContactController::class, 'insert']);
Route::get('/ourteam',[App\Http\Controllers\ourteamcontroller::class, 'index'])->name('ourteam');
Route::get('/service',[App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/blog/{slug}',[App\Http\Controllers\PostController::class, 'public'])->name('blog');
Route::get('/service/{slug}',[App\Http\Controllers\PostController::class, 'public'])->name('serviceslug');
Route::get('/page/{slug}',[App\Http\Controllers\PostController::class, 'public'])->name('page');
Route::get('/job/{slug}',[App\Http\Controllers\PostController::class, 'public'])->name('job');
Route::post('/get-quotation/insert',[App\Http\Controllers\LeadsController::class, 'insert'])->name('form');





Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth','isAdmin'])->group(function(){

    Route::get('/admin/dashboard', [DashboardController::class,'dashbaord' ])->name('dashboard');

    Route::get('/admin/add-blog', [PostController::class,'create' ]);
    Route::get('/admin/blogs', [PostController::class,'index' ])->name('blogs');
    Route::get('/admin/edit-blog/{id}', [PostController::class,'edit' ]);
    Route::post('/admin/insert-blog', [PostController::class,'insert' ]);
    Route::get('/admin/delete-blog/{id}', [PostController::class,'destroy' ]);
    Route::post('/admin/update-blog/{id}', [PostController::class,'update' ]);
    Route::get('/admin/leads', [LeadsController::class,'index' ])->name('leads');
    Route::get('/admin/contact', [ContactController::class,'list' ])->name('contacts');
});

Route::get('/clear', function () {
    \Artisan::call('optimize');
});
