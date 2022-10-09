<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\crawl\ArticlesController;
use App\Http\Controllers\backend\crawl\CategoriesController;
use App\Http\Controllers\backend\crawl\HomeController;
use App\Http\Controllers\backend\crawl\ItemSchemaController;
use App\Http\Controllers\backend\crawl\LinksController;
use App\Http\Controllers\backend\PostsController;
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
        Route::get('/danh-muc-{category}','PostsController@getArticleByCategory')->name('frontend.posts.details1'); 
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
        Route::patch('/set-status', [PostsController::class,'setStatus']);
        Route::get('/update/{id}','PostsController@edit')->name('backend.posts.edit');
        Route::post('/update/{id}','PostsController@update');
        Route::get('/{action}/{id}','PostsController@action')->name('backend.posts.delete');
        Route::get('/history','PostsController@getHistory')->name('backend.posts.history');
    });
    Route::group(['namespace'=>'crawl','prefix'=>'crawl'],function()
    {
        Route::get('/','HomeController@index');
        Route::get('/article-details/{id}', [HomeController::class,'getArticleDetails']);
        Route::get('/category/{id}', [HomeController::class,'getCategory']);


        Route::get('/websites','WebsitesController@index')->name('backend.websites.index');
        Route::get('/websites/create','WebsitesController@create')->name('backend.websites.create');
        Route::post('/websites/create','WebsitesController@add');
        Route::get('/websites/update/{id}','WebsitesController@edit')->name('backend.websites.edit');
        Route::post('/websites/update/{id}','WebsitesController@update');
        Route::get('/websites/delete/{id}','WebsitesController@delete')->name('backend.websites.delete');


        Route::get('/categories','CategoriesController@index')->name('backend.categories.index');
        Route::get('/categories/create','CategoriesController@create')->name('backend.categories.create');
        Route::post('/categories/create','CategoriesController@add');
        Route::get('/categories/update/{id}','CategoriesController@edit')->name('backend.categories.edit');
        Route::post('/categories/update/{id}','CategoriesController@update');
        Route::get('/categories/delete/{id}','CategoriesController@delete')->name('backend.categories.delete');

        // Route::resource('/categories', CategoriesController::class);
        Route::patch('/links/set-item-schema', [LinksController::class,'setItemSchema']);
        Route::post('/links/scrape',  'LinksController@scrape');
        Route::get('/links', 'LinksController@index')->name('backend.links.index');;
        Route::get('/links/create','LinksController@create')->name('backend.links.create');
        Route::post('/links/create','LinksController@add');
        Route::get('/links/update/{id}','LinksController@edit')->name('backend.links.edit');
        Route::post('/links/update/{id}','LinksController@update');
        Route::get('/links/delete/{id}','LinksController@delete')->name('backend.links.delete');
        //Route::resource('/links', LinksController::class);

        //Route::resource('/item-schema', ItemSchemaController::class);
        Route::get('/item-schema','ItemSchemaController@index')->name('backend.item-schema.index');
        Route::get('/item-schema/create','ItemSchemaController@create')->name('backend.item-schema.create');
        Route::post('/item-schema/create','ItemSchemaController@add');
        Route::get('/item-schema/update/{id}','ItemSchemaController@edit')->name('backend.item-schema.edit');
        Route::post('/item-schema/update/{id}','ItemSchemaController@update');
        Route::get('/item-schema/delete/{id}','ItemSchemaController@delete')->name('backend.item-schema.delete');

        Route::resource('/articles', ArticlesController::class);

    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:sanctum']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});