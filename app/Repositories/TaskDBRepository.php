<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/11/25
 * Time: 14:59
 */

namespace App\Repositories;

use Carbon\Carbon;
use DB;
use App\Entities\Task as Entity;

class TaskDBRepository extends TaskRepository
{
    public function getTasks(){
        $results = DB::table("tasks")->limit(5)->orderBy("created_at","DESC")->get();

        $rtn = [];
        foreach ($results as $result) {
            $rtn[] = new Entity($result->id,$result->name,$result->done);
        }
        return $rtn;
    }

    public function delete($id){
        DB::table("tasks")->where("id",$id)->delete();
    }

}