<?php

namespace Tests\Feature\ToDoList;

use App\Models\ListItem;
use App\Models\ToDoList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCascadeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_user_cascade()
    {
        $user = User::factory()->create();
        $list = $user->toDoLists()->create([
            "list_title" => $this->faker->text(50),
            "description" => $this->faker->realText
        ]);

        $user->delete();

        $this->assertModelMissing($list);
        $this->assertModelMissing($user);




    }
}
