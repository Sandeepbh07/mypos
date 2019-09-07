@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('suppliers.update',$supplier->id)  }}">
    {{ method_field('patch')  }}

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$supplier->name}}">
                </div>
                <div class="form-group">
                  <label for="Businessname">Businessname</label>
                  <input type="text" class="form-control" name="Businessname" placeholder="Enter businessname" value="{{ $supplier->Businessname }}">
                </div>
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input type="tel" class="form-control" name="contact" placeholder="Enter contact" value="{{ $supplier->contact }}">
                </div>
                <div class="form-group">
                <label for="Address">Address</label>
                  <input type="text" class="form-control" name="Address" placeholder="Enter address" value="{{ $supplier->Address }}">
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection