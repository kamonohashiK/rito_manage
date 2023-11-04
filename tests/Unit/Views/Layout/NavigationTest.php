<?php

namespace Tests\Unit\Views\Layout;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 共通レイアウト(navigation.blade.php)で表示される内容のテスト
     */
    public function test_navigation()
    {
        // ユーザーを作成
        $user = User::factory()->create();

        // ユーザーとして認証
        $response = $this->actingAs($user)
            ->get('/');

        // レスポンスが成功したことを確認
        $response->assertStatus(200);

        // ナビゲーションリンクが表示されていることを確認
        $response
            ->assertSee($user->name)
            ->assertSee('Log Out')
            ->assertSeeInOrder([
                'メニュー',
                '島一覧',
                'アカウント設定',
                'プロフィール設定',
            ], false);
    }
}
