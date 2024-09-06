<?php
use \App\Http\Controllers\Api\AuthorController;
use \App\Http\Controllers\Api\BookController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Auth\RegisteredUserController;
use \App\Http\Controllers\Api\RoleController;
use \App\Http\Controllers\Api\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


    Route::post('/reg',[RegisteredUserController::class,'store']);
    Route::post('/login',[LoginController::class],'login');


/**
 * category
 */
    Route::get('/categories',[CategoryController::class,'index']);
    Route::post('/categories',[CategoryController::class,'store']);
    Route::get('/categories/{category}',[CategoryController::class,'show']);
    Route::put('/categories/{category}',[CategoryController::class,'update']);
    Route::delete('/categories/{category}',[CategoryController::class,'destroy']);

/**
 * Author
 */

    Route::get('/authors',[AuthorController::class,'index']);
    Route::post('/authors',[AuthorController::class,'store']);
    Route::get('/authors/{author}',[AuthorController::class,'show']);
    Route::put('/authors/{author}',[AuthorController::class,'update']);
    Route::delete('/authors/{author}',[AuthorController::class,'destroy']);

/**
 * Book
 */
    Route::get('/books',[BookController::class,'index']);
    Route::post('/books',[BookController::class,'store']);
    Route::get('/books/{book}',[BookController::class,'show']);
    Route::put('/books/{book}',[BookController::class,'update']);
    Route::delete('/books/{book}',[BookController::class,'destroy']);

/**
 * Role
 */
    Route::get('/roles',[RoleController::class,'index']);
    Route::post('/roles',[RoleController::class,'store']);
    Route::get('/roles/{role}',[RoleController::class,'show']);
    Route::put('/roles/{role}',[RoleController::class,'update']);
    Route::delete('/roles/{role}',[RoleController::class,'destroy']);



