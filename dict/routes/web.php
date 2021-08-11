<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('order', [DataRateController::class, 'allDataTypeCargo']);
//Route::get('/order', function () {return view('order');})->name('order');
//Route::get('/', function () {return view('welcome');})->name('welcome-1');
Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/search ', [MainController::class,'search'])->name('search');

Route::middleware([Authenticate::class])->group(
    function(){
        
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

        
        Route::prefix('dashboard')->group(function()
        {
            Route::get('words', [AdminController::class,'allWords'])->name('all-words');
            Route::prefix('words')->group(function()
            {
                Route::post('/add-word', [AdminController::class,'newWord'])->name('add-word');
                Route::get('/my-words/{id}', [AdminController::class,'myWords'])->name('my-words'); 
 
                
                Route::post('/update', [AdminController::class,'updateOrder'])->name('update');
                Route::get('/update', [AdminController::class,'viewUpdate'])->name('view-update');
                
            });
            Route::get('users', [AdminController::class,'users'])->name('users');
            Route::get('/delete-user/{id}', [AdminController::class,'delete'])->name('delete');
            Route::post('/update-user', [AdminController::class,'updateUser'])->name('update');
            //Route::get('users/update-user/{id}', [AdminController::class,'user UpdateGet'])->name('view-update-users'); 
            //Route::post('users/update-user/{id}', [AdminController::class,'updateUserPost'])->name('update-users'); 
        });
    });

