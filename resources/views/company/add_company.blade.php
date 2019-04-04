@extends('main')
@section('content')
@if(Session::has('company_add_fail'))
<div class="alert alert-dismissible alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR!</strong> Failed to add record.
</div>
@endif
<div class="container" style='top: 20%;'>
    <form id="validate_backend" method="POST" action="{{route('company-add-store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12" style='display:inline-flex;padding-top: 3%;'>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Company Name</label>
                        <div >
                            <input id="name" type="text" maxlength="50" class="form-control" name="name" value="{{ old('name') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address</label>
                        <div >
                            <input id="address_1" type="text" class="form-control" name="address_1" value="{{ old('address_1') }}"  >
                            @if ($errors->has('address_1'))
                            <span id="address_1-error" class="help-block">
                                <strong>{{ $errors->first('address_1') }}</strong>
                            </span>
                            @endif
                            <br>
                            <input id="address_2" type="text" class="form-control" name="address_2" value="{{ old('address_2') }}"  >
                        </div>

                        <label for="city" class="control-label">City</label>
                        <div >
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  >
                            @if ($errors->has('city'))
                            <span id="city-error" class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="postcode" class="control-label">Postal Code</label>
                        <div >
                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"  >
                            @if ($errors->has('postcode'))
                            <span id="postcode-error" class="help-block">
                                <strong>{{ $errors->first('postcode') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="state" class="control-label">State</label>
                        <div >
                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"  >
                            @if ($errors->has('state'))
                            <span id="state-error" class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="country" class="control-label">Country</label>
                        <div >
                            <select id="country" name="country" class="form-control" >
                                @foreach($_countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country'))
                            <span id="country-error" class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <div >
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  >
                            @if ($errors->has('email'))
                            <span id="email-error" class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <div >
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"  >
                            @if ($errors->has('phone'))
                            <span id="phone-error" class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo" class="control-label">Logo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" aria-describedby="inputGroupFileAddon01" name="logo" value="{{ old('logo') }}" >
                                <label class="custom-file-label" for="logo">Choose file</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taxId" class="control-label">Tax Id</label>
                        <div >
                            <input id="taxId" type="text" class="form-control" name="taxId" value="{{ old('taxId') }}"  >

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taxName" class="control-label">Tax Name</label>
                        <div >
                            <input id="taxName" type="text" class="form-control" name="taxName" value="{{ old('taxName') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taxRate" class="control-label">Tax Rate</label>
                        <div >
                            <input id="taxRate" type="text" class="form-control" name="taxRate" value="{{ old('taxRate') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="invoiceId" class="control-label">Invoice ID</label>
                        <div >
                            <input id="invoiceId" type="text" class="form-control" name="invoiceId" value="{{ old('invoiceId') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="footerTitle" class="control-label">Message Title</label>
                        <div >
                            <input id="footerTitle" type="text" class="form-control" name="footerTitle" value="{{ old('footerTitle') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="footerMessage" class="control-label">Message</label>
                        <div >
                            <input id="footerMessage" type="text" class="form-control" name="footerMessage" value="{{ old('footerMessage') }}"  >
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group paddT20" style='margin:auto;text-align:right;'>
                <br>
                <hr>
                <br>
                <div>
                    <button title="Submit" type="submit" class="btn btn-primary" target="_blank">Add Company</button>
                    <a href="{{route('company-list')}}" class="btn btn-success btn-flat">Back</a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </form>
</div>
<script src="{{asset("js/company.js")}}" type="text/javascript"></script>
@endsection
