@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subcategories</h3>
            </div>
            <!-- /.box-header -->
            <a class="btn btn-primary" href="{{ route('subcategories.create')  }}">Add new Subcategory</a>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
       <th>SubCategory Name</th> 
       <th>Edit</th>
       <th>Delete</th>
    </tr>
    </thead>
    @foreach($subcategories as $subcategory)
    <tbody>
    <tr>
        <td>{{ $subcategory->name }}</td>
       <td><a href="{{ route('subcategories.edit',$subcategory->id)}} " class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
       <td><form action="{{ route('subcategories.destroy',$subcategory->id)  }}" method="post">
         @method('delete')
         @csrf
         <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>Delete</button>
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