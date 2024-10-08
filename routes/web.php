<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\MarkCalculationController;
use App\Http\Controllers\UiController;
use App\Models\Notice;
use App\Models\StudentRegistration;
use Illuminate\Support\Facades\Route;



Route::get('/', [UiController::class, 'home'])->name('ui.home');
Route::get('contact', [UiController::class, 'contact'])->name('ui.contact');
Route::get('login', [UiController::class, 'login'])->name('ui.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/ui/notice/board', [NoticeController::class, 'uiAll'])->name('ui.noticeAll');

Route::middleware('auth')->group(function () {
    Route::get('ui/view/detail/{id}',[UiController::class,'viewDetail'])->name('ui.view.reg.detail');
    Route::get('student/history',[UiController::class,'history'])->name('history');
    Route::get('sturegistration', [UiController::class, 'stuReg'])->name('stu.reg');
    Route::post('studentReg/store', [StudentRegistrationController::class, 'sturegStore'])->name('stu.reg.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('ui/image/{name}', [UiController::class, 'showImage'])->name('ui.image.show');
    Route::get('ui/reg/detele/{id}',[UiController::class,'regDelete'])->name('ui.reg.delete');
    Route::get('ui/reg/edit/{id}',[UiController::class,'regEdit'])->name('ui.reg.edit');
    Route::put('ui/reg/update/{id}',[StudentRegistrationController::class,'regUpdate'])->name('ui.reg.update');

});

Route::middleware('admin','auth')->group(function () {
    Route::get('/admin/registrations/word-download', [StudentRegistrationController::class, 'aceeptwordDownload'])->name('admin.registrations.accept.word.download');
    Route::get('admin/stu-reg-list/export', [StudentRegistrationController::class, 'exportToWord'])->name('admin.stu.reg.export');
    Route::get('accept/list',[AdminController::class,'acceptList'])->name('admin.stu.reg.accept.list');
    Route::get('accept/list/search',[AdminController::class,'acceptSearch'])->name('admin.stu.reg.accept.list.search');
    Route::get('/stu/stop',[AdminController::class, 'stopdownloadWordFile'])->name('stop.stu.wordfile');
    Route::get('/stu/stoplist/download', [AdminController::class, 'stopStuList'])->name('stop.stu');

    Route::get('stop/mail/{id}',[AdminController::class,'stopMail'])->name('stop.mail');
    Route::get('nostop/mail/{id}', [AdminController::class, 'nostopMail'])->name('no.stop.mail');
    Route::get('/reg/give/edit/{id}',[StudentRegistrationController::class,'giveEdit'])->name('admin.stu.give.edit');
    Route::get('/reg/accept/{id}',[StudentRegistrationController::class,'regAccept'])->name('admin.stu.accept');

    Route::get('/home', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('add/user/mail', [AdminController::class, 'addAdmin'])->name('add.admin');
    Route::get('user/mail/list', [AdminController::class, 'adminlist'])->name('admin.list');
    Route::get('user/mail/edit/{id}', [AdminController::class, 'adminEdit'])->name('admin.info.edit');
    Route::put('user/mail/info/update', [AdminController::class, 'adminUpdate'])->name('admin.info.update');
    Route::get('user/mail/delete/{id}', [AdminController::class, 'adminDelete'])->name('admin.delete');

    Route::get('/acedmic/year/all', [AcademicYearController::class, 'acedmicList'])->name('admin.acedimcList');
    Route::get('/acedmic/add', [AcademicYearController::class, 'acedmicAdd'])->name('admin.acedimc.add');
    Route::post('/acedmic/store', [AcademicYearController::class, 'acedmicStore'])->name('admin.acedimic.store');
    Route::get('/acedmic/edit/{id}', [AcademicYearController::class, 'acedmicEdit'])->name('admin.acedimic.edit');
    Route::put('/acedmic/update/{id}', [AcademicYearController::class, 'acedmicUpdate'])->name('admin.acedimic.update');
    Route::get('/acedmic/delete/{id}', [AcademicYearController::class, 'acedmicDelete'])->name('admin.acedimic.delete');

    Route::get('/studentReg/list', [StudentRegistrationController::class, 'stuRegList'])->name('admin.stu.reg.list');
    Route::get('/studentReg/list/byyear/{yearid}',[StudentRegistrationController::class, 'stuRegListByYearId'])->name('admin.stu.reg.list.byYear');
    Route::post('first/reg/store',[StudentRegistrationController::class,'firstYrStore'])->name('first.yr.store');
    Route::get('/studentReg/form/firstyr', [StudentRegistrationController::class, 'form'])->name('admin.stu.reg.form');
    Route::get('/studentReg/detail/{id}', [StudentRegistrationController::class, 'stuRegDetail'])->name('admin.stu.reg.detail');
    Route::get('/studentReg/edit/{id}', [StudentRegistrationController::class, 'stuRegEdit'])->name('admin.stu.reg.edit');
    Route::put('/studentReg/update/{id}', [StudentRegistrationController::class, 'stuRegUpdate'])->name('admin.stu.reg.update');
    Route::get('/studentReg/delete/{id}', [StudentRegistrationController::class, 'stuRegDelete'])->name('admin.stu.reg.delete');



    Route::get('/image/{name}', [StudentRegistrationController::class, 'showImage'])->name('image.show');

    Route::get('admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminController::class, 'adminEditProfile'])->name('admin.profile.edit');
    Route::put('admin/profile/update', [AdminController::class, 'adminUpdateProfile'])->name('admin.profile.update');

    Route::get('/notice/list', [NoticeController::class, 'list'])->name('notice.list');
    Route::get('/notice/add', [NoticeController::class, 'add'])->name('notice.add');
    Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('/notice/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
    Route::get('/notice/delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');

    Route::get('/calcu', [MarkCalculationController::class, 'index'])->name('user.get.calculationForm');
    Route::post('/store', [MarkCalculationController::class, 'store'])->name('user.store.calculation');
    Route::get('students/{student}/get-grading-list', [MarkCalculationController::class, 'getGrading'])->name('user.get.grading');
    Route::get('students/{student}/download-mark', [MarkCalculationController::class, 'downloadMark'])->name('download');;
    Route::get('students/{student}/get-grading-list', [MarkCalculationController::class, 'getGrading'])->name('user.get.grading');
    Route::delete('students/{student}/delete-record', [MarkCalculationController::class, 'delete'])->name('user.grade.delete');
    Route::get('students/grading-lists', [MarkCalculationController::class, 'gradingLists'])->name('user.get.gradingList');

    Route::post('/search-student', [MarkCalculationController::class, 'search'])->name('student.search');
    Route::get('students/{student}/download-markworld', [MarkCalculationController::class, 'downloadMarkworld'])->name('downloadworld');

});
