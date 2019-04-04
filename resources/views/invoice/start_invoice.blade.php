@extends('main')
@section('content')
<style>.footer {position: absolute !important;}</style>
<div class="container" style='margin:auto;'>
    <div class="col-12" style="margin:10% auto;text-align: center;">
        <p class="display-1">
            Invoice
        </p>
    </div>

    <div class="col-12" style="margin:auto;text-align: center;">
        <div class="col-12" style="display: inline-flex;">
            <input type="hidden" name="companyId" value="companyId" id="companyId"/>
            <div class="col-6" style="">
                <label for="company" class="control-label" style="font-size: 1.5em;">Select Company</label>
            </div>
            <div class="col-6" style="">
                <select id="company" name="company" class="form-control" >
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="col-12" style="margin:auto;text-align: center;">
            <a href="{{route('invoice-add',["companyId" => $company->id])}}" class="btn btn-success btn-flat">Create New Invoice</a>
        </div>
    </div>

    <div class="col-12" style="margin:auto;text-align: center;">

    </div>

</div>
<script>
    $("#company").on("change", function () {
        var _selected = $("#company").val();
        console.log(_selected);
        $("#companyId").val(_selected);
    });
</script>
<script src="{{asset("js/jquery-3.3.1.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/invoice.js")}}" type="text/javascript"></script>
@endsection
