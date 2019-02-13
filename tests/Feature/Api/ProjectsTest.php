<?php

namespace Tests\Feature\Api;

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

        $this->post('/api/projects', $attributes)
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'title',
                'description',
                'updated_at',
                'created_at',
            ])
            ->assertJson([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
            ]);

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function editProject()
    {
        $attributes = [
            'title' => 'Un nouveau titre',
            'description' => 'Une nouvelle description',
        ];

        $project = factory('App\Project')->create();

        $this->patch('/api/projects/' . $project->id, $attributes)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'title',
                'description',
                'updated_at',
                'created_at',
            ])
            ->assertJson([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
            ]);

        $this->assertDatabaseHas('projects', $attributes + ['id' => $project->id]);
    }

    /** @test */
    public function deleteProject()
    {
        $project = factory('App\Project')->create();

        $this->delete('/api/projects/' . $project->id)
            ->assertStatus(204);

            $this->assertDatabaseMissing('projects', [
                'id' => $project->id,
            ]);
    }
}
