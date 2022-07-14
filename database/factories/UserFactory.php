<?php

namespace Database\Factories;

use App\Http\Utiles\Constants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => Constants::USER_ROLE_ADMINISTRATOR,
            'password' => Hash::make(config('app.admin_login_init_password'))
        ];
    }

}
