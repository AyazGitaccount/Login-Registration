<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function  signup(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8',
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'picture.required' => 'Please select a profile picture',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $image = $request->file('picture');
        $path = $image->store('storage/images');
        $yourModel = new User();
        $yourModel->name = $validateData['name'];
        $yourModel->email = $validateData['email'];
        $yourModel->password = $validateData['password'];
        $yourModel->image = $path;

        $yourModel->save();

        return redirect('/login')->with('success', 'Your account has been created successfully');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::attempt(['name' => $validatedData['name'], 'email' => $validatedData['email'], 'password' => $validatedData['password']])) {

            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors(['Credentials do not match our records.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function blog (Request $request)
    {
        
        $validateData = $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'required|min:200',
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'Description field is required.',
            'picture.required' => 'Picture  is required.',

        ]);

        $image = $request->file('picture');
        $path = $image->store('images');
        $data = new Blog();
        $data->title = $validateData['title'];
        $data->description = $validateData['description'];
        $data->image = $path;
        $data->user_id = Auth::user()->id;
        $data->save();
        
        return redirect('/blog');

        
      
    }

     public function get_blog()
      {
        $data = Blog::all()->sortDesc();
        return view('display_blog', ['content' => $data]);
      }
        

}
