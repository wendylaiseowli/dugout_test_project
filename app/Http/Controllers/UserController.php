<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserList;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
        $users = UserList::select('id', 'first_name', 'last_name', 'username', 'email', 'status', 'access_type', 'updated_at')->get();
        return view('user.user', compact('users'));
    }

    public function ceate(){

    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function update(UserRequest $request, UserList $user){
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
            return redirect('/users')->with('success', 'User details has been updated successfully');
    }

    public function destroy(UserList $user){
        $user->delete();
        return redirect('/users')->with('success', 'User has been deleted successfully');
    }

    public function active(UserList $user){
        $user->update(['status'=> true]);
        return redirect('/users')->with('success', 'User details has been activated successfully');
    }

    public function deactive(UserList $user){
        $user->update(['status'=> false]);
        return redirect('/users')->with('success', 'User details has been deactivated successfully');
    }

}
