<?php

use App\Http\Controllers\CRUDarticle;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/{article}', [HomeController::class, 'show'])->name('article.show');
Route::post('/comment', [HomeController::class, 'store'])->name('comment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])
    ->name('dashboard');
Route::get('/dashboard/article', [CRUDarticle::class, 'show'])->name('list');
Route::get('/dashboard/articledelete/{article}', [CRUDarticle::class, 'destroy'])->name('article.delete');
Route::get('/dashboard/articlemodify/{article}', [CRUDarticle::class, 'update'])->name('article.update');
Route::post('dashboard/articlesave/{article}', [CRUDarticle::class, 'save'])->name('article.save');



require __DIR__.'/auth.php';
