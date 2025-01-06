<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ManageProfile.login');
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
    Route::get('/teacherProfile', [ProfileController::class, 'teacherEdit'])->name('profile.teacherEdit');
    Route::put('/{teacher}/teacherProfileUpdate', [ProfileController::class, 'teacherUpdate'])->name('profile.teacherUpdate');
    Route::get('/guardianProfile', [ProfileController::class, 'guardianEdit'])->name('profile.guardianEdit');
    Route::put('/{guardian}/guardianProfileUpdate', [ProfileController::class, 'guardianUpdate'])->name('profile.guardianUpdate');
    Route::get('/listParents', [ProfileController::class, 'listParents'])->name('kafa.listParents');
    Route::get('/{guardian}/viewParent', [ProfileController::class, 'viewParent'])->name('kafa.viewParent');
    Route::delete('/{guardian}/deleteParent', [ProfileController::class, 'deleteParent'])->name('kafa.deleteParent');
    Route::get('/listStudents', [ProfileController::class, 'listStudents'])->name('listStudents');
    Route::get('/{student}/viewStudent', [ProfileController::class, 'viewStudent'])->name('viewStudent');
    Route::delete('/{student}/deleteStudent', [ProfileController::class, 'deleteStudent'])->name('deleteStudent');
    Route::get('/registerParent', [ProfileController::class, 'registerParent'])->name('kafa.registerParent');
    Route::post('/storeParent', [ProfileController::class, 'storeParent'])->name('kafa.storeParent');
    Route::get('/registerTeacher', [ProfileController::class, 'registerTeacher'])->name('kafa.registerTeacher');
    Route::post('/storeTeacher', [ProfileController::class, 'storeTeacher'])->name('kafa.storeTeacher');
    Route::get('/registerStudent', [ProfileController::class, 'registerStudent'])->name('kafa.registerStudent');
    Route::post('/storeStudent', [ProfileController::class, 'storeStudent'])->name('kafa.storeStudent');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ActivityController::class)->middleware('auth')->group(function () {
     // Routes for KAFA management
    Route::get('/kafa/manageActivity', 'kafaManageActivity')->name('kafa.manageActivity');
    Route::get('/kafa/addActivity', 'kafaAddActivity')->name('kafa.addActivity');
    Route::post('/kafa/storeActivity', 'kafaStoreActivity')->name('kafa.storeActivity'); // Use POST method for storing activity
    Route::get('/kafa/editActivity/{id}', 'kafaEditActivity')->name('kafa.editActivity');
    Route::put('/kafa/updateActivity/{activity}', 'kafaUpdateActivity')->name('kafa.updateActivity'); // Change to PUT method
    Route::delete('/kafa/deleteActivity/{id}', 'kafaDeleteActivity')->name('kafa.deleteActivity'); // Change to DELETE method
    Route::get('/kafa/viewActivity/{activity}', 'kafaViewActivity')->name('kafa.viewActivity');
    
    // Routes for MUIP management
    Route::get('/muip/manageActivity', 'muipManageActivity')->name('muip.manageActivity');
    Route::get('/muip/viewActivity/{activity}', 'muipViewActivity')->name('muip.viewActivity');
    Route::get('/muip/approveActivity', 'muipApproveActivity')->name('muip.approveActivity');
    Route::post('/muip/batch-approve-activities', 'batchActionActivities')->name('muip.batchActionActivities');
    Route::post('/muip/approveActivity/{id}', 'approveActivity')->name('muip.approveActivityAction');
    Route::delete('/muip/rejectActivity/{id}', 'rejectActivity')->name('muip.rejectActivityAction');

    // Routes for Guardian management
    Route::get('/guardian/manageActivity', 'guardianManageActivity')->name('guardian.manageActivity');
    Route::get('/guardian/viewActivity/{activity}', 'guardianViewActivity')->name('guardian.viewActivity');
    
    // Routes for Teacher management
    Route::get('/teacher/manageActivity', 'teacherManageActivity')->name('teacher.manageActivity');
    Route::get('/teacher/viewActivity/{activity}', 'teacherViewActivity')->name('teacher.viewActivity');
});


Route::controller(ReportController::class)->middleware('auth')->group(function () {
    Route::get('/kafa/listReportActivity', 'kafaListReportActivity')->name('kafa.listReportActivity');
    Route::get('/kafa/{activity}/viewReportActivity', 'kafaViewReportActivity')->name('kafa.viewReportActivity');
    Route::get('/kafa/{activity}/createReportActivity', 'kafaCreateReportActivity')->name('kafa.createReportActivity');
    Route::put('/kafa/{activity}/updateReportActivity', 'kafaUpdateReportActivity')->name('kafa.updateReportActivity');
    Route::get('/muip/listReportActivity', 'muipListReportActivity')->name('muip.listReportActivity');
    Route::get('/muip/{activity}/viewReportActivity', 'muipViewReportActivity')->name('muip.viewReportActivity');
});

require __DIR__.'/auth.php';
