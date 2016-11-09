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
    $tasks = DB::table("tasks")->select()->orderBy('created_at', 'asc')->get();

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
    $tasks = DB::table("tasks")->insert([
        "name" => $request->name,
        "done" => 0,
        "created_at" => \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now()
    ]);

    return redirect('/');
});
/**
 * Update Task
 */
Route::put('/task/{id}', function (Request $request,$id) {
    //ココで更新をする
    $tasks = DB::table("tasks")->where("id",$id)->update([
        "done" => $request->tobe,
        "updated_at" => \Carbon\Carbon::now()
    ]);


    return redirect('/');
});
/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id) {
    //ココで削除をする
    $tasks = DB::table("tasks")->where("id",$id)->delete();

    return redirect('/');
});
