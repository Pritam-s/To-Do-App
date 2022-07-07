<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @can('manage tasks')
                    <x-link href="{{ route('tasks.create') }}" class="m-4">Add new task</x-link>
                   @endcan
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Task name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created at
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Updated at
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>

                                @can('manage tasks')
                                <th scope="col" class="px-6 py-3">

                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $task->name }}
                                </th>


                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $task -> created_at}}
                                </th>

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $task -> updated_at}}
                                </th>



                                @can('manage tasks')
                                <td class="px-6 py-4">
                                    <x-link href="{{ route('tasks.edit', $task) }}" class="font-medium hover:underline">Edit</x-link>

                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-jet-danger-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-jet-danger-button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="2" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('No tasks found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>