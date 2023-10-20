<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Change the route file to Modules
foreach (scandir($path = app_path('Http/Modules')) as $dir) {
    if (file_exists($filepath = "{$path}/{$dir}/Presentation/api.php")) {
        require $filepath;
    }
}