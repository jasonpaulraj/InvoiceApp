<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $seeder = [
            CountriesTableSeeder::class,
            CompaniesTableSeeder::class,
            InvoicesTableSeeder::class,
            InvoicesDetailTableSeeder::class,
        ];

        foreach ($seeder as $seed) {
            $this->call($seed);
            $this->command->info('');
        }
    }
}
