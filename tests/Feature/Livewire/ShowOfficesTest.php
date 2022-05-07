<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowOffices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowOfficesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowOffices::class);

        $component->assertStatus(200);
    }
}
