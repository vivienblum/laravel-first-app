<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function addTask()
    {
        $project = factory('App\Project')->create();

        $project->addTask([
            'description' => 'Test',
        ]);

        $this->assertEquals('Test', $project->tasks[0]->description);
    }
}
