<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            .line{
                width: inherit;
                height: 47px;
                border-bottom: 5px solid black;
                position: absolute;
            }
            p{
                font-size: 0.95em;
            }
        </style>
    </head>
    <body>
        <!-- start template -->
        @php($country = $value[0])
        @php($company = $value[1])
        @php($invoice = $value[2])
        @php($invoice_details = $value[3])
        @php($_sub_total = $value[4])
        @php($_discount_amount = $value[5])
        @php($_tax = $value[6])
        @php($_total = $value[7])
        @php($_grand_total = $value[8])
        @php($_runningNumber = $value[9])
        @php($image = '\\assets\\images\\company_logo\\'.$value[10])
        <div class='col-12' style='width:100%;display: inline-flex;border:1px solid black;padding:2px;'>
            <div style='width:50%;'>
                <p>{{$company->name}}</p>
                <p>{{$company->address_1}}</p>
                <p>{{$company->address_2}}</p>
                <p>{{$company->postcode}}, {{$company->city}}</p>
                <p>{{$company->state}}</p>
                <br>
                <p>{{$company->email}}</p>
                <p>{{$company->phone}}</p>
            </div>
            <div style='width:50%;float: right;text-align: right;text-align:end !important;right:0;'>
                <img src="{{ public_path() . $image }}" style='width: 30%;float: right;'>
            </div>
        </div>
        <hr>
        <div class='col-12' style='width:100%;display: inline-flex;'>
            <div style='width:48%;float:left !important;'>
                <p style='text-align:left !important;left:0;'>Invoice No. : #{{$_runningNumber}}</p>
            </div>
            <div style='width:48%;float: right;text-align: right;text-align:end !important;right:0;'>
                <p style='text-align:right !important;right:0;'>Invoice Date : {{$invoice->invoice_date}}</p>
            </div>
        </div>
        <br><br>
        <div class='col-12' style='width:100%;display: inline-flex;'>
        <br><br>
            <div style='width:49%;float:left !important;border:1px solid black;padding:2px;margin:0 2px;'>
                <p><b>Billing Address:</b></p>
                <p>{{$invoice->cust_name}}</p>
                <p>{{$invoice->address_1}}</p>
                <p>{{$invoice->address_2}}</p>
                <p>{{$invoice->postal_code}}, {{$invoice->city}}</p>
                <p>{{$invoice->state}}</p>
            </div>
            <div style='width:49%;float:left !important;border:1px solid black;padding:2px;margin:0 2px;'>
                <p><b>Delivery Address:</b></p>
                <p>{{$invoice->cust_name}}</p>
                <p>{{$invoice->d_address_1}}</p>
                <p>{{$invoice->d_address_2}}</p>
                <p>{{$invoice->d_postal_code}}, {{$invoice->d_city}}</p>
                <p>{{$invoice->d_state}}</p>
            </div>
        </div>
        <hr>
        <br><br><br>
        <table class="table table-bordered table-sm" style='padding-top: 100px;border:none !important;margin-top:20px;'>
            <br><br>
            <tr class="table-active">
                <th>Description</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Sub Total</th>
            </tr>
            <tr>
                <td>
                    @php($desc = explode(',',$invoice_details->description))
                    @for ($a = 0; $a < count($desc); $a++)
                    <p>{{ $desc[$a] }}</p>
                    @endfor
                </td>
                <td>
                    @php($qty = explode(',',$invoice_details->quantity))
                    @for ($b = 0; $b < count($qty); $b++)
                    <p>{{ $qty[$b] }}</p>
                    @endfor
                </td>
                <td>

                    @php($unit_price = explode(',',$invoice_details->unit_price))
                    @for ($c = 0; $c < count($unit_price); $c++)
                    <p>{{ number_format($unit_price[$c], 2, '.', '') }}</p>
                    @endfor
                </td>
                <td>
                    @php($sub_total = explode(',',$invoice->sub_total))
                    @for ($d = 0; $d < count($sub_total); $d++)
                    <p>{{ number_format($sub_total[$d], 2, '.', '') }}</p>
                    @endfor
                </td>
            </tr>
        </table>

        <div class='col-12' style='width:100%;display: inline-flex;'>
            <div style='width:50%;text-align: start;'>
                <p>{{$company->footerMessage}}</p>
                <!--<p>{{$company->footerTitle}}</p>-->
                <br>
            </div>
            <div style='width:50%;float: right;text-align: right;text-align:end !important;right:0;'>
                <p style='text-align:right !important;right:0;'>Subtotal 	: {{$country->currency_symbol}} {{$_sub_total}}</p>
                <p style='text-align:right !important;right:0;'>Discount 	: {{$country->currency_symbol}} {{$_discount_amount}}</p>
                <p style='text-align:right !important;right:0;'>Tax ({{$company->taxRate}}%) 	: {{$country->currency_symbol}} {{$_tax}}</p>
                <!--<p style='right:0;'>Total	: {{$country->currency_symbol}} {{$_total}}</p>-->
                <p style='text-align:right !important;right:0;'>Grand Total : {{$country->currency_symbol}} {{$_grand_total}}</p>
            </div>
        </div>

        <br><br><br>
        <!-- end template -->

    </body>
</html>
