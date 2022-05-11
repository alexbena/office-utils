<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowOffice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowOfficeTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowOffice::class);

        $component->assertStatus(200);
    }
}
