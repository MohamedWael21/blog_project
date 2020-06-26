<?php

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


Route::get("/gate","maincontroller@showLogin")->name('login'); //Route for login and signin page

Route::post('/register', "maincontroller@signIn")->name("regs"); // Route for submit data for signin

Route::post('/login', "maincontroller@logIn")->name("log"); // Route for login the user

Route::get("/logout","maincontroller@logOut")->name("logout"); // Route for logout

Route::group(['middleware' => 'auth'], function () { // group the Routes for auth

    Route::get('/',"maincontroller@showHome")->name("home");  // Route for Home if user is auth
    Route::get("/add","maincontroller@showAdd"); // Route for show add posts page
    Route::post('/add-posts','postController@addPOST')->name('add'); // Route for add post 
    Route::get('/posts',"postController@showPosts")->name('posts'); // Route for show all posts
    Route::get('/posts/{id}',"postController@showPost"); // Route for show specific post 
    Route::post('/delete/{id}',"postController@deletePost"); // Route for delete post by id
    Route::get('/update/{id}',"postController@showUpdatePost"); // Route for show update post page by id
    Route::post('/update/{id}',"postController@updatePost")->name('update'); // Route for update post by id
    Route::get('/profile',"maincontroller@showProfile"); // Route for show profile page     
});



