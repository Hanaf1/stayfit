<?php

use App\Models\Category;
use App\Events\PrivateChatEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NutrisiSettingController;
use App\Http\Controllers\ProfileDoctorController;
use App\Http\Controllers\ChatDoctorController;
use App\Http\Controllers\OrderController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return view('home',
    [
        "title" => "Home",
        'active' => 'Home',
        // 'categories' => Category::all(),
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'active' => 'About',
        "title"=>"About",
        "name" => "hanafi",
        "email"=> "riververy@gmail.com",
        "image"=> "fuyutsuki.jpeg"
    ]);
});


// all post
Route::get('/posts',[PostController::class,'index']);
// halaman single post
Route::get('/posts/{post:slug}',[PostController::class, 'show']); 

Route::get('/categories', function() {
    return view('categories', [
        'active'=> 'categories',
        'title' => 'Post categories' ,
        'categories' => Category::all(),
    ]);
});
                                                                                           

Route::get('/login', [LoginController::class, 'index' ])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index' ])->middleware('guest');    
Route::post('/register', [RegisterController::class, 'store' ]);




//auth

Route::middleware(['auth', 'checkRole:0'])->group(function () {
    Route::resource('users/recommendations', RecommendationController::class);
    Route::resource('users/profile', ProfileController::class);
    Route::get('users/konsulDoc', [ChatController::class, 'showConsultationView']);
    Route::get('users/membership', [OrderController::class, 'index']);
    Route::get('users', function () {
        return view('users.index');
    });
    Route::get('users/konsulDoc/chat/{doctorId}', [ChatController::class, 'showChat']);
    Route::post('users/konsulDoc/send/{doctorId}', [ChatController::class, 'sendMessage']);
   
});


Route::middleware(['auth', 'checkRole:1'])->group(function () {
    Route::get('doctor', function () {
        return view('doctor.index');
    });
    Route::resource('doctor/profiledoc', ProfileDoctorController::class);
    Route::get('doctor/konsultasi', [ChatDoctorController::class, 'showConsultationView']);
    Route::get('doctor/konsultasi/chat/{pasienId}', [ChatDoctorController::class, 'showChat']);
    Route::post('doctor/konsultasi/send/{pasienId}', [ChatDoctorController::class, 'sendMessage']);
});


Route::middleware(['auth', 'checkRole:2'])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
    Route::resource('admin/posts', DashboardPostController::class)->middleware('auth');
    Route::resource('admin/categories', AdminCategoryController::class);
    Route::resource('admin/settings', settingController::class);
    Route::resource('admin/nutrisi', NutrisiSettingController::class);

});
