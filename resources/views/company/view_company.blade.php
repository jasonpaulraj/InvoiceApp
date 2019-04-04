@extends('main')
@section('content')

@if(Session::has('generate_invoice_success'))
<div class="alert alert-dismissible alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Invoice has been generated. You may view or print the documents.
</div>
@endif

<div class="container" style='padding-top:2%;'>
    <div class="col-12" style='display:inline-flex;'>
        <div class="col-6">
            <div class="form-group">
                <b><label for="name" class="control-label">Company Name</label></b>
                <div >
                    {{$company->name}}
                </div>
            </div>
            <div class="form-group">
                <b><label for="address" class="control-label">Address</label></b>
                <div >
                    {{$company->address_1}}
                    <br>
                    {{$company->address_2}}
                </div>

                <b><label for="city" class="control-label">City</label></b>
                <div >
                    {{$company->city}}
                </div>

                <b><label for="postcode" class="control-label">Postal Code</label></b>
                <div >
                    {{$company->postcode}}
                </div>

                <b><label for="state" class="control-label">State</label></b>
                <div >
                    {{$company->state}}
                </div>

                <b><label for="country" class="control-label">Country</label></b>
                <div >
                    {{$company->CountryId}}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <b><label for="email" class="control-label">Email</label></b>
                <div >
                    {{$company->email}}
                </div>
            </div>
            <div class="form-group">
                <b><label for="phone" class="control-label">Phone</label></b>
                <div >
                    {{$company->phone}}
                </div>
            </div>
            <div class="form-group">
                <b><label for="logo" class="control-label">Logo</label></b>
                <div >
                    {{$company->logo}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-12"  style='display:inline-flex;border-top: 1px solid black; padding-top:2%;'>
        <div class="col-6 form-group">
            <b><label for="taxId" class="control-label">Tax Id</label></b>
            <div >
                {{$company->taxId}}
            </div>
        </div>
        <div class="col-6 form-group">
            <b><label for="taxName" class="control-label">Tax Name</label></b>
            <div >
                {{$company->taxName}}
            </div>
        </div>
    </div>

    <div class="col-12" style='display:inline-flex;'>
        <div class="col-6 form-group">
            <b><label for="taxRate" class="control-label">Tax Rate</label></b>
            <div >
                {{$company->taxRate}}%
            </div>
        </div>
        <div class="col-6 form-group">
            <b><label for="invoiceId" class="control-label">Invoice ID</label></b>
            <div >
                {{$company->invoiceId}}
            </div>
        </div>
    </div>

    <div class="col-12" style='display:inline-flex;'>
        <div class="col-6 form-group">
            <b><label for="footerTitle" class="control-label">Message Title</label></b>
            <div >
                {{$company->footerTitle}}
            </div>
        </div>
        <div class="col-6 form-group">
            <b><label for="footerMessage" class="control-label">Message</label></b>
            <div >
                {{$company->footerMessage}}
            </div>
        </div>
    </div>


    <div class="col-12"  style='border-top: 1px solid black; padding-top:2%;'>
        <div style='width: 100%;'>
            <b style="float:left;"><label for="Invoice" class="display-4">Invoice List</label></b>
            <a class="btn btn-success btn-flat" style="float:right;" href="{{ route('invoice-add', ["companyId" => $company->id]) }}">Add Invoice</a>
        </div>
        <br>
        <br>
        <div class="col-12">
            <table id="_singleCompany" class="table table-striped table-borderless table-scroll-vertical" cellspacing="0" width="100%">
                <thead>
                <th>Invoice ID</th>
                <th>Customer Name</th>
                <th>Invoice Date</th>
                <th>Print/View</th>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>#{{$invoice->invoice_running_no}}</td>
                        <td>{{ $invoice->cust_name }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>
                            @php($link = $invoice->link)
                            @php($link_order = $invoice->link_order)
                            <a class="btn btn-info btn-flat" href="{{ asset('assets/invoices/'.$link)}}" target="_blank">
                                Invoice
                            </a>
                            &nbsp;
                            <a class="btn btn-warning btn-flat" href="{{ asset('assets/orders/'.$link_order)}}" target="_blank">
                                Order
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{asset("js/company.js")}}" type="text/javascript"></script>
@endsection
