<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            "name" => "required",
            "email" => 'required|email|unique:users,email',
            "password" => "required|min:3",
            "image" => "required|image|mimes:png,jpg,jpeg",
            
        ]);

        // Process the uploaded image

            $image = $request->file('image');
            $imageName = uniqid().'soe'.$image->getClientOriginalName();
            $image->storeAs('public/images/', $imageName);
            $data['image'] = $imageName;


        // Ensure the password is hashed


        // Create the user
        User::create($data);

        return redirect()->route('admin.list')->with('success', 'ကျောင်းသားသုံးMailတစ်ခု ထည့်လိုက်ပါပြီ');
    }

    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();
            $name=$user->name;

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }

            else {
                return redirect()->intended('/')->with('success',$name.'အားပြန်လည်ကြိုဆိုပါတယ်');

            }
        }

        return back()->with(['error' => 'Please check your credentials!'])->withInput($request->only('email'));
    }

    public function logout(){
        $name=Auth::user()->name;
        Auth::logout();
       return redirect()->route('ui.home')->with('success',$name.'အားနှုတ်ဆက်ပါတယ်');
    }

}
