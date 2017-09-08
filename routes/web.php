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

Route::get('/issues', 'IssuesController@index');
Route::get('/issues/view', 'IssuesController@detail');

Route::get('fill', function(){
     $ag = new \Github\BugAggregator();

     $ag->run()->compare();

     return response()->json(['message', 'ok', 'new_bugs' => $ag->bugs]);
});
