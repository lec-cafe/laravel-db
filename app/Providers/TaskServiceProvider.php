<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/11/25
 * Time: 16:57
 */

namespace App\Providers;


use App\Repositories\TaskDBRepository;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TaskRepository::class,TaskDBRepository::class);
    }


}