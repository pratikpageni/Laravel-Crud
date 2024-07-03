<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('tasks', TaskController::class);


Route::apiResource('tasks',TaskController::class);

// Route::prefix('tasks')->group(function () {
//     Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
//     Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
//     Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
//     Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
//     Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
// });

