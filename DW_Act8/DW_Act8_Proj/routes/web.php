<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuperheroController;

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
    return view('main');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('superheroes', [SuperheroController::class, 'index'])->name('Superheroe.index');

Route::get('/', [SuperheroController::class, 'create'])->name('create.superhero');

Route::post('store', [SuperheroController::class, 'store'])->name('superhero.store');

Route::get('edit/superhero/{id}', [SuperheroController::class, 'edit']);
Route::get('delete/superhero/{id}', [SuperheroController::class, 'Delete']);

Route::post('update/superhero/{id}', [SuperheroController::class, 'update']);

