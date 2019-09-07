@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('customers.store')  }}">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" >
                </div>
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input type="tel" class="form-control" name="contact" placeholder="Enter contact" >
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Enter address" >
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection