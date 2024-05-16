<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Admin\ImageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\GalleryController;

Route::group(
    [
        'namespace' => 'Frontend',
        'as' => 'frontend.',
    ],
    function () {
        require base_path('routes/frontend/frontend.php');
    },
);

// Bakcend
Route::get('admin/images/browse', [ImageController::class, 'browse'])->name('admin.images.browse');
Route::post('admin/images/upload', [ImageController::class, 'upload'])->name('admin.images.upload');
Route::post('admin/slider/updateOrder', [SliderController::class, 'updateOrder'])->name('admin.slider.updateOrder');
Route::post('admin/gallery/deleteImages', [GalleryController::class, 'deleteImages'])->name('admin.gallery.deleteImages');
// routes/web.php


// Admin Auth
// Route::prefix('admin_login')->group(function () {  -----OLD-----

Route::prefix('')->group(function () {
    Route::get('/login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('/login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
    Route::get('logout', 'Auth\Admin\LoginController@logout');
    Route::get('registration', 'Auth\Admin\LoginController@registration');
    Route::post('registration', 'Auth\RegisterController@register')->name('user.auth.registration');
});

// Admin Dashborad
Route::group(
    [
        'namespace' => 'Backend\Admin',
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'auth:admin',
    ],
    function () {
        require base_path('routes/backend/admin.php');
    },
);

// User Auth
Route::prefix('user_login')->group(function () {
    Route::get('login', 'Auth\User\LoginController@login')->name('user.auth.login');
    Route::post('login', 'Auth\User\LoginController@loginUser')->name('user.auth.loginUser');
    Route::post('logout', 'Auth\User\LoginController@logout')->name('user.auth.logout');

    Route::post('/cancelReservation/{reservation}', 'Backend\Admin\DashboardController@cancelReservation')->name('cancelReservation');

    Route::get('logout', 'Auth\User\LoginController@logout');
});

Route::post('register', [RegisterController::class, 'register'])->name('register.post');
// User Dashborad
Route::group(
    [
        'namespace' => 'Backend\User',
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => 'auth:user',
    ],
    function () {
        require base_path('routes/backend/user.php');
    },
);

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/usefullLink', [HomeController::class, 'usefullLink'])->name('usefullLink');
Route::get('/usefullLink/view/{id}', [HomeController::class, 'view'])->name('usefullLink.view');
Route::get('/subMenuDetail{id}', [HomeController::class, 'subMenuDetail'])->name('subMenuDetail');
Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::get('/career', [HomeController::class, 'career'])->name('career');

Route::get('/booking', [HomeController::class, 'booking'])->name('booking');

Route::get('/talk', [HomeController::class, 'talk'])->name('talk');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/Cstore', [HomeController::class, 'Cstore'])->name('contact.Cstore');
Route::post('/emails/emails-form', [ContactFormMail::class, 'emails-form'])->name('emails.contact-form');
// Route::get('/gallery-by-category/{categoryId}', [HomeController::class, 'galleryCategory'])->name('galleryCategory');
Route::get('/gallery-by-category/{categoryId}', [HomeController::class, 'galleryCategoryImages'])->name('galleryCategoryImages');
Route::get('/details/{type}/{id}', [HomeController::class, 'showDetails'])->name('showDetails');
Route::get('/submenu/{type}/{id}', [HomeController::class, 'showSubMenuDetails'])->name('showSubMenuDetails');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/error', [HomeController::class, 'error'])->name('error');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/Team-Details/{Pag_Id}', [HomeController::class, 'teamDetails'])->name('teamDetails');
Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');
Route::get('/facility', [HomeController::class, 'facility'])->name('facility');

Route::get('/service-details/{Pag_Id}', [HomeController::class, 'serviceDetails'])->name('serviceDetails');
Route::get('/blogs-details/{Pag_Id}', [HomeController::class, 'blogDetails'])->name('blogDetails');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/covid', [HomeController::class, 'covid'])->name('covid');
Route::get('/counselling', [HomeController::class, 'counselling'])->name('counselling');
Route::get('/underconstruction', [HomeController::class, 'underconstruction'])->name('underconstruction');
Route::get('/franchise', [HomeController::class, 'franchise'])->name('franchise');
Route::get('/calculator', [HomeController::class, 'calculator'])->name('calculator');
