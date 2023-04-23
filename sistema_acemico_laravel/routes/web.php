<?php
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;

use Illuminate\Support\Facades\Route;
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

Route::apiResources([
    /*Route::apiResources([
    'alumnos'=>AlumnoController::class, 
]);*/
]);
Route::controller(AlumnoController::class)->group(function(){
    Route::get('/alumnos', 'index');
    Route::post('/alumnos', 'store');
    Route::put('/alumnos', 'update');
    Route::delete('/alumnos', 'destroy');
});


Route::controller(DocenteController::class)->group(function(){
    Route::get('/docentes', 'index');
    Route::post('/docentes', 'store');
    Route::put('/docentes', 'update');
    Route::delete('/docentes', 'destroy');
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/alumno/{nombre}/{edad}', function($nombre='', $edad=0){
    $msg = $edad>=18 ? 'Eres un adulto resposanble' : 'Aun no tienes compromisos';
    return 'Hola, desde una ruta en laravel... '. $nombre. ' Msg: '. $msg;
})->where(['edad'=>'^[0-9]{1,3}', 'nombre'=>'^[a-zA-Z]{3,85}']);
