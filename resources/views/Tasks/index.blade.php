<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('tasks.create') }}" 
                   class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Create Task
                </a>

                @if($tasks->isEmpty())
                    <p class="text-gray-500 mt-4">No tasks yet — create one!</p>
                @else
                    <table class="w-full mt-4 border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 text-left">Title</th>
                                <th class="p-2 text-left">Priority</th>
                                <th class="p-2 text-left">Status</th>
                                <th class="p-2 text-left">Deadline</th>
                                <th class="p-2 text-left">Actions</th>
                                <th class="p-2 text-left">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr class="border-t">
                                <td class="p-2">{{ $task->title }}</td>
                                <td class="p-2">{{ $task->priority }}</td>
                                <td class="p-2">{{ $task->status }}</td>
                                <td class="p-2">{{ $task->deadline }}</td>
                                <td class="p-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}" 
                                       class="text-blue-500">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" 
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 ml-2">Delete</button>
                                    </form>
                                </td>
                                <td class="p-2'>{{ $task -> <category-></category->category ? $task->category->name : 'No Category' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
