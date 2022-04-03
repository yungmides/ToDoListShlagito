<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListItemRequest;
use App\Http\Requests\UpdateListItemRequest;
use App\Models\ListItem;
use App\Models\ToDoList;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListItemRequest $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit(ListItem $listItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListItemRequest  $request
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListItemRequest $request, ListItem $listItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListItem $listItem)
    {
        //
    }
}
