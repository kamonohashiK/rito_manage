<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SlackNotification;
use App\Services\SlackService;

class SampleLogger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sample-logger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '練習用に作成したロガー(他のものを作成したら削除)';


    /**
     * @var SlackService
     * Slack通知用のサービス
     */
    protected $slackService;

    public function __construct(SlackService $slackService)
    {
        parent::__construct();

        $this->slackService = $slackService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger()->info('Sample logger');

        $title = "Slackテスト";
        $succeed = true;
        $message = "通知を飛ばすテスト";
        $fields = ['テスト' => 'テスト', 'テスト2' => 'テスト2'];

        // Slackに通知
        $this->slackService->sendNotification($title, $succeed, $message, $fields);
    }
}
