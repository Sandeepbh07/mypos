@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('categories.update',$category->id)}}">
    {{ method_field('patch')  }}

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter email" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection