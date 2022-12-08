<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\CommentsController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('new_ticket', [TicketsController::class, 'create']);
Route::post('new_ticket', [TicketsController::class, 'store']);
Route::get('tickets/{ticket_id}', [TicketsController::class, 'show']);
Route::get('my_tickets', [TicketsController::class, 'userTickets']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('tickets', [TicketsController::class, 'index']);
    Route::post('close_ticket/{ticket_id}', [TicketsController::class, 'close']);
});

Route::post('comment', [CommentsController::class, 'postComment']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
