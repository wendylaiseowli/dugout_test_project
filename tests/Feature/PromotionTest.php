<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Promotion;

class PromotionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Refresh the default database
        $this->artisan('migrate:fresh');

        // Refresh the second database
        $this->artisan('migrate:fresh', ['--database' => 'mysql2']);
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

    public function test_promotion_record_do_not_exist(){
        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertSee('Coming Soon');
    }

    public function test_promotion_record_only_display_for_active_status(){
        $promotions = collect([
            [
                'name'=> 'Sleep Night',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Sleep all the day',
                'status'=> false
            ],
            [
                'name'=> 'Slepy Night',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Slepy all the day',
                'status'=> true
            ],
            [
                'name'=> 'Wake Up Day',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Wakeup all the day',
                'status'=> true
            ],
        ]);

        $promotions->each(function($data) {
            Promotion::factory()->create($data);
        });

        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertSee('Slepy Night');
        $response->assertSee('Wake Up Day');
        $response->assertDontSee('Sleep Night');
    }
}
