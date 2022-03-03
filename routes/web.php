<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
});

Route::post('/upload-file', function (Request $request) {
    $request->validate([
        'file' => 'required|max:2048|image',
    ]);

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();
    Storage::disk('public')->put($fileName , file_get_contents($file));
    return back()
        ->with('success','You have successfully uploaded file.');
})->name('upload-file');
