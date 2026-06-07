<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Create Task</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label>Title</label>
                        <input type="text" name="title" class="border w-full p-2 rounded"/>
                    </div>

                    <div class="mb-4">
                        <label>Description</label>
                        <textarea name="description" class="border w-full p-2 rounded"></textarea>
                    </div>

                    <div class="mb-4">
                        <label>Category</label>
                        <select name="category_id" class="border w-full p-2 rounded">
                            <option value="">No Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Only admin can assign tasks --}}
                    @if(Auth::user()->role === 'admin')
                    <div class="mb-4">
                        <label>Assign To</label>
                        <select name="assigned_to" class="border w-full p-2 rounded">
                            <option value="">Unassigned</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="mb-4">
                        <label>Priority</label>
                        <select name="priority" class="border w-full p-2 rounded">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Status</label>
                        <select name="status" class="border w-full p-2 rounded">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Deadline</label>
                        <input type="date" name="deadline" class="border w-full p-2 rounded"/>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Create Task
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>