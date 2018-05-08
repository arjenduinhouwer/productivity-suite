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

Route::get('/issues/view', 'IssuesController@detail');
Route::get('/issues/close', 'IssuesController@close');
Route::get('/issues', 'IssuesController@index');

Route::get('fill', function ()
{
    $ag = new \Github\BugAggregator();

    $ag->run()->compare();

    return response()->json(['message', 'ok', 'new_bugs' => $ag->bugs]);
});

Route::get('invoices', 'InvoicesController@index');
Route::post('invoices/upload', 'InvoicesController@upload');
Route::get('invoices/download', 'InvoicesController@download');


Route::get('/messages/create', 'MessagesController@create');
Route::post('/messages/store', 'MessagesController@store');

Route::get('convert/{mpg}', function($mpg) {
    $kpg = $mpg*1.609344;
    $kpl = $kpg/3.78541178;

    return number_format($kpl, 2) . ' km/l';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('map', 'MapController@index');

Route::get('editor', function(){
    return view('editor');
});

Route::post('editor', function(\Illuminate\Http\Request $request){
    $page = new App\Page;

    $page->content = $request->get('editor');
    $page->title = 'This is a test page';
    $page->slug = 'test-page';

    $page->save();
});

Route::get('page/{slug}', function($slug){
    $page = \App\Page::where('slug', $slug)->first();

    return view('page', compact('page'));
});

Route::prefix('projects')->namespace('Projects')->group(function(){

    Route::get('/', 'ProjectsController@index');
    Route::get('/create', 'ProjectsController@create');
    Route::post('/store', 'ProjectsController@store');
    Route::get('/edit/{id}', 'ProjectsController@edit');
    Route::put('/update/{id}', 'ProjectsController@update');
    Route::get('/create/delete/{id}', 'ProjectsController@delete');

});

Route::prefix('tasks')->group(function(){

    Route::get('/', 'TasksController@index');
    Route::get('/create', 'TasksController@create');
    Route::post('/store', 'TasksController@store');
    Route::get('/edit/{id}', 'TasksController@edit');
    Route::put('/update/{id}', 'TasksController@update');
    Route::get('/{id}/shift', 'TasksController@shift');
    Route::get('/delete/{id}', 'TasksController@destroy');

    route::get('solve/{id}', 'TasksController@solveTask');

});