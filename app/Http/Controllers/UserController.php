<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Document;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('SystemAdmin');
    }
    
    public function getUsers()
    {   
        $users = DB::table('users')->where('isArchived',0)->get();
        return view ('users.view', compact('users'));
    }
    
    public function submitEditUser(Request $request, $userID)
    {

        echo "test";

        $this->validate($request, [
            'userName' => 'max:190',
            'email' => 'max:190',
            'role' => 'required',
        ]);
        
        $user = User::where('id', $userID)->first();

        if ($request['name'] != "") {
            $user->name = $request['name'];
        }
        if ($request['email'] != "") {
            $user->email = $request['email'];
        }
        if ($request['role'] != "") {
            $user->role = $request['role'];
        }
        $user->update();

        return redirect('admin/users')->with('status', 'User updated successfully.');
    }
    
    public function editUser(Request $request, $userID) {
        
        $users = DB::table('users')->where('id', $userID)->get();
        return view('users.edit', compact('users'));
    }
    
    public function deleteUser(Request $request, $userID)
    {
        $user = User::where('id', $userID)->first();
        
        $user->isArchived = 1;
        
        $user->update();
        
        return redirect('admin/users')->with('status', 'User archived successfully.');
    }
}
