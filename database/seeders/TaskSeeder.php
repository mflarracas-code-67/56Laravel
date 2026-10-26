<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Buy groceries',
            'status' => 'pending',
        ]);

        Task::create([
            'title' => 'Submit report',
            'status' => 'pending',
        ]);

        Task::create([
            'title' => 'Fix login bug',
            'status' => 'done',
        ]);
    }
}