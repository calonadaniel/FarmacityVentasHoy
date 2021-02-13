<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ventasHoyController;

use App\Models\User;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[ventasHoyController::class, 'index'])->name('index')->middleware('auth');
Route::get('about',[ventasHoyController::class, 'about'])->name('about')->middleware('auth');
//Route::get('ventasHoy-PDF',[ventasHoyController::class, 'pdf'])->name('ventasHoyPDF')->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('puntos',[ventasHoyController::class, 'puntos'])->name('puntos')->middleware('auth');

Route::get('/hash_password', function() {

    $users = User::chunk(50, function ($users) {
        foreach ($users as $user) {
            if(Hash::needsRehash($user->password) ){ 
                $user->password = Hash::make($user->password);
                $user->save(); //Aplicar hash a la contraseña 
              
            }else{
                $alreadyhashed; //No necesita
            }
        }
    });
   })->middleware('auth');

