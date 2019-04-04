<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
	.line{
		width: inherit;
		height: 47px;
		border-bottom: 5px solid black;
		position: absolute;
	}
	</style>
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }} " target="_blank">Download PDF</a>
	<table class="table table-bordered">
		<thead>
			<th>Name</th>
			<th>Email</th>
		</thead>
		@foreach ($value as $_value)
		<tbody>
			<td>{{$_value->name}}</td>
			<td>{{$_value->email}}</td>
		</tbody>
		@endforeach

	</table>

<!-- start template -->
<div class='col-12' style='width:100%;display: inline-flex;'>
        <div style='width:50%;'>
            <h6>Company Name</h6>
            <h6>Address 1</h6>
            <h6>Address 2</h6>
            <h6>City, State</h6>
            <br>
            <h6>Email</h6>
            <h6>Phone #</h6>
        </div>

        <div style='width:50%;'>
            <img src='/assets/images/test/test.png' style='width: 10%;height: 100px;float: right;'>
        </div>
    </div>	
	<div class="line"></div>
	<br><br><br>

	<div class='col-12' style='width:100%;display: inline-flex;'>
        <div style='width:50%;'>
            <h6>Customer Name</h6>
            <h6>Address 1</h6>
            <h6>Address 2</h6>
            <h6>City, State</h6>
            <br>
        </div>

        <div style='width:50%;'>
			<h6>Address 1</h6>
            <h6>Address 2</h6>
        </div>
    </div>	
	<div class="line"></div>
	<br><br><br>

	<table class="table table-bordered table-sm" style='border:none !important;'>
	<br><br><br>
		<tr class="table-active">
			<th>Description</th>
			<th>Qty/Unit</th>
			<th>Unit Price</th>
			<th>Total</th>
		</tr>
		@foreach ($value as $_value)
		<tr>
			<td>{{$_value->name}}</td>
			<td>{{$_value->email}}</td>
			<td>{{$_value->name}}</td>
			<td>{{$_value->name}}</td>
		</tr>
		@endforeach
	</table>

	<div class='col-12' style='width:100%;display: inline-flex;'>
        <div style='width:50%;text-align: start;'>
            <h6>Thank you</h6>
            <h6>Regards</h6>
            <br>
        </div>

        <div style='width:50%;float:right;text-align: end;'>
			<h6>Subtotal 	: RM 90.00</h6>
            <h6>Discount 	: RM 90.00</h6>
            <h6>Tax (RM) 	: RM 90.00</h6>
            <h6>Grand Total : RM 90.00</h6>	
        </div>
    </div>

	<br><br><br>
    <!-- end template -->
</div>

</body>
</html>