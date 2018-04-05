<?php

use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;

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

Route::middleware('api')->get('/teams', function (Request $request) {
    $csv = Reader::createFromPath(base_path('/docs/teams.csv'), 'r');
    $csv->setHeaderOffset(0); //set the CSV header offset

    $stmt = new Statement();
    $records = $stmt->process($csv);

    return $records;
});

Route::middleware('api')->get('/awesome', function (Request $request) {
    $people = [
        'Ryan McAwesome',
        'Gabriel Aragon',
        'James jameslastname',
        'Kraken Magoun',
        ];
    
    return $people;
});

// Original authentication scaffolding.
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
