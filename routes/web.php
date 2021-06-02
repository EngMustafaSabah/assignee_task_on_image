<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect(route('project'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('project'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/project/{id}', 'App\Http\Controllers\ProjectController@show')
    ->name('project.single');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/project', 'App\Http\Controllers\ProjectController@index')
    ->name('project');

Route::middleware(['auth:sanctum'])
    ->post('/assignee-task/', 'App\Http\Controllers\AssigneeTaskController@store')
    ->name('assignee.create');
