<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('==== '.__CLASS__.' Start Running ====');

        $this->insertInvoices();

        $this->command->info('==== '.__CLASS__.' Completed ====');
    }

    public function insertInvoices()
    {
        $now = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');

        $this->command->info('==== Finding existing records ====');
        $invoicesCount = DB::table('invoices')->count();
        $this->command->info("==== Records : $invoicesCount ====");

        DB::table('invoices')->delete();

        $invoices = array(
            array(
                'countryId' => 132,
                'companyId' => 1,
                'cust_name' => 'Customer 1',
                'address_1' => '1234, Jalan PJS 11/11',
                'address_2' => 'Taman 1234',
                'city' => 'Kuala Lumpur',
                'postal_code' => 51000,
                'state' => 'Kuala Lumpur',
                'd_address_1' => '1234, Jalan PJS 11/11',
                'd_address_2' => 'Taman 1234',
                'd_city' => 'Kuala Lumpur',
                'd_postal_code' => 51000,
                'd_state' => 'Kuala Lumpur',
                'invoice_date' => $now,
                'invoice_running_no' => 'MY0000000001',
                'discount_percentage' => '10',
                'discount_amount' => '1',
                'tax' => '6',
                'sub_total' => '10',
                'total' => '10',
                'grand_total' => '9',
                'link' => 'MY0000000001.pdf',
                'link_order' => 'Order_MY0000000001.pdf',
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        DB::table('invoices')->insert($invoices);
    }
}
