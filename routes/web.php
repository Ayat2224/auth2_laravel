<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\EventSpeakerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\TeacherController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/','App\Http\Controllers\HomeController@index')->name('Home');
Route::get('/index','App\Http\Controllers\HomeController@index');
Route::get('/about-us','App\Http\Controllers\HomeController@AboutUs')->name('aboutus');
Route::get('/contact-us','App\Http\Controllers\HomeController@ContactUs')->name('contactus');
Route::post('/frontendregister','App\Http\Controllers\HomeController@Register');

Route::get('/admin','App\Http\Controllers\AdminController@Dashboard');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@Dashboard');
Route::get('/events','App\Http\Controllers\HomeController@Events')->name('events');
Route::get('/testimonials','App\Http\Controllers\HomeController@Testimonials')->name('testimonials');
Route::get('/event_details/{event_id}','App\Http\Controllers\HomeController@EventDetails')->name('event_details');
Route::get('/course_details/{course_id}','App\Http\Controllers\HomeController@CourseDetails')->name('course_details');
Route::post('/event_register','App\Http\Controllers\HomeController@EventRegister');

Route::post('/frontendregister','App\Http\Controllers\HomeController@Register');

//================== Course Moduel ==========================//
Route::resource('admin/courses', CourseController::class)->middleware('auth');
Route::resource('admin/sliders', SliderController::class)->middleware('auth');
Route::resource('admin/events', EventController::class)->middleware('auth');
Route::resource('admin/testimonials', TestimonialController::class)->middleware('auth');
Route::resource('admin/categories', CategoryController::class)->middleware('auth');
Route::resource('admin/news', NewsController::class)->middleware('auth');
Route::resource('admin/features', FeaturesController::class)->middleware('auth');
Route::resource('admin/teachers', TeacherController::class)->middleware('auth');

//================== Teacher Moduel ==========================//

Route::get('/admin/subcategories/{categorie_id}','App\Http\Controllers\CategoryController@SubCategory')->middleware('auth');
Route::post('/admin/subcategories/{categorie_id}','App\Http\Controllers\CategoryController@StoreSubCategory')->middleware('auth');
Route::delete('/admin/subcategories/{subcategorie_id}','App\Http\Controllers\CategoryController@DestroySubCategory')->middleware('auth');

Route::get('/admin/coursetopics/{course_id}','App\Http\Controllers\CourseController@CourseTopics')->middleware('auth');
Route::post('/admin/coursetopics/{course_id}','App\Http\Controllers\CourseController@StoreCourseTopics')->middleware('auth');
Route::delete('/admin/coursetopics/{coursetopic_id}','App\Http\Controllers\CourseController@DestroyCourseTopics')->middleware('auth');


Route::get('/admin/eventspeakers/{event_id}','App\Http\Controllers\EventController@EventSpeakers')->middleware('auth');

Route::post('/admin/eventspeakers','App\Http\Controllers\EventController@StoreEventSpeakers')->middleware('auth');

Route::delete('/admin/eventspeakers/{speaker_id}/{event_id}','App\Http\Controllers\EventController@DestroyEventSpeakers')->middleware('auth');
Route::get('/admin/eventspeakers/{event_id}','App\Http\Controllers\EventController@EventSpeakers')->middleware('auth');

Route::get('/admin/eventregistrations/{event_id}','App\Http\Controllers\EventController@EventRegistrations')->middleware('auth');

Route::post('/admin/update_event_register/{event_id}/{status}','App\Http\Controllers\EventController@UpdateEventRegister')->middleware('auth');



Route::get('/admin/eventphotos/{event_id}','App\Http\Controllers\EventController@EventPhotos')->middleware('auth');
Route::post('/admin/eventphotos/{event_id}','App\Http\Controllers\EventController@StoreEventPhotos')->middleware('auth');
Route::delete('/admin/eventphotos/{photo_id}','App\Http\Controllers\EventController@DestroyEventPhotos')->middleware('auth');


Route::resource('admin/speakers', SpeakerController::class)->middleware('auth');
Route::get('/admin/eventsspeakers/{speaker_id}','App\Http\Controllers\SpeakerController@EventSpeakers')->middleware('auth');;

Route::post('/admin/eventsspeakers','App\Http\Controllers\SpeakerController@StoreEventSpeakers')->middleware('auth');

Route::delete('/admin/eventsspeakers/{event_id}/{speaker_id}','App\Http\Controllers\SpeakerController@DestroyEventSpeakers')->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
