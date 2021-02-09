@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
       <th>Date</th>
       <th>Product name</th>
       <th>Customer Name</th>
       <th>Quantity</th>  
       <th>Price</th>
       <th>Discount</th>
       <th>VAT</th>
       </th>
    </tr>
    </thead>
    @foreach($sales as $sale)
    <tbody>
    <tr>
    <td>{{ $sale->created_at->format('d/m/Y') }}</td>
        <td>{{ $sale->product->name }}</td>
        <td>{{ $sale->transaction->customer->name   }}</td>
        <td>{{ $sale->quantity }}</td>
        <td>{{ $sale->price }}</td>
        <td>{{ $sale->discount }}</td>
        <td>{{ $sale->vat   }}</td>
         
    </tr>
@endforeach
</tbody>
</table>
            </div>
            </div>
            </div>
            </div>
</section>
@endsection
@section('scripts')
<script>
     $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection