<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoListRequest;
use App\Http\Requests\UpdateToDoListRequest;
use App\Models\ToDoList;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $toDoLists = ToDoList::where('user_id', Auth::id())->get();
        return view('to_do_lists.index', compact("toDoLists"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("to_do_lists.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToDoListRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreToDoListRequest $request)
    {
        $validated = $request->validated();

        $list = new ToDoList();
        $list->list_title = $validated["list_title"];
        $list->description = $validated["description"];
        $list->user_id = Auth::id();
        $list->save();

        return redirect()->route('to_do_lists.index')->with('success', 'To-do list successfully created !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoList $toDoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return Application|Factory|View
     */
    public function edit(ToDoList $toDoList)
    {
        return view('to_do_lists.edit', compact('toDoList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToDoListRequest  $request
     * @param  \App\Models\ToDoList  $toDoList
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateToDoListRequest $request, ToDoList $toDoList)
    {
        $validated = $request->validated();

        $toDoList->update([
            "list_title" => $validated["list_title"],
            "description" => $validated["description"]
        ]);

        return redirect()->route("to_do_lists.index")->with('success', 'To-do list successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ToDoList $toDoList)
    {
        if ($toDoList->user->id !== Auth::id()) {
            return redirect()->route('to_do_lists.index')->setStatusCode(403);
        }
        $toDoList->delete();
        return redirect()->route('to_do_lists.index')->with('success', 'To-do list successfully deleted !');
    }
}
