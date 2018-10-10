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

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');

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