@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{ route('categories.create')  }}">Add new category</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
       <th>Category Name</th> 
       <th>Action</th>
    </tr>
    </thead>
    @foreach($categories as $category)
    <tbody>
    <tr>
        <td>{{ $category->name }}</td>
       <td><a href="{{ route('categories.edit',$category->id)}} " class="btn btn-primary">Edit</a>
       <form action="{{ route('categories.destroy',$category->id)  }}" method="post">
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