<?php

namespace Tests\Unit;

use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testCanCreate()
    {
        $data = Task::factory()->raw();

        //When user submits post request to create task endpoint
        $this->post(route('tasks.store'), $data);

        //It gets stored in the database
        $this->assertEquals(1, Task::all()->count());
    }

    public function testCanUpdate() {
        $task = Task::factory()->create();
        $task->name = 'Updated name';

        //When the user hit's the endpoint to update the task
        $this->put(route('tasks.update', $task->id), $task->toArray());

        //The task should be updated in the database.
        $updatedTask = Task::find($task->id);
        $this->assertEquals($task->name, $updatedTask->name);
    }

    public function testCanShow() {
        $task = Task::factory()->create();

        //When user visit the task's URI
        $response = $this->get('/tasks/' . $task->id);

        //He can see the task details
        $response->assertSee($task->name);
    }

    public function testCanDelete() {
        $task = Task::factory()->create();

        //When the user hit's the endpoint to delete the task
        $this->delete('/tasks/' . $task->id);

        //The task should be deleted from the database.
        $this->assertDatabaseMissing('tasks', ['id'=> $task->id]);
    }

    public function testCanList() {
        $task = Task::factory()->create();

        //When user visit the tasks page
        $response = $this->get('/tasks');

        //He should be able to read the task
        $response->assertSee($task->name);
    }
}
