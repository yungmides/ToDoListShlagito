<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListItemRequest;
use App\Http\Requests\UpdateListItemRequest;
use App\Models\ListItem;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(ToDoList $toDoList)
    {
        return view('to_do_lists.list_items.index', compact('toDoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(ToDoList $toDoList)
    {
        return view('to_do_lists.list_items.create', compact("toDoList"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListItemRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreListItemRequest $request, ToDoList $toDoList)
    {
        $validated = $request->validated();

        $listItem = new ListItem();
        $listItem->to_do_list_id = $toDoList->id;
        $listItem->item_name = $validated["item_name"];
        $listItem->item_content = $validated["item_content"];
        if ($request->has('done')) $listItem->done = true;
        $listItem->save();

        return redirect()->route('to_do_lists.list_items.index', ['to_do_list' => $toDoList->id])->with('success', 'To-do list task successfully created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function show(ListItem $listItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ListItem $listItem)
    {
        return view('to_do_lists.list_items.edit', compact("listItem"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListItemRequest  $request
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateListItemRequest $request, ListItem $listItem)
    {
        $validated = $request->validated();

        $listItem->update([
            "item_name" => $validated["item_name"],
            "item_content" => $validated["item_content"],
            "done" => $request->has('done')
        ]);

        return redirect()->route("to_do_lists.list_items.index", ["to_do_list" => $listItem->toDoList->id])->with('success', 'To-do list task successfully updated !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ListItem $listItem)
    {
        if ($listItem->toDoList->user->id !== Auth::id()) {
            return redirect()->route('to_do_lists.list_items.index')->setStatusCode(403);
        }
        $listItem->delete();
        return redirect()->route('to_do_lists.list_items.index', ["to_do_list" => $listItem->toDoList->id])->with('success', 'To-do list task successfully deleted !');
    }
}
