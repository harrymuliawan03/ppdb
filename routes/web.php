<?php

use App\Http\Controllers\Webcore\StudentController;
use App\Http\Controllers\Website\LoginStudentController;
use App\Http\Controllers\Website\PpdbController;
use App\Http\Controllers\Website\RegisterStudentController;
use App\Http\Controllers\Website\RegistrationController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('clear-cache', function () {
    // Artisan::call('schedule:run');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
});

Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index']);
Route::get('/visi-misi', [App\Http\Controllers\Website\VisiMisiController::class, 'index']);
Route::get('/ppdb', [App\Http\Controllers\Website\PpdbController::class, 'index']);

Route::middleware('prospective_students.guest')->group(function () {
    Route::get('/register-student', [RegisterStudentController::class, 'showFormRegister']);
    Route::post('/register-student', [RegisterStudentController::class, 'store']);
    Route::get('/login-student', [LoginStudentController::class, 'showLoginForm']);
    Route::post('/login-student', [LoginStudentController::class, 'login']);
    Route::get('/login', function () {return view('auth.login');});
});

Route::middleware('prospective_students')->group(function () {
    Route::get('/ppdb/register', [PpdbController::class, 'showFormRegisterPpdb']);
    Route::post('/ppdb/register', [PpdbController::class, 'registration']);
    Route::get('/ppdb/announcement', [PpdbController::class, 'announcement']);
    Route::get('/ppdb/already-registered', function() {
        return view('website.pages.ppdb_already_registered');
    })->name('ppdb_already_registered');
});

// WebCore
Route::middleware(['admin'])->group(function() {
    Route::get('/dashboard', 'Webcore\HomeController@index')->name('dashboard');
    Route::get('profile', 'Webcore\HomeController@profile')->name('profile');
    Route::post('profile/submit', 'Webcore\HomeController@update_profile')->name('profile.submit');
    
    Route::resource('permissiongroups', 'Webcore\PermissiongroupController');
    Route::resource('permissions', 'Webcore\PermissionController');
    Route::resource('roles', 'Webcore\RoleController');
    Route::post('users/permissions', 'Webcore\UserController@permissions')->name('users.permissions');
    Route::resource('users', 'Webcore\UserController');
    Route::resource('teachers', 'Webcore\TeacherController');
    Route::resource('staff_tus', 'Webcore\StaffTUController');
    Route::resource('students', 'Webcore\StudentController');
    
    Route::resource('majors', 'Webcore\MajorController');
    // Route::post('importMajor', 'MajorController@import');

    Route::resource('prospectiveStudents', 'Webcore\ProspectiveStudentController');
    // Route::post('importProspectiveStudent', 'ProspectiveStudentController@import');

    Route::resource('registrations', 'Webcore\RegistrationController');
    Route::get('registration-success', 'Webcore\RegistrationController@indexSuccess')->name('registrations.success');
    // Route::post('importRegistration', 'RegistrationController@import');
    
    Route::resource('sppPayments', 'Webcore\SppPaymentController');
    Route::get('sppPayments-generate', 'Webcore\SppPaymentController@generate')->name('sppPayments.generate');
    // Route::post('importSppPayment', 'SppPaymentController@import');
    
    Route::resource('paymentDetails', 'Webcore\PaymentDetailController');
    // Route::post('importPaymentDetail', 'PaymentDetailController@import');

    Route::resource('schoolClasses', 'SchoolClassController');
    // Route::post('importSchoolClass', 'SchoolClassController@import');
    
    Route::resource('subjects', 'SubjectController');
    // Route::post('importSubject', 'SubjectController@import');
    
    Route::resource('studentGrades', 'StudentGradeController');
    Route::get('/get-students/{classId}', [App\Http\Controllers\StudentGradeController::class, 'getStudentsByClass']);
    // Route::post('importStudentGrade', 'StudentGradeController@import');
});

