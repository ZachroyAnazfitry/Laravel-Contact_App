<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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

//creating own route
// Route::get('contacts', function () {
//     return ('<h1>All Contacts </h1>');
// });

// Route::get('contacts/create', function () {
//     return ('<h1>Add New Contacts </h1>');
// });

//rendering blade template
// Route::get('/contacts', function () {
//     return view('contacts.index');
// });

// Route::get('/contacts/create', function () {
//      return view('contacts.create');
// });

//when code written in ContactsController, routes will define differently compared to above
// this is CRUD route, use resource
Route::resource('/contacts', ContactsController::class);
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');



//instructor method, using get
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
// Route::post('/contacts', ContactsController::class, 'store')->name('contacts/store');
// Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts.create');
// Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');


//linking different pages from homepage view
// Route::get('/contacts/{id}', function ($id) {
//     return App\Models\Contacts::find($id);
// });
