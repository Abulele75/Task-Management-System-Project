<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Task</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Title</label>
                        <input type="text" name="title" 
                               value="{{ $task->title }}"
                               class="border w-full p-2 rounded"/>
                    </div>

                    <div class="mb-4">
                        <label>Description</label>
                        <textarea name="description" 
                                  class="border w-full p-2 rounded">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>Priority</label>
                        <select name="priority" class="border w-full p-2 rounded">
                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Status</label>
                        <select name="status" class="border w-full p-2 rounded">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Deadline</label>
                        <input type="date" name="deadline" 
                               value="{{ $task->deadline }}"
                               class="border w-full p-2 rounded"/>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" 
                                class="bg-blue-500 text-white px-4 py-2 rounded">
                            Update Task
                        </button>
                        <a href="{{ route('tasks.index') }}" 
                           class="bg-gray-500 text-white px-4 py-2 rounded">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
