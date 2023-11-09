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
    public function sendNotification($title, $succeed, $message, $fields)
    {
        Notification::route('slack', env('SLACK_WEBHOOK_URL'))
            ->notify(new SlackNotification($title, $succeed, $message, $fields));
    }
}
