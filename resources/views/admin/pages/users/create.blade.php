@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('users.store')}}">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" 
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Emailaddress" >
                </div>
                <div class="form-group">
                <label>Role</label>
                <select class="form-control " style="width: 100%;" name="role_id">
                  <option selected="selected"></option>
                  @foreach($roles as $role)
                  <option value="{{ $role->id}}" >{{ $role->name }}</option>
                 @endforeach
                </select>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>
                @endsection