<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addTask()
    {
        $project = factory('App\Project')->create();

        $attributes = [
            'description' => 'Une description'
        ];

        $this->post('/projects/' . $project->id . '/tasks', $attributes);

        $this->assertDatabaseHas('tasks', [
            'description' => $attributes,
            'project_id' => $project->id,
        ]);
    }

    /** @test */
    public function completeTask()
    {
        $project = factory('App\Project')->create();

        $task = factory('App\Task')->create();

        $attributes = ['completed' => 'on'];

        $this->patch('/tasks/' . $task->project_id, $attributes);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'project_id' => $task->project_id,
            'completed' => $attributes['completed'],
        ]);
    }
}
