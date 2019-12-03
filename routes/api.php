<?php

use Illuminate\Http\Request;

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


Route::prefix('hotels')->group(function ()
{
    foreach (File::allFiles(base_path('routes/api/hotels')) as $file)
    {
        require($file->getPathname());
    }
});