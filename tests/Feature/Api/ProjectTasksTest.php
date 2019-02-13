<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    protected $project;

    public function setUp()
    {
        parent::setUp();
        $this->project = factory('App\Project')->create();
    }

    /** @test */
    public function indexTask()
    {
        $this->get('/api/projects/' . $this->project->id . '/tasks')
            ->assertStatus(200);
    }

    /** @test */
    public function showTask()
    {
        $task = factory('App\Task')->create();

        $this->get('/api/projects/' . $task->project_id . '/tasks/' . $task->id)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'project_id',
                'description',
                'completed',
                'updated_at',
                'created_at',
            ])
            ->assertJson([
                'id' => $task->id,
                'project_id' => $task->project_id,
                'description' => $task->description,
                'completed' => $task->completed,
                'updated_at' => $task->created_at,
                'created_at' => $task->updated_at,
            ]);
    }

    /** @test */
    public function createTask()
    {
        $attributes = [
            'description' => 'Une description',
        ];

        $this->post('/api/projects/' . $this->project->id . '/tasks/', $attributes)
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'project_id',
                'description',
                // 'completed',
                'updated_at',
                'created_at',
            ])
            ->assertJson([
                'description' => $attributes['description'],
            ]);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test */
    public function editTask()
    {
        $attributes = [
            'description' => 'Une description',
            'completed' => true,
        ];

        $task = factory('App\Task')->create();

        $this->patch('/api/projects/' . $task->project_id . '/tasks/' . $task->id, $attributes)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'project_id',
                'description',
                'completed',
                'updated_at',
                'created_at',
            ])
            ->assertJson([
                'description' => $attributes['description'],
                'completed' => $attributes['completed'],
            ]);

        $this->assertDatabaseHas('tasks', $attributes + ['id' => $task->id]);
    }

    /** @test */
    public function deleteTask()
    {
        $task = factory('App\Task')->create();

        $this->delete('/api/projects/' . $task->project_id . '/tasks/' . $task->id)
            ->assertStatus(204);

            $this->assertDatabaseMissing('tasks', [
                'id' => $task->id,
            ]);
    }
}
