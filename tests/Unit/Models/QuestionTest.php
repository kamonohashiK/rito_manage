<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Prefecture;
use App\Models\City;
use App\Models\Island;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    protected $prefecture;
    protected $city;
    protected $island;

    protected function setUp(): void
    {
        parent::setUp();
        $this->prefecture = Prefecture::factory()->create();
        $this->city = City::factory()->for($this->prefecture)->create();
        $this->island = Island::factory()->create();
        DB::table('city_islands')->insert([
            'city_id' => $this->city->id,
            'island_id' => $this->island->id,
        ]);
    }

    /**
     * answersを取得できるかテスト
     */
    public function test_get_answers()
    {
        $question = Question::factory()->for($this->island)->create();
        $answers = Answer::factory(10)->for($question)->create();

        // answersが10件取得できているか
        $this->assertEquals(10, $question->answers->count());

        // Answersの中身が正しいか確認
        foreach ($answers as $answer) {
            $this->assertTrue($question->answers->contains($answer));
        }
    }
}
