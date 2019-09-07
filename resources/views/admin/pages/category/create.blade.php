@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('categories.store')}}">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" 
</div>
<div class="form-group">
                  <button type="submit" class="btn btn-success" >Submit</button>
</div>
      
</div>
{{ csrf_field() }}
                </form>
                @endsection