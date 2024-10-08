<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Notice;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AdminController extends Controller
{

    public function acceptSearch(Request $request)
    {

        $searchKey = $request->input('student_name');
        $academicYearId = $request->input('academic_year_id');
        $specialist = $request->input('specialist');
        $query = StudentRegistration::query()->where('status', 'confirm');
        $years = AcademicYear::all();
        if ($searchKey) {
            $query->whereHas('user', function ($query) use ($searchKey) {
                $query->where('name', 'like', '%' . $searchKey . '%');
            });
        }
        if ($academicYearId) {
            $query->where('academic_year_id', $academicYearId);
        }
        if ($specialist) {
            $query->where('specialist', $specialist);
        }

        $query->whereHas('user', function ($query) {
            $query->where('stop', 'no');
        });
        $regs = $query->paginate(10);
        return view('admin.accept.acceptList', compact('regs', 'years'));
    }


   public function acceptList(){
        $years=AcademicYear::all();
        $regs = StudentRegistration::where('status', 'confirm')
        ->whereHas('user', function ($query) {
            $query->where('stop', 'no');
        })
        ->paginate(5);
        return view('admin.accept.acceptList',compact('regs','years'));
   }

    public function index(){
        $mails=User::where('role','user')->get();
        $regs=StudentRegistration::where('status','pending')->get();
        $notices=Notice::all();
        $years=AcademicYear::all();
        return view('admin.index',compact('mails','regs','notices','years'));
    }
       public function addAdmin(){
        return view('admin.admin.add');
    }
    public function adminList(Request $request){
        $searchKey = $request->input('search');
        $admins = User::where('role', 'user')->where('stop', 'no');
        if ($searchKey) {
            $admins->where(function ($query) use ($searchKey) {
                $query->where('name', 'like', '%' . $searchKey . '%');
            });
        }

        $admins = $admins->latest()->paginate(10);

        return view('admin.admin.list', compact('admins'));


    }

    public function stopStuList(Request $request){
        $searchKey = $request->input('search');
        $admins = User::where('role', 'user')->where('stop', 'yes');
        if ($searchKey) {
            $admins->where(function ($query) use ($searchKey) {
                $query->where('name', 'like', '%' . $searchKey . '%');
            });
        }
        $admins = $admins->latest()->paginate(10);
       return view('admin.stopStu.list',compact('admins'));
    }

    public function adminEdit($id){
        $user=User::find($id);
        return view('admin.admin.edit',compact('user'));

    }

    public function adminUpdate(Request $request){
        $data = $request->validate([
            "name" => "required",
            "email" => 'required',
            "password" => "required|min:3",
            "image" => "required|image|mimes:png,jpg,jpeg",
            //"sch_no"=>"required"
        ]);

        // Process the uploaded image

            $image = $request->file('image');
            $imageName = uniqid().'soe'.$image->getClientOriginalName();
            $image->storeAs('public/images/', $imageName);
            $data['image'] = $imageName;


        // Ensure the password is hashed
        $user=User::find($request->input('id'))->update($data);


        // Create the user


        return redirect()->route('admin.list')->with('success', ' အောင်မြင်စွာပြင်လိုက်ပါပြီ');

    }

    public function adminDelete($id){
        try {
            $userId=Auth::user()->id;
            if($id==$userId){
                return back()->with('error', 'သင်သည် ကိုယ့်ကိုကိုယ် ဖြတ်၍မရပါ။');
            }
            else{
                $user = User::findOrFail($id);
                $user->delete();
                return back()->with('success', 'အောင်မြင်စွာဖြတ်လိုက်ပါပြီ');

            }
        } catch (\Exception $e) {
            return back()->with('error', 'မူလကျားကိုဖြတ်၍မရပါ။');
        }
    }


    public function adminProfile(){
        $user=User::find(Auth::user()->id);
        return view('admin.profile.index',compact('user'));
    }

    public function adminEditProfile(){
        $user=User::find(Auth::user()->id);
        return view('admin.profile.edit',compact('user'));

    }

    public function adminUpdateProfile(Request $request){
        $data=$request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required|min:5",
            "image"=>"required|image|mimes:png,jpg,jpeg"

        ]);

        $image = $request->file('image');
        $imageName = uniqid().'soe'.$image->getClientOriginalName();
        $image->storeAs('public/images/', $imageName);
        $data['image'] = $imageName;

        $user=User::find(Auth::user()->id);
        $user->update($data);
        return redirect()->route('admin.profile')->with('success','အောင်မြင်စွာပြင်လိုက်ပါပြီ');

    }

    public function stopMail($id){
        $data=User::find($id);
        $data->stop="yes";
        $data->save();
        return back()->with('success','ကျောင်းသားအား ရပ်နားထားသည်');
    }

    public function nostopMail($id){
        $data = User::find($id);
        $data->stop = "no";
        $data->save();
        return back()->with('success', 'ကျောင်းသားအား ပြန်လည်ခွင့်ပြုသည်');
    }

    public function stopdownloadWordFile(){
        // Fetch the data you want to include in the Word document
        $admins =User::where('role','user')->where('stop','yes')->get(); // Adjust this to your actual data fetching logic

        // Create a new PhpWord object
        $phpWord = new PhpWord();

        // Add a section to the document
        $section = $phpWord->addSection();
        $section->addText(
            'ကျောင်းရပ်နားသူများစာရင်း',
            ['name' => 'Arial', 'size' => 14, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );

        // Add table to the document
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Define table header
        $table->addRow();
        $table->addCell()->addText('စဉ်', ['size' => 10]);
        $table->addCell()->addText('အမည်', ['size' => 10]);
        $table->addCell()->addText('Email', ['size' => 10]);
        //$table->addCell()->addText('ကျောင်း oင်ခွင့်အမှတ်', ['size' => 10]);

        $table->addCell()->addText('ရပ်နားစရင်းထည့်ထားသည်', ['size' => 10]);



        $key = 1;
        foreach ($admins as $admin) {
            $table->addRow();
            $table->addCell()->addText($key++); // Replace with appropriate data
            $table->addCell()->addText($admin->name);
            $table->addCell()->addText($admin->email);


            // Image handling in Word documents can be complex; consider leaving this empty or use another method
            $table->addCell()->addText('ရပ်နားထားသည်');
             // Link handling in Word documents is complex; consider leaving this empty or using another method
            // Similarly, handle download links
        }

        // Save the document to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'Word');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        // Return the document as a download response
        return response()->download($tempFile, 'admins_list.docx')->deleteFileAfterSend(true);
    }
}
