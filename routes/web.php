<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//front page views
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('aboutus', 'HomeController@about')->name('home.about');
Route::get('blogs', 'HomeController@blog')->name('home.blog');
Route::get('new/news', 'HomeController@news')->name('home.news');
Route::get('faq', 'HomeController@faq')->name('home.faq');
Route::get('contact', 'HomeController@contact')->name('home.contact');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

//for admin login page
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login');
//for changing mode
Route::get('change/mode', 'Admin\AdminController@changeMode')->name('change.theme.mode');

//for admin after logged in
Route::resource('admin/enquiry', 'Admin\EnquiryController');
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('password', 'AdminController@changePasswordPage')->name('reset.password.page');
    Route::post('password', 'AdminController@changePassword')->name('change.password');
    Route::get('profile', 'AdminController@showProfilePage')->name('change.profile');
    Route::post('update/profile','AdminController@updateProfile')->name('update.profile');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('setting', 'AdminController@setting')->name('admin.setting');
    Route::post('setting', 'AdminController@store')->name('setting.store');
    Route::resource('about', 'AboutController');
    Route::resource('services', 'ServicesController');
    Route::resource('news', 'NewsController');
    Route::resource('blog', 'BlogController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('question', 'FaqController');
    Route::resource('testimony', 'TestimonyController');
    Route::resource('slider', 'SliderController');
    Route::resource('team', 'OurTeamController');
});


Route::get('category-products/{slug}', 'HomeController@showProductAsCategory')->name('categories.product');
Route::get('category-services/{slug}', 'HomeController@showServicesAsCategory')->name('categories.service');
Route::get('single-product-details/{slug}', 'HomeController@singleProductDetail')->name('single.product.details');
Route::get('all/products', 'HomeController@allProducts')->name('all.product.list');
Route::get('description/blog/{id}', 'HomeController@displayBlogDescription')->name('description.blog');
Route::get('description/news/{id}', 'HomeController@displayNewsDescription')->name('description.news');
