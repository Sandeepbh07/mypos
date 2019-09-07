@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('users.store')}}">

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" 
                </div>
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="text" class="form-control" name="Username" placeholder="username" >
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Emailaddress" >
                </div>
                <div class="form-group">
                <label>Role</label>
                <select class="form-control " style="width: 100%;" name="role_id">
                  <option selected="selected"></option>
                  <option value=2 >Cashier</option>
                  <option value=1 >Admin</option>
                 
                </select>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>
                @endsection