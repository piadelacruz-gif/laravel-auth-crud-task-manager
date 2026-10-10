<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
Route::get('/',fn()=>redirect()->route(auth()->check() ? 'tasks.index' : 'login'));
Route::get('/dashboard',fn()=>redirect()->route('tasks.index'))
    ->middleware(['auth','verified'])->name('dashboard');
Route::middleware('auth')->group(function(){
    Route::resource('tasks',TaskController::class);
});
require __DIR__.'/auth.php';
