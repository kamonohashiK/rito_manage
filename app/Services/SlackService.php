<?php

namespace App\Services;

use App\Notifications\SlackNotification;
use Notification;

class SlackService
{
    /**
     * Slackに通知を送信する
     * @param string $title
     * @param bool $succeed
     * @param string $message
     * @param array $fields
     * @return void
     */
    public function sendNotification(string $title, bool $succeed, string $message, array $fields)
    {
        Notification::route('slack', config('slack.webhook_url'))
            ->notify(new SlackNotification($title, $succeed, $message, $fields));
    }
}
