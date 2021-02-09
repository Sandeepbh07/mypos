@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{ route('purchases.create')  }}">Add new purchase</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
       <th>Date</th>
       <th>Product</th> 
       <th>Supplier</th>
       <th>Total amount</th>
       <th>Paid Amount</th>
       <th>Remaining Amount</th>
       <th>Quantity</th>
       <!-- <th>Edit</th>
       <th>Delete</th> -->
    </tr>
    </thead>
    @foreach($purchases as $purchase)
    <tbody>
    <tr>
    <td>{{ $purchase->created_at->format('d/m/y') }}</td>
    <td>{{ $purchase->product->name }}</td>
        <td>{{ $purchase->supplier->name }}</td>
        <td>{{ $purchase->total_amount }}</td>
        <td>{{ $purchase->amount_paid }}</td>
        <td>{{ $purchase->remaining_amount  }}</td>
        <td>{{  $purchase->quantity  }}</td>
       <!-- <td> <a href="{{ route('purchases.edit',$purchase->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
       <td>
        <form class="form-inline" role="form" action="{{ route('purchases.destroy',$purchase->id) }}" method="post" >
            @method('delete')
            @csrf
            <div class="form-group">
            <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button> -->
</div>
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
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection