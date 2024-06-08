<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/kafa/kafaHomepage', 'kafaHomepage')->name('kafa.kafaHomepage');
    Route::get('/muip/muipHomepage', 'muipHomepage')->name('muip.muipHomepage');
    Route::get('/guardian/guardianHomepage', 'guardianHomepage')->name('guardian.guardianHomepage');
    Route::get('/teacher/teacherHomepage', 'teacherHomepage')->name('teacher.teacherHomepage');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ActivityController::class)->middleware('auth')->group(function () {
    Route::get('/kafa/manageActivity', 'kafaManageActivity')->name('kafa.manageActivity');
    Route::get('/muip/manageActivity', 'muipManageActivity')->name('muip.manageActivity');
    Route::get('/guardian/manageActivity', 'guardianManageActivity')->name('guardian.manageActivity');
    Route::get('/teacher/manageActivity', 'teacherManageActivity')->name('teacher.manageActivity');
    Route::get('/kafa/manageActivity', 'kafaCreateActivity')->name('kafa.createActivity');
});

Route::controller(ReportController::class)->middleware('auth')->group(function () {
    Route::get('/kafa/listReportActivity', 'kafaListReportActivity')->name('kafa.listReportActivity');
    Route::get('/kafa/{activity}/viewReportActivity', 'kafaViewReportActivity')->name('kafa.viewReportActivity');
    Route::get('/kafa/{activity}/createReportActivity', 'kafaCreateReportActivity')->name('kafa.createReportActivity');
    Route::put('/kafa/{activity}/updateReportActivity', 'kafaUpdateReportActivity')->name('kafa.updateReportActivity');
});

Route::controller(StudentResultController::class)->middleware('auth')->group(function () {
    Route::get('/teacher/listStudent', 'teacherlistStudent')->name('teacher.listStudent');
});

require __DIR__.'/auth.php';
