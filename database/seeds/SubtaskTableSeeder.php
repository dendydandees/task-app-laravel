<?php

use App\Task;
use App\Subtask;
use Illuminate\Database\Seeder;

class SubtaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all task
        $tasks = Task::all();

        // loop through each task
        foreach ($tasks as $task) {
            // determine how many subtask to create for the task
            $limit = random_int(1, 3);

            // create a new subtask until the limit is hit
            for ($i = 0; $i < $limit; $i++) {
                // make a new random subtask
                $subtask = factory(Subtask::class)->make();

                // associate the subtask to the task
                $subtask->task()->associate($task);

                // save the subtask
                $subtask->save();
            }
        }
    }
}
