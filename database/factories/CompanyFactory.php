<?php

namespace Database\Factories;

use App\Http\Utiles\Constants;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{

    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' =>  $this->faker->unique()->safeEmail,
            'logo' => $this->faker->image(public_path('storage/'.Constants::COMPANY_LOGO_DIR), Constants::COMPANY_LOGO_INIT_WIDTH, Constants::COMPANY_LOGO_INIT_HEIGHT),
            'website' => $this->faker->url(),
        ];
    }
}
