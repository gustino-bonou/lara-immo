<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropoertyController;
use App\Http\Controllers\HomeController;
use App\Models\Property;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);

Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);
;

Route::prefix('admin')->name('admin.')-> group(function(){
    Route::resource('property', PropoertyController::class )->except(['show']);
    Route::resource('option', OptionController::class )->except(['show']);
});