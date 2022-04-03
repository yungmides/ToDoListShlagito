<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update your To-do list task') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{route("list_items.update", ["list_item" => $listItem->id])}}" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <label class="block" for="item_name">
                        <span class="text-gray-700">Item name</span>
                        <input type="text" value="{{$listItem->item_name}}" required maxlength="255" name="item_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="My To-do task">
                    </label>
                    <label class="block" for="item_content">
                        <span class="text-gray-700">Description</span>
                        <textarea name="item_content" maxlength="1000" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{$listItem->item_content}}</textarea>
                    </label>

                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center" for="done">
                                <input type="checkbox" name="done" {{$listItem->done ? 'checked' : ''}} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2">Is the task done ?</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-green-500">Edit</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
