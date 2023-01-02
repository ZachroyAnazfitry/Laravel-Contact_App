<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;;
use App\Models\Contacts;
use Illuminate\Support\Str;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contacts::class;
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'company_id' => Company::pluck('id')->random() //return array contains id of the company
        ];
    }
}
