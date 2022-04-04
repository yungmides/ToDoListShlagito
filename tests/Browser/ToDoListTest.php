<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ToDoListTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testUser = User::factory()->createOne([
            "email" => "test@test.com"
        ]);
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNoListCreated()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->testUser)
                    ->visitRoute('to_do_lists.index')
                    ->assertAuthenticatedAs($this->testUser)
                    ->assertSee("No To-do lists were found. Maybe create one ?");
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateList()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->testUser)
                ->visitRoute('to_do_lists.create')
                ->type('list_title', 'My To-do list')
                ->type('description', "My great description")
                ->press("Create")
                ->assertRouteIs('to_do_lists.index')
                ->assertSee("My To-do list");
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditList()
    {
        $this->testUser->toDoLists()->create([
            "list_title" => "My To-do list",
            'description' => "My great description"
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->testUser)
                ->visitRoute('to_do_lists.index')
                ->assertSee("Edit your list")
                ->press("Edit your list")
                ->type('list_title', 'My super To-do list')
                ->type('description', "My awesome & great description")
                ->press("Edit")
                ->assertRouteIs('to_do_lists.index')
                ->assertSee("My super To-do list");
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDeleteList()
    {
        $this->testUser->toDoLists()->create([
            "list_title" => "My To-do list lol",
            'description' => "My great and amazing description"
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->testUser)
                ->visitRoute('to_do_lists.index')
                ->assertSee("Delete list")
                ->press("Delete list")
                ->assertRouteIs('to_do_lists.index')
                ->assertSee("No To-do lists were found. Maybe create one ?");
        });
    }

    public function testViewEmptyTaskList()
    {
        $emptyList = $this->testUser->toDoLists()->create([
            "list_title" => "My empty To-do list",
            'description' => "My great and amazing description"
        ]);

        $this->browse(function (Browser $browser) use ($emptyList) {
            $browser->loginAs($this->testUser)
                ->visitRoute('to_do_lists.index')
                ->assertSee("View your tasks")
                ->press("View your tasks")
                ->assertRouteIs('to_do_lists.list_items.index', ["to_do_list" => $emptyList])
                ->assertSee("No tasks were found. Maybe create one ?");
        });
    }
}
