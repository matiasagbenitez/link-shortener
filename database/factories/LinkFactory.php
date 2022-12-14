<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'url' => $this->faker->url,
            'slug' => Str::random(6),
            'is_enabled' => true
        ];
    }

    public function ofUser(User $user)
    {
        return $this->state([
            'user_id' => $user->id
        ]);
    }
}
