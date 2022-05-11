<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowUsers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowUsersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowUsers::class);

        $component->assertStatus(200);
    }
}
