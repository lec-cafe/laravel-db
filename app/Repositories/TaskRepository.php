<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/11/25
 * Time: 14:59
 */

namespace App\Repositories;

use App\Model\Task;
use App\Entities\Task as Entity;

class TaskRepository
{
    public function getTasks(){
        $results = Task::all();

        $rtn = [];
        foreach ($results as $result) {
            $rtn[] = new Entity($result->id,$result->name,$result->done);
        }
        return $rtn;
    }

    public function create($name,$done):Entity{
        $task = Task::create([
            "name" => $name,
            "done" => $done
        ]);
        return new Entity($task->id,$task->name,$task->done);
    }

    public function update($id,$done):Entity{
        $task = Task::find($id);
        $task->done = $done;
        $task->save();
        return new Entity($task->id,$task->name,$task->done);
    }

    public function delete($id){
        Task::find($id)->delete();
    }

}