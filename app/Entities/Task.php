<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/11/25
 * Time: 15:04
 */

namespace App\Entities;


class Task
{
    public $id;
    public $name;
    public $done;

    /**
     * Task constructor.
     * @param $id
     * @param $name
     * @param $done
     */
    public function __construct($id, $name, $done)
    {
        $this->id = $id;
        $this->name = $name;
        $this->done = $done;
    }
}