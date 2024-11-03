<?php

use App\Http\Controllers\AnswerController;
use App\Models\Image;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AssessmentController;
use App\Http\Middleware\RoleMiddleware as Role;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ValidateImageController;


Route::redirect('/', '/blog');

Route::prefix('blog')->group(function () {
    Route::view('/', 'blog.index')->name('home');

    Route::view('/about-us', 'blog.about-us')->name('about-us');

    Route::get('/gallery', function () {
        $images = Image::where('is_validated', true)->get();
        return view('blog.gallery', compact('images'));
    })->name('gallery');

    Route::view('/contacts', 'blog.contacts')->name('contacts');
    Route::view('/what-do-we-do', 'blog.what-do-we-do')->name('what-do-we-do');
});

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    })->name('dashboard');

    Route::get(
        '/assessment/{form}',
        [AssessmentController::class, 'show']
    )->name('assessment');

    // Ruta POST para almacenar el cuestionario respondido
    Route::post(
        '/assessment/{form}',
        [AssessmentController::class, 'store']
    )->name('assessment.store');


    Route::get(
        '/forms',
        [QuestionnaireController::class, 'show']
    )->name('forms');


    Route::resource('/form', FormController::class);

    Route::post('/forms/{form}/questions', [FormController::class, 'addQuestion'])->name('forms.addQuestion');
    Route::post('/questions/{question}/answers', [FormController::class, 'addAnswer'])->name('questions.addAnswer');


    Route::resource('/images', ImageController::class);

    Route::resource('/validate', ValidateImageController::class)->middleware([Role::class . ':Administrator']);

    Route::resource('/questions', QuestionController::class);

    Route::resource(('/answers'), AnswerController::class);
});



Route::get('/log-in', function () {
    return view('blog.log-in');
})->name('log-in');

Route::get('/register', function () {
    return view('blog.register');
})->name('register');


Route::post('register', [AuthController::class, 'register']);

Route::post('log-in', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
