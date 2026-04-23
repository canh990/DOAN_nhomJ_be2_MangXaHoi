<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CrudUserController extends Controller
{
    public function login()
    {
        return view('crud_user.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function createUser()
    {
        return view('crud_user.create');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'like' => $data['like'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect("login");
    }

    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('crud_user.read', ['messi' => $user]);
    }

    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        User::destroy($user_id);
        return redirect("list")->withSuccess('Deleted successfully');
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('crud_user.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);
        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->like = $input['like'];
        $user->save();
        return redirect("list")->withSuccess('Updated successfully');
    }

    public function listUser()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}