<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Course;
use App\Models\Comments;
use App\Models\Therapists;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get/news', function(request $request){
    return DB::table('news')->get();
});

Route::get('/get/course', function(request $request){
    return DB::table('news')->get();
});

Route::get('/get/course1', function(request $request){
    return DB::table('news')->get();
});

Route::get('/get/course2', function(request $request){
    return DB::table('news')->get();
});

Route::get('/get/course3', function(request $request){
    return DB::table('news')->get();
});

Route::get('/get/comments', function(request $request){
    return DB::table('comments')->get();
});

Route::get('/get/comment/{newsID}', function(request $request, $newsID){
    return DB::table('comments')
    ->where('news_id', '=', $newsID)
    ->get();
});

Route::get('/get/therapist', function(request $request){
    return DB::table('therapists')->get();
});

Route::get('/get/users', function(request $request){
    return DB::table('users')->get();
});

//POST API

Route::post('/post/news', function(request $request){

    $news = new News;

    $news->title = $request->title;
    $news->content = $request->content;

    $name = $request->file('file')->getClientOriginalName();
    $news->image = $name;

    $news->save();

    $path = public_path('images/news');
    $attachment = $request->file('file');
    
    $attachment->move($path, $name);

});

Route::post('/post/course', function(request $request){

    $course = new Course;

    $course->title = $request->title;
    $course->category_id = $request->category_id;
    $course->content = $request->content;

    $name = $request->file('file')->getClientOriginalName();
    $course->image = $name;

    $course->save();

    $path = public_path('images/courses');
    $attachment = $request->file('file');
    $attachment->move($path, $name);
});

Route::post('/post/comment', function(request $request){

    $comment = new Comments;

    $comment->user_id = '1';
    // $comment->user_id = auth()->user()->id;
    $comment->news_id = $request->user_id;
    $comment->comment = $request->comment;
    
    $comment->save();
});

Route::post('/post/therapist', function(request $request){

    $therapist = new Therapists;

    $therapist->firstname = $request->firstname;
    $therapist->lastname = $request->lastname;
    $therapist->age = $request->age;
    $therapist->phone = $request->phone;
    $therapist->address = $request->address;
    $therapist->description = $request->description;

    $name = $request->file('file')->getClientOriginalName();
    $therapist->profile = $name;

    $therapist->save();

    $path = public_path('images/therapists');
    $attachment = $request->file('file');
    
    $attachment->move($path, $name);
});

Route::post('/post/user', function(request $request){

});