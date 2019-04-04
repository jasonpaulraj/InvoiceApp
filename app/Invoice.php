<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * he attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'countryId',
        'companyId',
        'cust_name',
        'address_1',
        'address_2',
        'state',
        'city',
        'postal_code',
        'd_address_1',
        'd_address_2',
        'd_state',
        'd_city',
        'd_postal_code',
        'invoice_date',
        'invoice_running_no',
        'discount_percentage',
        'discount_amount',
        'tax',
        'sub_total',
        'total',
        'grand_total',
        'link',
        'link_order',
    ];
}
