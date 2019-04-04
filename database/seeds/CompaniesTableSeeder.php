<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('==== '.__CLASS__.' Start Running ====');

        $this->insertCompanies();

        $this->command->info('==== '.__CLASS__.' Completed ====');
    }

    public function insertCompanies()
    {
        $now = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');

        $this->command->info('==== Finding existing records ====');
        $companiesCount = DB::table('companies')->count();
        $this->command->info("==== Records : $companiesCount ====");

        DB::table('companies')->delete();

        $companies = array(
            array(
                'name' => 'Company 1',
                'CountryId' => 132,
                'address_1' => '1234, Jalan PJS 11/11',
                'address_2' => 'Taman 1234',
                'city' => 'Kuala Lumpur',
                'postcode' => '51000',
                'state' => 'Kuala Lumpur',
                'email' => 'company1@company1.com',
                'phone' => '+6031234123',
                'logo' => 'company1.png',
                'taxId' => '11001-K-1',
                'taxName' => 'SST',
                'taxRate' => 6,
                'invoiceId' => 'MY',
                'footerTitle' => 'Regards',
                'footerMessage' => 'Thank you and have a nice day!',
                'footerSignature' => 'Company1.png',
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        DB::table('companies')->insert($companies);
    }
}
