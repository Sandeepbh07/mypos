@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Suppliers</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{route('suppliers.create')}}">Create a new supplier</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>Name</th>
       <th>Business Name</th>
       <th>Contact</th>
       <th>Address</th>
       <th>Edit</th>
       <th>Delete</th>
    </tr>
    </thead>
    @foreach($suppliers as $supplier)
    <tbody>
    <tr>
    <td>{{$supplier->name }}</td>
        <td>{{ $supplier->Businessname }}</td>
        <td>{{ $supplier->contact }}</td>
        <td>{{ $supplier->Address }}</td>
       <td> <a href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a></td>
       <td>
        <form class="form-inline" role="form" action="{{route('suppliers.destroy',$supplier->id)}}" method="post" >
            @method('delete')
            @csrf
            <div class="form-group">
            <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection