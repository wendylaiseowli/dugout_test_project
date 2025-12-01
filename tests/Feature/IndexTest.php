<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Matches;
use App\Models\Player;
use App\Models\Team;
use App\Models\Reservation;
use App\Models\User;

class IndexTest extends TestCase
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
            'startDateTime' => now()->addDay(2),
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

    //Admin
    public function test_admin_dashboard_render_with_correct_content(){
        $user = User::factory()->create();
        $this->actingAs($user);
      
        $reservationNotToday = Reservation::factory()->count(10)->create([
            'reservation_date'=> now()->addDay(1),
            'reservation_name'=>'KARENNNN',
        ]);

        $reservationToday = Reservation::factory()->count(10)->create([
            'reservation_date'=> now(),
            'reservation_name'=>'Wendyyy',
        ]);

        $matches = Matches::factory()->count(2)->create();
        
        $players = Player::factory()->count(5)->create([
            'name'=>'Alo ha',
        ]);

        $players = Player::factory()->count(10)->create([
            'name'=>'Brendonn',
        ]);

        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);
        $response->assertSeeText('Wendyyy');
        $response->assertSeeText('Brendonn');
        $response->assertDontSeeText('KARENNNN');
        $response->assertDontSeeText('Alo ha');
        $response->assertSee('<span class="counter">10</span>', false);

        $this->assertDatabaseCount('matches', 17, 'mysql2');
        $this->assertDatabaseCount('reservations', 20);
        $this->assertDatabaseCount('players', 15, 'mysql2');
    }
}
