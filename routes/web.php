<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/* week3 lesson1 first section */
// Route::get('contact', function() {
//     $script = "<script>alert('Warning...!')</script>";
//     $data = request('name');
//     return view('contact', ['data'=>$data], ['script'=>$script]);
// });

// // Route wildcard
// Route::get('/{name}', function($name) {
//     return $name;
// });

/* week3 lesson1 second section */
/*
Route::get('/', function () {
    $data = ['Home_key'=>'Home_value'];
    return view('home', compact('data'));
});

Route::get('/about', function () {
    $data = ['About_key'=>'About_value'];
    return view('about', compact('data'));
});

Route::get('/contact', function () {
    $data = ['Contact_key'=>'Contact_value'];
    return view('contact', compact('data'));
});
*/

/* week3 lesson1 third section */
// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [HomeController::class, 'about']);
// Route::get('/contact', [HomeController::class, 'contact']);


/* week4 lesson1 */
Route::resource('posts', HomeController::class);

/* week4 lesson2 */
/* week4 lesson1 */
// Route::get('/posts/create', [HomeController::class, 'create'])->name('create');