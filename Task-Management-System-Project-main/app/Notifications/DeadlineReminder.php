<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Task;

class DeadlineReminder extends Notification
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task Deadline Reminder')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your task "' . $this->task->title . '" is due tomorrow.')
            ->line('Deadline: ' . $this->task->deadline)
            ->line('Priority: ' . $this->task->priority)
            ->line('Status: ' . $this->task->status)
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Please make sure to complete it on time!');
    }
}
