<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Movie;

class MoviesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function user_can_create_movies()
    {

        $this->withoutExceptionHandling();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence
        ];
        $this->post('/movies', $attributes)->assertRedirect('/movies');
        $this->assertDatabaseHas('movies', $attributes);
    }

    /** @test */
    public function guest_can_view_movies()
    {
        $this->withoutExceptionHandling();
        $title = Movie::first()->title;
        $this->get('/movies')->assertSee($title);
    }


}
