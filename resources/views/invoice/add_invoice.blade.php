@extends('main')
@section('content')

@if(Session::has('generate_invoice_fail'))
<div class="alert alert-dismissible alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR!</strong> Invoice was not generated.
</div>
@endif
<style>
    .invoice_subtitle{
        width:100%;text-align:center;margin:auto;font-size:1.5em;
    }
    .invoice_subtitle2{
        text-align:center;margin:auto;font-size:1.5em;
    }
</style>
<div class="container" style='top: 20%;'>
    <form id="generate_invoice" method="POST" action="{{route('invoice-store')}}">
        {{ csrf_field() }}
        <input type="hidden" id="companyId" value="{{$_company->id}}" name="companyId">
        <input type="hidden" id="countryId" value="{{$_country->id}}" name="countryId">
        <input type="hidden" id="taxRate" value="{{$_company->taxRate}}" name="taxRate">
        <input type="hidden" id="countTotalSections" value="0">
        <div class="row">
            <div class="col-12" style="padding-top: 2%;">
                <b style="text-align:center"><label for="Invoice" class="display-4">Customer Details</label></b>
                <hr>
            </div>
            <div class="col-12">
                <div class="col-12">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cust_name" class="control-label invoice_subtitle2">Customer Name</label>
                            <br>
                            <div >
                                <input id="cust_name" type="text" class="form-control" name="cust_name" value="{{ old('cust_name') }}"  >
                                @if ($errors->has('name'))
                                <span id="cust_name-error" class="help-block">
                                    <strong>{{ $errors->first('cust_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-12"  style='display:inline-flex;'>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cust_name" class="control-label invoice_subtitle">Billing Address</label>
                        </div>
                        <br>
                        <label for="address" class="control-label">Address (#1)</label>
                        <div >
                            <input id="address_1" type="text" class="form-control" name="address_1" value="{{ old('address_1') }}"  >
                        </div>
                        <label for="address" class="control-label">Address (#2)</label>
                        <div >
                            <input id="address_2" type="text" class="form-control" name="address_2" value="{{ old('address_2') }}"  >
                        </div>

                        <label for="city" class="control-label">City</label>
                        <div >
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  >
                        </div>

                        <label for="postal_code" class="control-label">Postal Code</label>
                        <div >
                            <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}"  >
                        </div>

                        <label for="state" class="control-label">State</label>
                        <div >
                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"  >
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                   <div class="col-6">
                        <div class="form-group">
                            <label for="cust_name" class="control-label invoice_subtitle">Delivery Address</label>
                        </div>
                        <br>
                        <label for="delivery_address_1" class="control-label">Address (#1)</label>
                        <div >
                            <input id="delivery_address_1" type="text" class="form-control" name="delivery_address_1" value="{{ old('delivery_address_1') }}"  >
                        </div>
                        <label for="delivery_address_2" class="control-label">Address (#2)</label>
                        <div >
                            <input id="delivery_address_2" type="text" class="form-control" name="delivery_address_2" value="{{ old('delivery_address_2') }}"  >
                        </div>

                        <label for="delivery_city" class="control-label">City</label>
                        <div >
                            <input id="delivery_city" type="text" class="form-control" name="delivery_city" value="{{ old('delivery_city') }}"  >
                        </div>

                        <label for="delivery_postal_code" class="control-label">Postal Code</label>
                        <div >
                            <input id="delivery_postal_code" type="text" class="form-control" name="delivery_postal_code" value="{{ old('delivery_postal_code') }}"  >
                        </div>

                        <label for="delivery_state" class="control-label">State</label>
                        <div >
                            <input id="delivery_state" type="text" class="form-control" name="delivery_state" value="{{ old('delivery_state') }}"  >
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>

            <!--Invoice Details-->
            <div id="sections" class="col-12">
                <div class="col-12" style="display:inline-flex;">
                    <div class="col-6">
                        <b ><label for="Invoice" class="display-4">Invoice Details</label></b>
                    </div>
                    <div class="col-6" style='text-align:right;'>
                        <button type="button" class="btn btn-primary btn-xs addsection">Add</button>
                    </div>
                </div>
                <div class="section col-12">
                    <hr>
                    <div class="col-12" style="display:inline-flex;">
                        <div class="col-6">
                            <b ><label for="Invoice" class="control-label invoice_subtitle2">Product</label></b>
                        </div>
                        <br>
                        <div class="col-6" style='text-align:right;'>
                            <button type="button" class="btn btn-default btn-xs remove">Remove</button> <span class="msg text-danger"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-12 form-group ">
                            <label for="description" class="control-label">Description</label>
                            <div >
                                <input id="description" type="text" class="form-control" name="description[]" value="{{ old('description') }}"  >
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="display:inline-flex;">
                        <div class="col-6 form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <div >
                                <input id="quantity" type="text" class="form-control" name="quantity[]" value="{{ old('quantity') }}"  >
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="unit_price" class="control-label">Unit/Price ({{$_country->currency_symbol}})</label>
                            <div >
                                <input id="unit_price" type="text" class="form-control" name="unit_price[]" value="{{ old('unit_price') }}"  >
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="display:inline-flex;">
                        <div class="col-6  form-group">
                            <label for="discount_percentage" class="control-label">Discount %</label>
                            <div >
                                <input id="discount_percentage" type="text" class="form-control" name="discount_percentage[]" value="{{ old('discount_percentage') }}"  >
                            </div>
                        </div>
                        <!-- <div class="col-6  form-group">
                            <label for="discount_amount" class="control-label">Discount ({{$_country->currency_symbol}})</label>
                            <div >
                                <input  id="discount_amount" type="text" class="form-control" name="discount_amount[]" value="{{ old('discount_amount') }}"  >
                            </div>
                        </div> -->
                    </div>

                    <!-- <div class="col-12" style="display:inline-flex;">
                        <div class="col-6  form-group">
                            <label for="sub_total" class="control-label">SubTotal ({{$_country->currency_symbol}})</label>
                            <div >
                                <input  id="sub_total" type="text" class="form-control" name="sub_total[]" value="{{ old('sub_total') }}"  >
                            </div>
                        </div>
                        <div class="col-6  form-group">
                            <label for="tax" class="control-label">Tax </label>
                            <div >
                                <input  id="tax" type="text" class="form-control" name="tax[]" value="{{ old('tax') }}"  >
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-12" style="display:inline-flex;">
                        <div class="col-6  form-group">
                            <label for="total" class="control-label">Total ({{$_country->currency_symbol}})</label>
                            <div >
                                <input  id="total" type="text" class="form-control" name="total[]" value="{{ old('total') }}"  >
                            </div>
                        </div>
                        <div class="col-6  form-group">
                            <label for="grand_total" class="control-label">Grand Total (Inc. Tax) </label>
                            <div >
                                <input  id="grand_total" type="text" class="form-control" name="grand_total[]" value="{{ old('grand_total') }}"  >
                            </div>
                        </div> -->
                   </div>
                </div>
            </div>
            <div class="form-group paddT20" style='margin:auto;text-align:center;'>
                <br>
                <hr>
                <br>
                <div>
                    <button title="Submit" type="submit" class="btn btn-primary" target="_blank">Generate Invoice</button>
                    <a href="{{route('company-list')}}" class="btn btn-success btn-flat">Back</a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </form>
</div>
<script src="{{asset("js/jquery-3.3.1.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/invoice.js")}}" type="text/javascript"></script>
<script>
$('#description #unit_price #grand_total').on("change", function () {
    console.log("abc");
    var _count_description = $('input[name*="description[]"]').length;
    console.log(_count_description);
});
</script>
@endsection
