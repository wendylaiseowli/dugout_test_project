<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Promotion;

class PromotionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_promotion_record_do_not_exist(){
        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertSee('COMING SOON');
    }

    public function test_promotion_record_exist(){
        $promotion= Promotion::factory()->create([
            'name'=> 'Sleep Night',
            'promotion_startDate'=> '2025-01-30 00:00:00',
            'promotion_endDate'=> '2026-01-30 00:00:00',
            'description'=> 'Sleep all the day',
        ]);

        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertViewHas('promotions');
        $response->assertSee('Sleep Night');
        $response->assertSee('Sleep all the day');
        $response->assertSee('30 January, 2026');
    }
}
