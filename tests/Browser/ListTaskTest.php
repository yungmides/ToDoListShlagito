<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ListTaskTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testUser = User::factory()->createOne([
            "email" => "test@test.com"
        ]);
        $this->listOne = $this->testUser->toDoLists()->create([
            "list_title" => "My first To-do list",
            "description" => "Just a regular description"
        ]);
        $this->listTwo = $this->testUser->toDoLists()->create([
            "list_title" => "My second To-do list",
            "description" => "Just a regular description"
        ]);
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
}
