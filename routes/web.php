<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RedeemRecordController;
use App\Http\Controllers\ServiceController;
use App\Models\Customer;
use App\Models\RedeemRecord;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/register', function(){
    return view('register');
});

Route::get('/referral', function(){
    return view('redeem');
});


Route::get('/order',[ServiceController::class, 'index']);
Route::get('/record', [RedeemRecordController::class, 'index']);
Route::get('/', [CustomerController::class, 'index']);
Route::post('/updateService', [ServiceController::class, 'update']);
Route::post('/redeem', [RedeemRecordController::class, 'create']);
Route::post('/import', [CustomerController::class, 'import']);
Route::post('/addService', [ServiceController::class, 'create']);
Route::delete('/deleteService/{id}', [ServiceController::class, 'destroy']);