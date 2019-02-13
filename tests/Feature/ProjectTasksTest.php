<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function add_task() {
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
}
