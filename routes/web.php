<?php

use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionnaireController;

Route::get('/', function () {
    return view('blog.index');
})->name('home');


Route::get('/about-us', function () {
    return view('blog.about-us');
})->name('about-us');


Route::get('/gallery', function () {
    return view('blog.gallery');
})->name('gallery');


Route::get('/contacts', function () {
    return view('blog.contacts');
})->name('contacts');


Route::get('/log-in', function () {
    return view('blog.log-in');
})->name('log-in');

Route::get('/register', function () {
    return view('blog.register');
})->name('register');



Route::get('/questionnaire/{form}', 
    [QuestionnaireController::class, 'show']
)->name('questionnaire.show');

Route::post('/questionnaire/{form}', 
    [QuestionnaireController::class, 'store']
)->name('questionnaire.store');





Route::get('/dashboard', function(){
    $user = Auth::user();
    
    return view('dashboard.index', compact('user'));
})->name('dashboard');


Route::post('register', [AuthController::class, 'register']);


Route::post('log-in',[AuthController::class, 'login']);

Route::post('log-in',[AuthController::class, 'login']);

Route::get('logout',[AuthController::class, 'logout']);





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
