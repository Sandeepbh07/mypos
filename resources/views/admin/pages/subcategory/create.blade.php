@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('subcategories.store')}}">

              <div class="box-body">

              <div class="form-group">
                  <label for="name">Choose Catgeogy</label>
               <select class="form-control" name="category_id">
                   <option value="">Choose Catgeogy</option>
                   @foreach($category as $cat)
                   <option value="{{$cat->id}}">{{$cat->name}}</option>
                   @endforeach
               </select>
</div>
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" >
</div>
<div class="form-group">
                  <button type="submit" class="btn btn-success" >Submit</button>
</div>
      
</div>
{{ csrf_field() }}
                </form>
                @endsection