@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('subcategories.update',$subcategory->id)}}">
    {{ method_field('patch')  }}

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Category</label>
                  <select class="form-control" name="category_id">
                   @foreach($category as $cat)
                    <option value="{{$cat->id}}" {{$subcategory->category->id==$cat->id?'selected':''}} >{{$cat->name}} </option>
                    @endforeach
                  </select>
                </div>
              
                <div class="form-group">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter email" value="{{ $subcategory->name }}">
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection