<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\VlogController;
use App\Http\Controllers\UserLoginController;


Route::get('/test', function () {return response()->json('API is working');});
Route::get('/display', function () {return response()->json('Welcome to NOTE');});

//createuser
Route::post('/CreateUser',[UserLoginController::Class, 'CreateUser'])->middleware('web')->name('CreateUser'); 
Route::get('/ReadUsers',[UserLoginController::Class, 'ReadUsers']);
Route::put('/UpdateUser/{id}',[UserLoginController::Class, 'UpdateUser']);  
Route::delete('/DeleteUser/{id}', [UserLoginController::class, 'DeleteUser']);

//user data
Route::put('/StoreData', [VlogController::class, 'store']);
Route::post('/Option', [VlogController::Class, 'option']);
Route::get('/StatusFilter',[VlogController::Class, 'StatusFilter']);

//note
Route::get('/SearchNote/{param}', [NoteController::class, 'SearchNote'])->name('SearchNote');
Route::post('/CreateNote', [NoteController::class, 'CreateNote'])->middleware('web')->name('CreateNote');
Route::get('ReadNote', [NoteController::class, 'ReadNote'])->name('ReadNote');
Route::put('/UpdateNote/{id}', [NoteController::class, 'UpdateNote'])->name('UpdateNote');
Route::delete('/DeleteNote/{id}', [NoteController::class, 'DeleteNote'])->name('DeleteNote');
Route::get('/notes/Recycle', [NoteController::class, 'Recycle'])->name('notes.recycle');
Route::post('/note/{id}/Restore', [NoteController::class, 'Restore'])->name('notes.restore');
Route::get('/Pagination', [NoteController::class, 'Pagination'])->name('Pagination');

