<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentControl;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students/crear',[StudentControl::class,'crear'])->name('students.crear');

Route::post('/students/guardar',[StudentControl::class,'guardar'])->name('students.guardar');

Route::get('/students/mostrar',[StudentControl::class,'mostrar'])->name('students.mostrar');

Route::put('/students/{student}',[StudentControl::class,'actualizar'])->name('students.actualizar');

Route::get('/students/eliminar',[StudentControl::class,'eliminar'])->name('students.eliminar');

Route::post('/students/destruir',[StudentControl::class,'destruir'])->name('students.destruir');
