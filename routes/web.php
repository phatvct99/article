<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\crawl\ArticlesController;
use App\Http\Controllers\backend\crawl\CategoriesController;
use App\Http\Controllers\backend\crawl\HomeController;
use App\Http\Controllers\backend\crawl\ItemSchemaController;
use App\Http\Controllers\backend\crawl\LinksController;
use App\Http\Controllers\backend\crawl\WebsitesController;
use Goutte\Client;
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
        Route::get('/tin-tuc','PostsController@details1')->name('frontend.posts.details1'); 
        Route::get('/tin-tuc-{id}', 'PostsController@getArticleDetails')->name('post-details');
        Route::get('/tra-cuu-doanh-nghiep','BusinessController@index')->name('frontend.business.index');
        Route::get('/tra-cuu-doanh-nghiep-{tax}-{slug}', 'BusinessController@detail')->name('frontend.business.detail');
        Route::get('/tra-cuu', 'BusinessController@search')->name('search');
    });
    
    //Route::get('/category/{id}', [HomeController::class,'getCategory']);    
});

//Backend
Route::group(['namespace'=>'backend', 'prefix' => 'admin','middleware' => 'auth:sanctum', 'verified'], function(){
    Route::get('/','DashboardController@index')->name('backend.index');

    Route::group(['prefix'=>'posts'],function()
    {
        Route::get('/','PostsController@index')->name('backend.posts.index');
        Route::get('/diff/{id}','PostsController@diff')->name('backend.posts.diff');
        Route::get('/create','PostsController@create')->name('backend.posts.create');
        Route::post('/create','PostsController@add');
        Route::get('/update/{id}','PostsController@edit')->name('backend.posts.edit');
        Route::post('/update/{id}','PostsController@update');
        Route::get('/{action}/{id}','PostsController@action')->name('backend.posts.delete');
    });
    Route::group(['namespace'=>'crawl','prefix'=>'crawl'],function()
    {
        Route::get('/','HomeController@index');
        Route::get('/article-details/{id}', [HomeController::class,'getArticleDetails']);
        Route::get('/category/{id}', [HomeController::class,'getCategory']);

        Route::resource('/websites', WebsitesController::class);
        Route::resource('/categories', CategoriesController::class);
        Route::patch('/links/set-item-schema', [LinksController::class,'setItemSchema']);
        Route::post('/links/scrape',  'LinksController@scrape');
        Route::get('/links', 'LinksController@index');
        //Route::resource('/links', LinksController::class);
        Route::resource('/item-schema', ItemSchemaController::class);
        Route::resource('/articles', ArticlesController::class);

    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:sanctum']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});