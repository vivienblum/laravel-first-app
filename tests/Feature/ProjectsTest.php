<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createProject()
    {
        $attributes = [
            'title' => 'Un titre',
            'description' => 'Une description',
        ];

        $this->post('/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function editProject()
    {
        $project = factory('App\Project')->create();

        $attributes = [
            'title' => 'Un nouveau titre',
            'description' => 'Une nouvelle description',
        ];

        $this->patch('/projects/' . $project->id, $attributes);

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function deleteProject()
    {
        $project = factory('App\Project')->create();

        $this->delete('/projects/' . $project->id);

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
