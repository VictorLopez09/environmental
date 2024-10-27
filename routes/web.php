<?php

use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QuestionnaireController;


Route::redirect('/', '/blog');

Route::prefix('blog')->group(function () {
    Route::view('/', 'blog.index')->name('home');
    Route::view('/about-us', 'blog.about-us')->name('about-us');
    Route::view('/gallery', 'blog.gallery')->name('gallery');
    Route::view('/contacts', 'blog.contacts')->name('contacts');
    Route::view('/what-do-we-do', 'blog.what-do-we-do')->name('what-do-we-do');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    })->name('dashboard');

    Route::get(
        '/questionnaire/{form}',
        [QuestionnaireController::class, 'show']
    )->name('administer')->middleware([RoleMiddleware::class . ':Normal']);

    // Ruta POST para almacenar el cuestionario respondido
    Route::post(
        '/questionnaire/{form}',
        [QuestionnaireController::class, 'store']
    )->name('administer.store');


    Route::get(
        '/forms',
        [QuestionnaireController::class, 'show']
    )->name('forms');


    Route::resource('/form', FormController::class);



});



Route::get('/log-in', function () {
    return view('blog.log-in');
})->name('log-in');

Route::get('/register', function () {
    return view('blog.register');
})->name('register');





Route::post('register', [AuthController::class, 'register']);


Route::post('log-in', [AuthController::class, 'login']);


Route::get('logout', [AuthController::class, 'logout'])->name('logout');





// Route::get('/questionnaire', function () {
//     // $questions = Question::with('answers')->get();
//     // return view('dashboard.questionnaire', ['questions' => $questions]);


//     $form = Form::with('questions.answers')->findOrFail(1);
        
//     // Pasar el formulario a la vista
//     return view('dashboard.questionnaire', compact('form'));
// });







/*
Route::get('/prueba', function () {
    return view('blog.index');
});


Contacts
Gallery
about-us.blade
Log In
register
*/
