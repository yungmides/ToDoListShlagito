<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your To-do lists') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route("to_do_lists.create")}}">
                    <button class="w-full p-6 bg-red-500 text-white border-b border-gray-200">
                        Create a new To-do list
                    </button>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @forelse ($toDoLists as $list)
                    <div class="col-span-full lg:col-span-1 w-full bg-white drop-shadow-lg rounded-lg p-10">
                        <div class="space-y-2 mb-8">
                            <p class="text-xl font-bold">{{$list->list_title}}</p>
                            <p>{{$list->description}}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{route('to_do_lists.edit', ['to_do_list' => $list->id])}}">
                                <button class="px-4 py-2 text-white rounded-md bg-green-500 h-full w-full">Edit your list</button>
                            </a>
                            <a href="{{route('to_do_lists.list_items.index', ['to_do_list' => $list->id])}}">
                                <button class="px-4 py-2 text-white rounded-md bg-blue-500 w-full">View your tasks</button>
                            </a>
                            <form method="POST" class="col-span-full" action="{{route('to_do_lists.destroy', ['to_do_list' => $list->id])}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="px-4 py-2 text-white rounded-md bg-red-500 w-full">Delete list</button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            No To-do lists were found. Maybe create one ?
                        </div>
                    </div>
                @endforelse
            </div>


        </div>
    </div>
</x-app-layout>
