<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;


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

Route::get('/', function() {
    return redirect(route('page.index'));
});

Route::prefix('page')->group(function() {
    Route::get('/', [ PagesController::class, 'index'])->name('page.index');
    Route::get('new', [ PagesController::class, 'new'])->name('page.new');
    Route::get('edit/{id?}', [ PagesController::class, 'edit'])->name('page.edit');
    Route::get('{slug_parent?}/{slug_child?}/{slug_sub_child?}', [PagesController::class, 'show'])->name('page.view');
});
