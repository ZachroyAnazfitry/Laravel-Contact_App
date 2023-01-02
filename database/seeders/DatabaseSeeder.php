<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Contacts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //to start generate faker data
        // $this->call(CompaniesTableSeeder::class);
        //added for Contacts table
        // $this->call(ContactsSeeder::class);

        //instead of writing one-by-one like above, use array method
        // $this->call([
        //     CompaniesTableSeeder::class,
        //     ContactsSeeder::class,
        // ]);

        //another method whenn using model factories
        //dont forget to add link above(App\Models\Company)
        //and seeder files for related tables can be deleted 
        Company::factory()->count(10)->create();
        Contacts::factory()->count(50)->create();

    }
}
