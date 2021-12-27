<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.add_user');
    } 
    public function add_user()
    {
        return view('admin.add_user');
    }
    public function view_user()
    {
        $users = User::all();
 
        return view('admin.view_user', compact('users'));
    }
    public function user_edit($id)
    {
        $users = User::find($id);
        return view('admin.user_edit', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_num' => 'required',
            'user_address' => 'required',
            'user_email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data = new User;
        $data->user_name=$request->user_name;
        $data->user_num=$request->user_num;
        $data->user_address=$request->user_address;
        $data->user_email=$request->user_email;
        $data->password=Hash::make($request->password);
        $data->save();
        Session::flash('message', 'User Added Successfully.');
        Session::flash('class', 'success'); 
        return redirect()->route('add_user');
    }

    public function update_user(Request $request, $id)
    {
        
        $data = User::find($id);
        $data->user_name=$request->user_name;
        $data->user_num=$request->user_num;
        $data->user_address=$request->user_address;
        $data->user_email=$request->user_email;
        $data->password=Hash::make($request->password);
       
        $data->update();
        Session::flash('message', 'User Updated Successfully.');
        Session::flash('class', 'success'); 
        return redirect()->to('user_edit/'.$id);
    }
    public function destroy($id) {
        $data = User::findOrFail($id);
            $data->delete(); 
            return redirect()->route('view_user');
    }

    public function multipleusersdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			User::where('id', $user)->delete();
		}
		return redirect()->route('view_user');
	}
   
}
