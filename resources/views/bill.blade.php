
@extends('admin.master')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12" id="printdiv">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hamro Mart</h3>
<br>
            Name:  {{$transaction->customer->name}}
            <br>
            Date:{{$transaction->created_at}}
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>

       <th>Item</th>
       <th>Unit Cost</th>
       <th>Quantity</th>
       <th>Discount</th>


    </tr>
    </thead>
    @foreach($sales as $sale)
    <tbody>
    <tr>
    <td>{{$sale->product->name }}</td>
    <td>{{$sale->product->selling_price }}</td>
    <td>{{$sale->quantity }}</td>
    <td>{{$sale->discount }}</td>
  
     

    </tr>
@endforeach
<tr>
    <th></th>
    <th>Total</th>
<th>Amount Paid</th>

       <th>Remaining Amount</th>
   
     
</tr>
<tr>
   <td></td> 
   <td>{{$transaction->total}}</td>
<td>{{$transaction->amount_paid}}</td>

<td>{{$transaction->remaining_amount}}</td>



</tr>
</tbody>
</table>
            </div>
            </div>
            </div>
       
                <div clas="col-lg-12 text-center">
            <button onclick="printContent('printdiv');" class="btn btn-lg btn-success text-center d-block mx-auto" style="margin-left:200px;">Print bill <i class="fa fa-print"></i></button>
            <button onclick="goback();" class="btn btn-lg btn-success text-center d-block mx-auto" style="margin-left:200px;">Go back <i class="fa fa-refresh"></i></button>     
        </div>
        
            </div>
</section>
@endsection
@section('scripts')
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
var enteredtext = $('#text').val();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
$('#text').html(enteredtext);
}
function goback()
{
    window.location.href="/sales";
}
</script>

@endsection