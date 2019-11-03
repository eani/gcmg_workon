<?php

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


Route::get('/', 
	function () {
    return view('welcome2');
});

//Protected Routes
Route::group(['middleware' => ['auth']], function () {

Route::get('/dashboard', 
	function () {
    return view('auth/login');
});

Route::get('/admin', 'CategoryController@viewdash')->name('admin');    

});



///////////////////////////////////// VIEW ALL LINK ROUTE //////////////////////////////////////////////
                                                                                                      //
Route::get('/applications/view-all', 'ApplicationController@viewAll')->name('applications.viewall');  //
Route::get('/audio/view-all', 'AudioController@viewAll')->name('audio.viewall');                      //
Route::get('/books/view-all', 'BookController@viewAll')->name('books.viewall');                       //
Route::get('/videos/view-all', 'VideoController@viewAll')->name('videos.viewall');                    //
Route::get('/categories/view-all', 'CategoryController@viewAll')->name('categories.viewall');         //
                                                                                                      //
////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////Thumbnail Link////////////////////////////////////////////////////
																										//
Route::get('/admin_assets/assets/images/application.png', function(){})->name('application.thumb');     //
Route::get('/admin_assets/assets/images/audio.jpg', function(){})->name('audio.thumb');                 //
Route::get('/admin_assets/assets/images/book.svg', function(){})->name('book.thumb');                   //
Route::get('/admin_assets/assets/images/video.jpg', function(){})->name('video.thumb');                 //
                        																				//
//////////////////////////////////////////////////////////////////////////////////////////////////////////

   

///////////////////////////////////////// Application Controller Route /////////////////////////////////////////////////////////////////
																																	 ///
Route::resource('applications', ApplicationController::class);                                                                       ///
Route::get('/applications/category/{category}', 'ApplicationController@selectCategoryList')->name('selectCategoryList');             ///
Route::get('/applications/category/{category}/media/{media}', 'ApplicationController@getCategoryMedia')->name('getCategoryMedia');   ///
Route::resource('applications-media', ApplicationsMediaController::class);                                                           ///
																																	 ///
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////// Audio Conotroller Route //////////////////////////////////////////////////////////////////
																																	 ///
Route::resource('audio', AudioController::class);																					 ///
Route::get('/audio/category/{category}', 'AudioController@selectCategoryListAudio')->name('selectCategoryListAudio');                ///
Route::get('/audio/category/{category}/media/{media}', 'AudioController@getCategoryMediaAudio')->name('getCategoryMediaAudio');      ///
Route::resource('audio-media', AudiosMediaController::class);                                                                        ///
																																	 ///
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////// Book Controller Route /////////////////////////////////////////////////////////////////
 																																	 ///
Route::resource('books', BookController::class); 																				     ///
Route::get('/book/category/{category}', 'BookController@selectCategoryListBook')->name('selectCategoryListBook');                    ///
Route::get('/book/category/{category}/media/{media}', 'BookController@getCategoryMediaBook')->name('getCategoryMediaBook');          ///
Route::resource('books-media', BooksMediaController::class);                                                                         ///
																																	 ///
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////// Video Controller Route /////////////////////////////////////////////////////////////////
																																	 ///
Route::resource('videos', VideoController::class);                                                                                   ///
Route::get('/videos/category/{category}', 'VideoController@selectCategoryListVideo')->name('selectCategoryListVideo');               ///
Route::get('/videos/category/{category}/media/{media}', 'VideoController@getCategoryMediaVideo')->name('getCategoryMediaVideo');     ///
Route::resource('videos-media', VideosMediaController::class);         																 ///
																																	 ///
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////// Category Controller Route ////////////////////////////////////////////////////////////
																																	 ///
Route::resource('categories', CategoryController::class);                                                                            ///
																																	 ///
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'CategoryController@viewdash')->name('home');         



Auth::routes();

/////////////////////////////////////// Frontend Download Link Route //////////////////////////////////////////////////////////////////
																																	/// 
Route::get('/uploads/application/{application}', function(){})->name('application_file');                                           ///
Route::get('/uploads/audio/{audio}', function(){})->name('audio_file'); 															///
Route::get('/uploads/book/{book}', function(){})->name('book_file');																///
Route::get('/uploads/video/{video}', function(){})->name('video_file');																///
																																	///
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


