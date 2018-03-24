<?php
use League\Csv\Reader;
use League\Csv\Statement;

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
    $csv = Reader::createFromPath(base_path('/docs/teams.csv'), 'r');
    $csv->setHeaderOffset(0); //set the CSV header offset
    
    //get 25 records starting from the 11th row
    $stmt = (new Statement())
        ->offset(0)
        ->limit(5)
    ;
    
    $records = $stmt->process($csv);
    foreach ($records as $record) {
        //do something here
    }
    
    return $records;
    // return view('welcome');
    
});
