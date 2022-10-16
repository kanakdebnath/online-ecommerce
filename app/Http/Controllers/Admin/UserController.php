<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    
    public function index()
    {
       $models = User::where('user_type','user')->get();
       return view('admin.user.index',compact('models'));
    }
   
    
    public function create()
    {
       return view('admin.user.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'phone' => ['required','unique:users', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'email' => 'required|unique:users|max:255',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $model = new User;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->password = Hash::make($request->password);

        
        $model->save();

        return redirect()->route('admin.user.index')->with('messege','User Create Successfully');
        

    }


    
    public function edit($id)
    {
       $model = User::findOrFail($id);
       return view('admin.user.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => 'required|max:255',
            'phone' => ['required','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'address' => 'required',
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->status = $request->status;

        
        $model->save();

        return redirect()->route('admin.user.index')->with('messege','User Update Successfully');
        

    }


    public function delete($id)
    {
       $model = User::findOrFail($id);
       $model->delete();
       return redirect()->route('admin.user.index')->with('messege','User Delete Successfully');
    }


}
