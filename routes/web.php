<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProject;

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
    return view('SensorView');
});

Route::get('/levelsensor', [ControllerProject::class, 'levelsensorfunc']);
Route::get('/statussensor', [ControllerProject::class, 'statussensorfunc']);
Route::get('/alamatsensor', [ControllerProject::class, 'alamatsensorfunc']);

Route::get('/simpan/{nilailevel}/{nilaistatus}', [ControllerProject::class,'simpansensor']);
