<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Company::class;
    public function definition()
    {
        return [
            //
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'website' => $this->faker->domainName,
            'email' => $this->faker->email,
        ];
    }
}
