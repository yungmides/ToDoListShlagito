<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $toDoList->list_title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route("to_do_lists.list_items.create", ['to_do_list' => $toDoList->id])}}">
                    <button class="w-full p-6 bg-red-500 text-white border-b border-gray-200">
                        Create a new task
                    </button>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @forelse ($toDoList->listItems as $item)
                    <div class="col-span-full lg:col-span-1 bg-white w-full drop-shadow-lg  rounded-lg p-10">
                        <div class="space-y-2 mb-8">
                            <p class="text-xl font-bold">{{$item->item_name}}</p>
                            <p>{{$item->item_content}}</p>
                            @if($item->done)
                                <p class="text-green-500">This task is done.</p>
                            @endif
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{route('list_items.edit', ['list_item' => $item->id])}}">
                                <button class="px-4 py-2 text-white rounded-md bg-green-500 h-full w-full">Edit item</button>
                            </a>
                            <form method="POST" action="{{route('list_items.destroy', ['list_item' => $item->id])}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="px-4 py-2 text-white rounded-md bg-red-500 w-full">Delete item</button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            No tasks were found. Maybe create one ?
                        </div>
                    </div>
                @endforelse
            </div>


        </div>
    </div>
</x-app-layout>
