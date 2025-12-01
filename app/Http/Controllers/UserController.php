<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::select('id', 'first_name', 'last_name', 'username', 'email', 'status', 'updated_at')->orderByRaw("id = ? DESC", [Auth::id()])->get();
        return view('user.user', compact('users'));
    }

    public function update(UserRequest $request, User $user){
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
            return redirect('/users')->with('success', 'User details has been updated successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/users')->with('success', 'User has been deleted successfully');
    }

    public function active(User $user){
        $user->update(['status'=> true]);
        return redirect('/users')->with('success', 'User details has been activated successfully');
    }

    public function deactive(User $user){
        $user->update(['status'=> false]);
        return redirect('/users')->with('success', 'User details has been deactivated successfully');
    }

}
