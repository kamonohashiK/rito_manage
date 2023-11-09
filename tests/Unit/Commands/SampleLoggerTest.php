<?php

namespace Tests\Unit\Commands;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SlackNotification;
use Illuminate\Notifications\AnonymousNotifiable;

class SampleLoggerTest extends TestCase
{
    /**
     * SampleLoggerのテスト
     */
    public function test_sample_logger()
    {
        Notification::fake();

        // 指定したログが出力されているか確認
        Log::shouldReceive('info')
            ->once()
            ->with('Sample logger')
            ->andReturn(true);

        // Artisanコマンドを実行
        Artisan::call('app:sample-logger');

        // Notificationが送信されているか確認
        Notification::assertSentTo(
            new AnonymousNotifiable,
            SlackNotification::class,
            function ($notification, $channels, $notifiable) {
                return $notifiable->routes['slack'] === config('slack.webhook_url') &&
                    $notification->title === "Slackテスト" &&
                    $notification->succeed === true &&
                    $notification->message === "通知を飛ばすテスト" &&
                    $notification->fields === ['テスト' => 'テスト', 'テスト2' => 'テスト2'];
            }
        );
    }
}
