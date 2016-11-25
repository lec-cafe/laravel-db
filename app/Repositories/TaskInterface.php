<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/11/25
 * Time: 17:02
 */

namespace App\Repositories;


interface TaskInterface
{
    public function getTasks();

    public function create($name,$done):Entity;

    public function update($id,$done):Entity;

    public function delete($id);

}