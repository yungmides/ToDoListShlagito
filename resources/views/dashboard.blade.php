<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route("to_do_lists.index")}}">
                    <button class="w-full p-6 bg-blue-500 text-white border-b border-gray-200">
                        See your To-do lists
                    </button>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
