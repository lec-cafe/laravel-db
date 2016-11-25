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
use App\Repositories\TaskRepository;

/**
 * Show Task Dashboard
 */
Route::get('/', function (TaskRepository $task) {
    $tasks = $task->getTasks();
    return view('task', [
        'tasks' => $tasks
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request,TaskRepository $task) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:10',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    //ココで登録処理をする
    $task->create($request->name,0);
    return redirect('/');
});
/**
 * Update Task
 */
Route::put('/task/{id}', function (Request $request,TaskRepository $task,$id) {
    //ココで更新をする
    $task->update($id,$request->tobe);
    return redirect('/');
});
/**
 * Delete Task
 */
Route::delete('/task/{id}', function (TaskRepository $task,$id) {
    //ココで削除をする
    $task->delete($id);
    return redirect('/');
});
