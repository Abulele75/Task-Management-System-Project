<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\DeadlineReminder;
use Carbon\Carbon;

class SendDeadlineReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send deadline reminder emails';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        $tasks = Task::where('deadline', $tomorrow)
                     ->where('status', '!=', 'completed')
                     ->get();

        foreach ($tasks as $task) {
            $user = $task->assignedTo ?? $task->user;

            if ($user) {
                $user->notify(new DeadlineReminder($task));
                $this->info('Reminder sent to ' . $user->email);
            }
        }

        $this->info('All reminders sent!');
    }
}