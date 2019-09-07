@extends('admin.master')
@section('content')
<form role="form" method="post" action="{{ route('users.update',$user->id)  }}">
    {{ method_field('patch')  }}

              <div class="box-body">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter email" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="text" class="form-control" name="Username" placeholder="Enter email" value="{{ $user->Username }}">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                <label>Role</label>
                <select class="form-control " style="width: 100%;" name="role_id">
                  <option selected="selected">{{ $user->role->name}}</option>
                  @if($user->role_id==1)
                  <option value=2 >Cashier</option>
                  @else
                  <option value=1 >Admin</option>
                  @endif 
                </select>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Submit</button>
                </div>
</div>
{{ csrf_field() }}
                </form>

@endsection