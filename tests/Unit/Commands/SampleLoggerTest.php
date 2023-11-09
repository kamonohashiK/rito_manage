<?php

namespace Tests\Unit\Commands;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SampleLoggerTest extends TestCase
{
    /**
     * SampleLoggerのテスト
     */
    public function test_sample_logger()
    {
        // 指定したログが出力されているか確認
        Log::shouldReceive('info')
            ->once()
            ->with('Sample logger')
            ->andReturn(true);

        // Artisanコマンドを実行
        Artisan::call('app:sample-logger');
    }
}
