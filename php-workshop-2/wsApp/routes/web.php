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

Route::get('/', function () {
    $url = 'https://www.greenvillesc.gov/RSSFeed.aspx?ModID=1&CID=City-Greenville-Latest-News-15';
    $rss = Feed::loadRss($url);
    return view('greenville', ['items' => $rss->item]);
});

Route::get('/teams', function() {
   return \App\Team::all(); 
});