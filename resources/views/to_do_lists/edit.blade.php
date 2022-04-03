<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update your To-do list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{route("to_do_lists.update", ["to_do_list" => $toDoList->id])}}" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <label class="block" for="list_title">
                        <span class="text-gray-700">List title</span>
                        <input type="text" required maxlength="50" name="list_title" value="{{$toDoList->list_title}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="My To-do list">
                    </label>
                    <label class="block" for="description">
                        <span class="text-gray-700">Description</span>
                        <textarea name="description" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{$toDoList->description}}</textarea>
                    </label>
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-green-500">Edit</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
