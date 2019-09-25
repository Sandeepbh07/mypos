@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{route('customers.create')}}">Create a new customer</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr> 
    <th>Customer Id</th>
       <th>Name</th>
       <th>Image</th>
       <th>Address</th>
       <th>Contact</th>
       <th>action</th>
       </th>
    </tr>
    </thead>
    @foreach($customer as $customer)
    <tbody>
    <tr>

        <td>{{ $customer->cuid }}</td>
        <td>{{ $customer->name }}</td>
        <td><img src="/images/customer/{{ $customer->customer_images }}" style="width:100px;"></td>
        <td>{{$customer->address }}</td>
        <td>{{ $customer->contact }}</td>
       <td> <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
       
        <form class="form-inline" role="form" action="{{route('customers.destroy',$customer->id)}}" method="post" >
            @method('delete')
            @csrf
            <div class="form-group">
            <button class="btn btn-danger">Delete</button>
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