@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{ route('users.create')  }}">Add new User</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
       
       <th>Name</th>
       <th>Email</th>
       <th>Edit</th>
       <th>Delete</th>
    </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
       <td> <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary "><i class="fa fa-edit"></i>Edit</a></td>
       <td> <form class="form-inline" role="form" action="{{ route('users.delete',$user->id) }}" method="post" >
            @method('delete')
            @csrf
            <div class="form-group">
            <button class="btn btn-danger "><i class="fa fa-trash"></i>Delete</button>
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