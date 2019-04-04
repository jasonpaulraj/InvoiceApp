<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'id',
        'name',
        'CountryId',
        'address_1',
        'address_2',
        'city',
        'postcode',
        'state',
        'email',
        'phone',
        'logo',
        'taxId',
        'taxName',
        'taxRate',
        'invoiceId',
        'footerTitle',
        'footerMessage',
        'footerSignature',
    ];
}
