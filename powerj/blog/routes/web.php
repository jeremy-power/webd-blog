<?php

// App::bind('App\Billing\Stripe', function () {
//     return \App\Billing\Stripe(config('services.stripe.secret'));
// });
// $stripe = App::make('App\Billing\Stripe');
// $stripe = resolve('App\Billing\Stripe');
// $stripe = app('App\Billing\Stripe');
// dd($stripe); 

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

// use App\Task;

// Route::get('/', function () {
//     return view('welcome', [
//             'name' => 'World'

//         ]);
// });`

// Route::get('/', function () {
//     return view('welcome')->with('name', 'World');
// });

Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/posts', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentController@store');

// controller => PostsController
// Eloquent model => Post
// migration => create_posts_table

Route::get('/', function () {
    $name = "Jeremy";

    $tasks = DB::table('tasks')->get();

    return view('welcome', compact('name', 'tasks'));
});

// Route::get('/tasks', function () {

//     //$tasks = DB::table('tasks')->latest()->get();
//     $tasks = Task::all();

//     return view('tasks.index', compact('tasks'));
// });

// Route::get('/tasks/{task}', function ($id) {
//     $task = Task::find($id);

//     return view('tasks.show', compact('task'));
// });



Route::get('/about', function () {
    return view('about');
});
// Auth::routes();

Route::get('/home', 'PostController@index')->name('home');
//  Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy')->name('logout');