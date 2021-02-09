@extends('admin.master')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>Id</th>
    <th>Role</th> 
    </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id }}</td>
            <td>{{ $role->name }}</td>
        </tr>
        @endforeach
    </tbody>
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