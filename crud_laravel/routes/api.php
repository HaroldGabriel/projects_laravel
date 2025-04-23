<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiControl;

Route::get('/students',[ApiControl::class, 'index']);

Route::get('/students/{id}', [ApiControl::class, 'show']);

Route::post('/students',[ApiControl::class, 'store']);

Route::put('/students/{id}', [ApiControl::class, 'update']);

Route::patch('/students/{id}', [ApiControl::class, 'updatePartial']);

Route::delete('/students/{id}', [ApiControl::class, 'delete']);
