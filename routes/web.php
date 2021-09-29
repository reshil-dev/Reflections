<?php

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks/import', function () {
    //one time script, its better to write this as a console command
    //so that we can reuse it when new json files comes in, adding an imported flag will avaid duplications
    //Its always good to move the code to controller.

    return response('Already imported'); //already imported

    $json = Storage::disk('local')->get('todo.json');
    $tasks = json_decode($json, true);

    foreach ($tasks as $task) {
        foreach ($task as $key => $value) {
            if ($key == 'due_date') {
                $validTimeStamp = substr($value, 0, 10);
                $value = date('Y-m-d H:i:s', $validTimeStamp);
            }
            $insertArr[$key] = $value;
        }
        Task::create($insertArr);
    }
    return $tasks;
});
