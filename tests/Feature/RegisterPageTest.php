<?php

namespace Tests\Feature;

use App\Http\Livewire\Register;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterPageTest extends TestCase
{
    public function testRegisterAUser()
    {
        $faker = Factory::create();
        $email = $faker->email;
        $name = $faker->name;

        Livewire::test(Register::class)
            ->set('name', $name)
            ->set('email', $email)
            ->set('password', 'hello12345')
            ->call('save');

        $this->assertTrue(User::query()->with('email', $email)->exists());
    }
}
