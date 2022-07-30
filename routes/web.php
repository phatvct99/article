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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 
Route::group(['namespace'=>'frontend'], function(){
    Route::get('/','HomeController@index')->name('frontend.home.index');

    Route::group(['prefix'=>''],function()
        {
            Route::get('/details1','PostsController@details1')->name('frontend.posts.details1'); 
            Route::get('/details1/{id}', 'PostsController@getArticleDetails')->name('post-details');
            //Route::get('/details2','PostsController@details2')->name('frontend.posts.details2');
        });
   
    

  
    //Route::get('/category/{id}', [HomeController::class,'getCategory']);    
});

//Backend
Route::group(['namespace'=>'backend', 'prefix' => 'admin','middleware' => 'auth:sanctum', 'verified'], function(){
    Route::get('/','DashboardController@index')->name('backend.index');

    Route::group(['prefix'=>'posts'],function()
    {
        Route::get('/','PostsController@index')->name('backend.posts.index');
        Route::get('/create','PostsController@create')->name('backend.posts.create');
        Route::post('/create','PostsController@store');
        Route::get('/update/{id}','PostsController@edit')->name('backend.posts.edit');
        Route::post('/update/{id}','PostsController@update');
        Route::get('/{action}/{id}','PostsController@action')->name('backend.posts.delete');
    });

    Route::get('/crawl', function() {
        $crawler = Goutte::request('GET', 'https://vatlieuxaydung.org.vn/vlxd-ket-cau-192');
        $crawler->filter('.result__title .result__a')->each(function ($node) {
          dump($node->text());
        });
        return view('welcome');
    });
    
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:sanctum']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});