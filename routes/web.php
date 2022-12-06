<?php

use App\Http\Controllers\InternCreate;
use App\Http\Controllers\InternDelete;
use App\Http\Controllers\InternEdit;
use App\Http\Controllers\InternIndex;
use App\Http\Controllers\InternStore;
use App\Http\Controllers\InternUpdate;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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
    return view('student.home')->name('home');
});
Route::get("/students",[StudentController::class,'index'])->name('student.index');
Route::get("/students/create",[StudentController::class,'create'])->name('student.create');
Route::post("/students",[StudentController::class,'store'])->name('student.store');
Route::get('students/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::put('students/{student}',[StudentController::class,'update'])->name('student.update');
Route::delete('students/{student}',[StudentController::class,'destroy'])->name('student.destroy');

Route::get("/interns",InternIndex::class)->name('interns.index');
Route::get("/interns/create",InternCreate::class)->name('intern.create');
Route::post("/interns",InternStore::class)->name('intern.store');
Route::get('/interns/{intern}/edit',InternEdit::class)->name('intern.edit');
Route::put('interns/{intern}',InternUpdate::class)->name('intern.update');
Route::delete('interns/{intern}',InternDelete::class)->name('intern.destroy');