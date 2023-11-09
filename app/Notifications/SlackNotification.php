<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotification extends Notification
{
    use Queueable;

    public string $env;
    public string $title;
    public bool $succeed;
    public string $message;
    public array $fields;

    /**
     * Create a new notification instance.
     */
    public function __construct($title, $succeed, $message, $fields)
    {
        $this->env = env('APP_ENV');
        $this->title = $title;
        $this->succeed = $succeed;
        $this->message = $message;
        $this->fields = $fields;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toSlack(object $notifiable): SlackMessage
    {
        $slackMessage = (new SlackMessage)
            ->attachment(function ($attachment) {
                $attachment->title("{$this->title} ({$this->env})")
                    ->fields($this->fields);
            })
            ->from('リトグラフ管理アプリ', ':desert_island:')
            ->content($this->message);

        if ($this->succeed) {
            $slackMessage->success();
        } else {
            $slackMessage->error();
        }

        return $slackMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
