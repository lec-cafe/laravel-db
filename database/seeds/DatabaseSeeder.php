<?php

use Illuminate\Database\Seeder;
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Task::create([
            "name" => "牛乳を買う",
            "done" => 0
        ]);
        Task::create([
            "name" => "部屋の掃除をする",
            "done" => 1
        ]);
    }
}
