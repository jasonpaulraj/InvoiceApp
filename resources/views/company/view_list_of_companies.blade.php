@extends('main')
@section('content')
<style>.footer {position: absolute !important;}</style>
@if(Session::has('company_edit_success'))
<div class="alert alert-dismissible alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Record has been updated.
</div>
@endif
@if(Session::has('company_add_success'))
<div class="alert alert-dismissible alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Record has been added.
</div>
@endif

<div class="container">
    <br><br>
    <div style='width: 100%;text-align: right;padding: 0 10px;'>
        <a class="btn btn-success btn-flat" href="{{ route('company-add') }}">Add New Company</a>
    </div>
    <div class="col-12">
        <table id="_allCompany" class="table table-striped table-borderless table-scroll-vertical" cellspacing="0" width="100%">
            <thead>
            <th><b>Company</b></th>
            <th><b>Email</b></th>
            <th><b>Contact</b></th>
            <th><b>Action</b></th>
            </thead>

            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>     
                        <a class="btn btn-success btn-flat" href="{{route('company-view', ["id" => $company->id])}}">
                            View
                        </a> 
                        &nbsp;           
                        <a class="btn btn-warning btn-flat" href="{{route('invoice-add', ["companyId" => $company->id])}}">
                            + Invoice
                        </a>
                        &nbsp;           
                        <a class="btn btn-info btn-flat" href="{{route('company-edit', ["id" => $company->id])}}">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{asset("js/company.js")}}" type="text/javascript"></script>
@endsection