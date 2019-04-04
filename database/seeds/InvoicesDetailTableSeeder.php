<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InvoicesDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('==== '.__CLASS__.' Start Running ====');

        $this->insertInvoicesDetail();

        $this->command->info('==== '.__CLASS__.' Completed ====');
    }

    public function insertInvoicesDetail()
    {
        $now = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');

        $this->command->info('==== Finding existing records ====');
        $invoicesCount = DB::table('invoice_details')->count();
        $this->command->info("==== Records : $invoicesCount ====");

        DB::table('invoice_details')->delete();

        $invoice_details = array(
            array(
                'description' => 'Test Product',
                'quantity' => '1',
                'unit_price' => '10',
                'invoiceId' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        DB::table('invoice_details')->insert($invoice_details);
    }
}
