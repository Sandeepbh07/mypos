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
       <th></th> 
       <th>Date</th>
       <th>Transaction_id</th>
       <th>Customer Name</th>
       <th>Total sales</th>  
       <th>Amount paid</th>
       <th>Remaining amount</th>
       <th>action</th>
       </th>
    </tr>
    </thead>
    @foreach($sales as $sale)
    <tbody>
    <tr>
    <td>{{ $sale->date }}</td>
        <td>{{ $sale->transaction_id }}</td>
        <td>{{ $sale->customer->name }}</td>
        <td>{{ $sale->total }}</td>
        <td>{{ $sale->amount_paid }}</td>
        <td>{{  $sale->remaining_amount  }}</td>  
        <td><a href="{{ route('sales.edit',$sale->id)}} " class="btn btn-primary">Edit</a>
       <form action="{{ route('sales.destroy',$sale->id)  }}" method="post">
         @method('delete')
         @csrf
         <button class="btn btn-danger" type="submit">Delete</button>
       </form>
       </td>
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
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection