<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Admin;

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

Route::get('/',[Admin\HomeController::class, 'index'])->name('home');
Route::get('/about',[Admin\AboutController::class, 'index'])->name('about');
Route::get('/blogs',[Admin\HomeController::class, 'blogs'])->name('blogs');
Route::get('/career',[Admin\CareerController::class, 'index'])->name('career');
Route::get('/contact',[Admin\ContactController::class, 'index'])->name('contact');
Route::post('/contact',[Admin\ContactController::class, 'insert']);
Route::get('/ourteam',[Admin\HomeController::class, 'ourteam'])->name('ourteam');
Route::get('/service',[Admin\ServiceController::class, 'index'])->name('service');
Route::get('/blog/{slug}',[Admin\HomeController::class, 'public'])->name('blog');
Route::get('/service/{slug}',[Admin\PostController::class, 'public'])->name('serviceslug');
Route::get('/page/{slug}',[Admin\PostController::class, 'public'])->name('page');
Route::get('/job/{slug}',[Admin\PostController::class, 'public'])->name('job');
Route::post('/get-quotation/insert',[Admin\LeadsController::class, 'insert'])->name('form');





Route::get('login', [Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [Admin\Auth\LoginController::class, 'login']);
Route::post('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth','isAdmin'])->group(function(){

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/dashboard', [Admin\DashboardController::class,'dashbaord' ])->name('dashboard');

        Route::get('/add-blog', [Admin\PostController::class,'create' ])->name('blog.create');
        Route::get('/blogs', [Admin\PostController::class,'index' ])->name('admin.blogs');
        Route::get('/edit-blog/{id}', [Admin\PostController::class,'edit' ]);
        Route::post('/insert-blog', [Admin\PostController::class,'insert' ])->name('blog.store');
        Route::get('/delete-blog/{id}', [Admin\PostController::class,'destroy' ]);
        Route::post('/update-blog/{id}', [Admin\PostController::class,'update' ]);
        Route::get('/leads', [Admin\LeadsController::class,'index' ])->name('leads');
        Route::get('/contact', [Admin\ContactController::class,'list' ])->name('contacts');

        // Our team routes
        Route::get('/teams', [Admin\TeamController::class,'index' ])->name('team.index');
        Route::get('/add-team', [Admin\TeamController::class,'create' ])->name('team.create');
        Route::post('/insert-team', [Admin\TeamController::class,'insert' ])->name('team.store');
        Route::get('/edit-team/{id}', [Admin\TeamController::class,'edit' ])->name('team.edit');
        Route::post('/update-team/{id}', [Admin\TeamController::class,'update' ])->name('team.update');
        Route::get('/delete-team/{id}', [Admin\TeamController::class,'destroy' ])->name('team.delete');

        // Expired Jobs Routes
        Route::get('/expired-jobs', [Admin\PostController::class,'expiredJobs' ])->name('expired.jobs');



});
});

Route::get('/clear', function () {
    \Artisan::call('optimize');
});
