<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function home(){
        return view('UI.index');
    }
    public function contact(){
        return view('UI.contact');
    }

    public function login(){
        return view('Auth.login');
    }

    public function stuReg(){
        $years=AcademicYear::all();
        return view('UI.sturegist',compact('years'));
    }

 public function uiRegister(){
    return view('Auth.register');
 }

    public function userStore(Request $request){

            $data = $request->validate([
                "name" => "required",
                "email" => 'required|email|unique:users,email',
                "password" => "required|min:3",
                "image" => "required|image|mimes:png,jpg,jpeg"
            ]);

            // Process the uploaded image

                $image = $request->file('image');
                $imageName = uniqid().'soe'.$image->getClientOriginalName();
                $image->storeAs('public/images/', $imageName);
                $data['image'] = $imageName;


            // Ensure the password is hashed


            // Create the user
            User::create($data);

            return redirect()->route('ui.login')->with('success', 'Success Register');
        }

        public function history(){
           $regs=StudentRegistration::where('user_id',Auth::user()->id)->paginate();
           return view('UI.history',compact('regs'));
        }
        public function showImage($name){

            $image=$name;

            return view('UI.image',compact('image'));

        }

        public function viewDetail($id){
            $student=StudentRegistration::find($id);
            return view('UI.detail',compact('student'));
        }

        public function regDelete($id){
            $reg=StudentRegistration::find($id);
            if($reg->status==="confirm")
            {
               return back()->with('error', 'ကျောင်းသားရေးရာမှ ကျောင်းအပ်ခြင်းကို လက်ခံထားပီးဖစ်သောကြောင့် ဖျက်၍မရနိုင်ပါ');
            }
            elseif($reg->status==="edit"){
                return back()->with('error', 'သင့်ရဲ့ ကျောင်းအပ်ခြင်းကို ကျောင်းသားရေးရာမှ စစ်ဆေး၍ ပြင်ဆင်ခွင့်ပေးထားပီးဖြစ်သောကြောင့် ဖျက်မရနိုင်ပါ');
            }
            {
                $reg->delete();
                return back()->with('success', 'သင်၏ ကျောင်းအပ်ထားသော formအားဖျက်ပီးပါပီ');
            }

        }


        public function regEdit($id){
            $student=StudentRegistration::find($id);
            $years=AcademicYear::all();
            return view('UI.editReg',compact('student','years'));
        }

}
