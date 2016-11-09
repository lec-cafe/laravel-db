<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    //ココで一覧を取り出す
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('task', [
        'tasks' => $tasks
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:10',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    //ココで登録処理をする
    $task = new Task;
    $task->name = $request->name;
    $task->done = false;
    $task->save();

    return redirect('/');
});
/**
 * Update Task
 */
Route::put('/task/{id}', function (Request $request,$id) {
    //ココで更新をする
    $task = Task::find($id);
    $task->done = $request->tobe;
    $task->save();

    return redirect('/');
});
/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id) {
    //ココで削除をする
    $task = Task::find($id);
    $task->delete();

    return redirect('/');
});
