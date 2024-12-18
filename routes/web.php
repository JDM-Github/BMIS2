<?php

use App\Http\Controllers\BaranggayCertificateController;
use App\Http\Controllers\BaranggayClearanceController;
use App\Http\Controllers\BlotterRecordController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\BusinessPermitController;
use App\Http\Controllers\CertificateOfIndencyController;
use App\Http\Controllers\CertificateOfResidencyController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DocumentAction\AcceptRequestDocumentController;
use App\Http\Controllers\DocumentAction\RejectRequestDocumentController;
use App\Http\Controllers\DocumentAction\ArchiveDocumentController;
use App\Http\Controllers\DocumentAction\UnArchiveDocumentController;
use App\Http\Controllers\FencingPermitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MedicalLegalCertificateController;
use App\Http\Controllers\RequestDocumentController;
use App\Http\Controllers\RequestForBuildingConstructionController;
use App\Http\Controllers\ResidentAction\AcceptResidentController;
use App\Http\Controllers\ResidentAction\ArchiveUserController;
use App\Http\Controllers\ResidentAction\ArchiveWalkInController;
use App\Http\Controllers\ResidentAction\RejectResidentController;
use App\Http\Controllers\ResidentAction\UnArchiveUserController;
use App\Http\Controllers\ResidentAction\UnArchiveWalkInController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserFeedBackController;
use App\Http\Controllers\UserIndexFeedbackController;
use App\Http\Controllers\WalkInController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications');


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(
    [
        'verify' => true
    ]
);

Route::get('/request-documents', [RequestDocumentController::class, 'index'])->name('request-documents.index');
// Route::put('archive-document/{resident}', ArchiveWalkInController::class)->name('archive');
// Route::put('unarchive-document/{resident}', UnArchiveWalkInController::class)->name('unarchive');


Route::middleware(['auth', 'verified', 'check_user_status'])->group(function () {

    Route::resources([
        'blotter' => BlotterRecordController::class,
        'request-document' => RequestDocumentController::class,
    ]);

    // Route::resource('request-documents', RequestDocumentController::class);

    Route::post('/send-email', [MailController::class, 'sendMail']);

    Route::middleware('role:resident')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::post('/feedback', UserFeedBackController::class)->name('feedback.store');
        // Route::post('/request-document', RequestDocumentController::class)->name('getnotif');

        Route::view('about', 'about')->name('about');


        // DOCUMENTS
        Route::get('document/modals-form/brgy-clearance', function () {
            return view('document.modals-form.brgy-clearance');
        })->name('document.modals-form.brgy-clearance');

        Route::get('document/modals-form/brgy-business-permit', function () {
            return view('document.modals-form.business-permit');
        })->name('document.modals-form.brgy-business-permit');

        Route::get('document/modals-form/brgy-request-building', function () {
            return view('document.modals-form.request-building');
        })->name('document.modals-form.brgy-request-building');

        Route::get('document/modals-form/brgy-certificate', function () {
            return view('document.modals-form.certificate');
        })->name('document.modals-form.brgy-certificate');

        Route::get('document/modals-form/brgy-complaint', function () {
            return view('document.modals-form.complaint');
        })->name('document.modals-form.brgy-complaint');

        Route::get('document/modals-form/brgy-medic', function () {
            return view('document.modals-form.medic');
        })->name('document.modals-form.brgy-medic');

        Route::get('document/modals-form/brgy-fencing', function () {
            return view('document.modals-form.fencing');
        })->name('document.modals-form.brgy-fencing');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('user-feedback', UserIndexFeedbackController::class)->name('feedback');
        // Route::get('/request-documents', [RequestDocumentController::class, 'index'])->name('request-documents.index');

        // PDF
        Route::get('brgy-certificate/{id}', BaranggayCertificateController::class)->name('brgy-certificate');
        Route::get('business-permit/{id}', BusinessPermitController::class)->name('business-permit');
        Route::get('certificate-of-indigency/{id}', CertificateOfIndencyController::class)->name('certificate-of-indigency');
        Route::get('certificate-of-residency/{id}', CertificateOfResidencyController::class)->name('certificate-of-residency');
        Route::get('complaint/{id}', ComplaintController::class)->name('complaint');
        Route::get('fencing-permit/{id}', FencingPermitController::class)->name('fencing-permit');
        Route::get('medical-legal-certificate/{id}', MedicalLegalCertificateController::class)->name('medical-legal-certificate');
        Route::get('request-for-building-construction/{id}', RequestForBuildingConstructionController::class)->name('request-for-building-construction');
        Route::get('brgy-clearance/{id}', BaranggayClearanceController::class)->name('brgy-clearance');

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        // Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');

        // RESOURCES
        Route::resources([
            'resident' => ResidentController::class,
            'house' => HouseController::class,
            'walkin' => WalkInController::class,
        ]);

        // DOCUMENT ACTION
        Route::put('accept-document/{requestDocument}', AcceptRequestDocumentController::class)->name('accept-document');
        Route::put('reject-document/{requestDocument}', RejectRequestDocumentController::class)->name('reject-document');
        Route::put('archive-resident-document/{requestDocument}', ArchiveDocumentController::class)->name('archive');
        Route::put('unarchive-resident-document/{requestDocument}', UnArchiveDocumentController::class)->name('unarchive');

        // RESIDENT ACTION
        Route::put('accept/{resident}', AcceptResidentController::class)->name('accept');
        Route::put('reject/{resident}', RejectResidentController::class)->name('reject');

        // RESIDENT ACTION
        Route::put('archive-document/{resident}', ArchiveWalkInController::class)->name('archive');
        Route::put('unarchive-document/{resident}', UnArchiveWalkInController::class)->name('unarchive');

        Route::put('archive-user/{resident}', ArchiveUserController::class)->name('archive');
        Route::put('unarchive-user/{resident}', UnArchiveUserController::class)->name('unarchive');

        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/bulletins/create', [BulletinController::class, 'create'])->name('bulletin.create');
        Route::post('/bulletins', [BulletinController::class, 'store'])->name('bulletin.store');
        Route::post('/bulletin/store-emergency', [BulletinController::class, 'storeEmergency'])->name('bulletin.storeEmergency');

    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
