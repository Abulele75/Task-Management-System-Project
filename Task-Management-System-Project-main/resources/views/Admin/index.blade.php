<<<<<<< Updated upstream
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Admin Panel</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="font-bold text-lg mb-4">All Tasks</h3>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Title</th>
                            <th class="p-2 text-left">Created By</th>
                            <th class="p-2 text-left">Assigned To</th>
                            <th class="p-2 text-left">Status</th>
                            <th class="p-2 text-left">Deadline</th>
                            <th class="p-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="border-t">
                            <td class="p-2">{{ $task->title }}</td>
                            <td class="p-2">{{ $task->user->name ?? 'Unknown' }}</td>
                            <td class="p-2">{{ $task->assignedTo->name ?? 'Unassigned' }}</td>
                            <td class="p-2">{{ $task->status }}</td>
                            <td class="p-2">{{ $task->deadline }}</td>
                            <td class="p-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                   class="text-blue-500">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3 class="font-bold text-lg mt-8 mb-4">All Users</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Name</th>
                            <th class="p-2 text-left">Email</th>
                            <th class="p-2 text-left">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-t">
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ $user->role }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
=======
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Admin Panel</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="font-bold text-lg mb-4">All Tasks</h3>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Title</th>
                            <th class="p-2 text-left">Created By</th>
                            <th class="p-2 text-left">Assigned To</th>
                            <th class="p-2 text-left">Status</th>
                            <th class="p-2 text-left">Deadline</th>
                            <th class="p-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="border-t">
                            <td class="p-2">{{ $task->title }}</td>
                            <td class="p-2">{{ $task->user->name ?? 'Unknown' }}</td>
                            <td class="p-2">{{ $task->assignedTo->name ?? 'Unassigned' }}</td>
                            <td class="p-2">{{ $task->status }}</td>
                            <td class="p-2">{{ $task->deadline }}</td>
                            <td class="p-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                   class="text-blue-500">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3 class="font-bold text-lg mt-8 mb-4">All Users</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Name</th>
                            <th class="p-2 text-left">Email</th>
                            <th class="p-2 text-left">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-t">
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ $user->role }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
>>>>>>> Stashed changes
