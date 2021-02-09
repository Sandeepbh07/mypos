<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{


public function index(){
 $users=User::all();
 return view('admin.pages.users.index',compact('users'));
}
public function create(){
    $roles=Role::all();
    return view('admin.pages.users.create',compact('roles'));
}
public function edit($id){
$user=User::findOrFail($id);
return view('admin.pages.users.edit',compact('user'));
}
public function update(Request $request,$id){
    $user=User::findOrFail($id);
    $user->update($request->all());
    return redirect('users');
}
public function delete($id){
    $user=User::findOrFail($id);
    $user->delete();
    return redirect('users');
}
public function store(Request $request){
$user=User::create($request->all());

return redirect('users');
}

}
