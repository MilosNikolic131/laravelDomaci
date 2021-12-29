<?php

// use App\Models\Podrska_drugog_nivoa;
// use App\Models\Podrska_prvog_nivoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZalbeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Podrska_Drugog_NivoaController;
use App\Http\Controllers\Podrska_Prvog_NivoaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('zalbe', ZalbeController::class)->only(['index','show']);
Route::resource('podrskaprvognivoa', Podrska_Prvog_NivoaController::class)->only(['index','show']);
Route::resource('podrskadrugognivoa', Podrska_Drugog_NivoaController::class)->only(['index','show']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

//Route::get('/zalbe', [ZalbeController::class, 'index']);

// Route::get('/podrskaprvognivoa', [Podrska_Prvog_NivoaController::class, 'index']);
// Route::get('/podrskaprvognivoa/{id}', [Podrska_Prvog_NivoaController::class, 'show']);

// Route::get('/podrskadrugognivoa', [Podrska_Drugog_NivoaController::class, 'index']);
// Route::get('/podrskadrugognivoa/{id}', [Podrska_Drugog_NivoaController::class, 'show']);

// Route::get('/zalbe/{id}', [ZalbeController::class, 'show']);

Route::get('/zalbe/search/{tip_problema}', [ZalbeController::class, 'search']);

// Route::put('/zalbe/{id}', [ZalbeController::class, 'update']);

// Route::delete('/zalbe/{id}', [ZalbeController::class, 'delete']);

// Route::post('/zalbe', [ZalbeController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/zalbe', [ZalbeController::class, 'store']);
    
    Route::put('/zalbe/{id}', [ZalbeController::class, 'update']);

    Route::delete('/zalbe/{id}', [ZalbeController::class, 'delete']);
    Route::post('/unapredjenje', [AuthController::class, 'registerDrugiNivo']);

    Route::delete('/podrskaprvogreda/{id}', [Podrska_Prvog_NivoaController::class, 'delete']);
    Route::delete('/podrskadrugogreda/{id}', [Podrska_Drugog_NivoaController::class, 'delete']);
});

// Route::get('/podrska_prvog_nivoa', function(){
//     return Podrska_prvog_nivoa::all();
// });
// Route::get('/podrska_drugog_nivoa', function(){
//     return Podrska_drugog_nivoa::all();
// });
