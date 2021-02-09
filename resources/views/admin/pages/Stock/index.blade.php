@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr> 
    <!-- <th>Stock Id</th> -->
       <th>Product Name</th>
       <th>Quantity</th>
    </tr>
    </thead>
    @foreach($stocks as $stock)
    <tbody>
    <tr>

        <!-- <td>{{ $stock->id }}</td> -->
        <td>{{ $stock->product->name }}</td>
        <td>{{$stock->quantity }}</td>
       <td> <a href="{{route('stocks.edit',$stock->id)}}" class="btn btn-primary">Edit</a></td>
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