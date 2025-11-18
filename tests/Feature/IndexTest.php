<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Matches;
use App\Models\Team;

class IndexTest extends TestCase
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

    public function test_render_index_with_pass_date_status_active(){
        
        $team1 = Team::factory()->create([
            'name' => 'Arsenal',
            'logoURL'=>'/img/teams/arsenal.svg',
        ]);

        $team2 = Team::factory()->create([
            'name' => 'AFC Bournemouth',
            'logoURL'=>'/img/teams/bournemouth.svg',
        ]);

        $matches = Matches::factory()->create([
            'startDateTime' => '2025-09-12 22:00:00',
            'homeTeamID' => $team1->id,
            'awayTeamID' => $team2->id,
            'status'=> true,
        ]);

        $response = $this->get(route('index'));
        $response->assertStatus(200);
        $response->assertViewHas('lastmatch');

        $response->assertSee('Arsenal');
        $response->assertSee('AFC Bournemouth');
        $response->assertSee('Last Match');
    }

    public function test_render_index_with_future_date_status_active(){
        $team1 = Team::factory()->create([
            'name' => 'Arsenal',
            'logoURL'=>'/img/teams/arsenal.svg',
        ]);

        $team2 = Team::factory()->create([
            'name' => 'AFC Bournemouth',
            'logoURL'=>'/img/teams/bournemouth.svg',
        ]);

        $matches = Matches::factory()->create([
            'startDateTime' => now()->addDay(),
            'homeTeamID' => $team1->id,
            'awayTeamID' => $team2->id,
            'status'=> true,
        ]);

        $response = $this->get(route('index'));
        $response->assertStatus(200);
        $response->assertViewHas('lastmatch');

        $response->assertSee('Arsenal');
        $response->assertSee('AFC Bournemouth');
        $response->assertSee('Upcoming Match');
    }

    public function test_render_index_with_status_inactive(){
        $team1 = Team::factory()->create([
            'name' => 'Arsenal',
            'logoURL'=>'/img/teams/arsenal.svg',
        ]);

        $team2 = Team::factory()->create([
            'name' => 'AFC Bournemouth',
            'logoURL'=>'/img/teams/bournemouth.svg',
        ]);

        $matches = Matches::factory()->create([
            'startDateTime' => now()->addDay(),
            'homeTeamID' => $team1->id,
            'awayTeamID' => $team2->id,
            'status'=> false,
        ]);

        $response = $this->get(route('index'));
        $response->assertStatus(200);

        $response->assertDontSee('Arsenal');
        $response->assertDontSee('AFC Bournemouth');
        $response->assertSee('Coming Soon');
    }

    public function test_render_index_with_status_inactive_and_active(){
        $team1 = Team::factory()->create([
            'name' => 'Arsenal',
            'logoURL'=>'/img/teams/arsenal.svg',
        ]);

        $team2 = Team::factory()->create([
            'name' => 'AFC Bournemouth',
            'logoURL'=>'/img/teams/bournemouth.svg',
        ]);

        $team3 = Team::factory()->create([
            'name' => 'Burnley',
            'logoURL'=>'/img/teams/burnley.svg',
        ]);

        $matches1 = Matches::factory()->create([
            'startDateTime' => now()->addDay(),
            'homeTeamID' => $team3->id,
            'awayTeamID' => $team2->id,
            'status'=> true,
        ]);

        $matches2 = Matches::factory()->create([
            'startDateTime' => '2025-09-12 22:00:00',
            'homeTeamID' => $team1->id,
            'awayTeamID' => $team2->id,
            'status'=> false,
        ]);

        $response = $this->get(route('index'));
        $response->assertStatus(200);
        $response->assertViewHas('lastmatch');

        $response->assertDontSee('Arsenal');
        $response->assertDontSee('AFC Bournemouth');
        $response->assertDontSee('Burnley');
        $response->assertSee('Coming Soon');
    }
}
