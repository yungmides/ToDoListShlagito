<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ListItemTest extends DuskTestCase
{

    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->createOne([
            "email" => "testlist@test.com"
        ]);
        $this->listOne = $this->user->toDoLists()->create([
            "list_title" => "My first To-do list",
            "description" => "Just a regular description"
        ]);
        $this->listTwo = $this->user->toDoLists()->create([
            "list_title" => "My second To-do list",
            "description" => "Just a regular description"
        ]);

    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNoListItemsFound()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visitRoute('to_do_lists.list_items.index', ["to_do_list" => $this->listOne])
                    ->assertSee($this->listOne->list_title)
                    ->assertSee("No tasks were found. Maybe create one ?");
        });
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateDoneTask()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visitRoute('to_do_lists.list_items.create', ["to_do_list" => $this->listOne])
                ->type('item_name', "Do the dishes")
                ->type('item_content', "Help me")
                ->check('done')
                ->press("Create")
                ->assertRouteIs('to_do_lists.list_items.index', ["to_do_list" => $this->listOne])
                ->assertSee("Do the dishes")
                ->assertSee("This task is done.");
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUpdateNotDoneTask()
    {
        $itemOne = $this->listOne->listItems()->create([
            "item_name" => "Wash my car",
            "item_content" => "I really need to wash my car",
            "done" => true
        ]);

        $this->browse(function (Browser $browser) use ($itemOne) {
            $browser->loginAs($this->user)
                ->visitRoute('list_items.edit', ["list_item" => $itemOne])
                ->type('item_name', "Wash my beautiful car")
                ->type('item_content', "Very important")
                ->uncheck('done')
                ->press("Edit")
                ->assertRouteIs('to_do_lists.list_items.index', ["to_do_list" => $this->listOne])
                ->assertSee("Wash my beautiful car")
                ->assertSee("Very important")
                ->assertDontSee("This task is done.");
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDeleteTask()
    {
        $this->listOne->listItems()->create([
            "item_name" => "Wash my car",
            "item_content" => "I really need to wash my car",
            "done" => true
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visitRoute('to_do_lists.list_items.index', ["to_do_list" => $this->listOne])
                ->assertSee("Delete item")
                ->press("Delete item")
                ->assertRouteIs('to_do_lists.list_items.index', ["to_do_list" => $this->listOne])
                ->assertDontSee("Wash my car")
                ->assertSee("No tasks were found. Maybe create one ?");
        });
    }

}
