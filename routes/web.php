<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postCon;
use App\Http\Controllers\profileCon;
use App\Http\Controllers\coverCon;
use App\Http\Controllers\postLikeCon;
use App\Http\Controllers\commentCon;
use App\Http\Controllers\aboutMeCon;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Post route
Route::get('/addpost',[postCon::class,'index']);
Route::post('/savepost',[postCon::class,'savePost']);
Route::post('/savepostOnlyPost',[postCon::class,'storeOnlyPost']);
Route::delete('/deletepost/{post}',[postCon::class,'postDelete']);
//Route::get('/showOnlypost/{user}',[postCon::class,'showOwnPosts']);//show of his own posts in the profile page

//Profile route
Route::get('/createprofile',[profileCon::class,'index']);
Route::get('/profilepage/{user}',[profileCon::class,'show']);
Route::post('/savecreateprofile',[profileCon::class,'saveCreateProfile']);
//Update version of profile page
Route::get('/newVersionprofilepage/{user}',[profileCon::class,'newVersionprofilepageShow']);
//Edit profile
Route::get('/editprofile/{user}',[profileCon::class,'editProfile']);
Route::patch('/saveeditporfile/{user}',[profileCon::class,'saveEditProfile']);
Route::get('/editcoverphoto/{user}',[coverCon::class,'editCoverPhoto']);
Route::patch('saveeditcoverphoto/{user}',[coverCon::class,'saveEditCoverPhoto']);
//coverPhoto route
Route::get('/createcoverphoto',[coverCon::class,'index']);
Route::post('/savecreatecoverphoto',[coverCon::class,'saveCreateCoverPhoto']);
//AboutMe route
Route::get('aboutMe',[aboutMeCon::class,'showindex']);
Route::post('saveaboutMe',[aboutMeCon::class,'saveAboutMe']);
//Post like Route
Route::post('/like/{post}',[postLikeCon::class,'postlike']);
Route::post('/deletelike/{post}',[postLikeCon::class,'postlikeDelete']);
//comment route
Route::get('/viewcomments/{post}',[commentCon::class,'viewCommentPost']);
Route::post('/comment/{post}',[commentCon::class,'comment']);