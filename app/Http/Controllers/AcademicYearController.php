<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class AcademicYearController extends Controller
{
    public function acedmicList(){
        $years=AcademicYear::latest()->paginate(10);
        return view('admin.acedmic.list',compact('years'));
    }

    public function acedmicAdd()
{
    return view('admin.acedmic.add');
}

public function acedmicStore(Request $request){
    $data=$request->validate([
        "name"=>"required",
        "enrollment"=>"required"
    ]);
    AcademicYear::create($data);
    return redirect()->route('admin.acedimcList')->with('success','အောင်မြင်စွာ ဖန်တီးပီးပါပြီ');
}

public function acedmicEdit($id)
{
    $year=AcademicYear::find($id);
    return view('admin.acedmic.edit',compact('year'));
}

public function acedmicUpdate(Request $request, $id)
{

    $data = $request->validate([
        "name" => "required",
        "enrollment" => "required"
    ]);


    // Find the academic year by id
    $year = AcademicYear::find($id);

    // Check if the academic year exists
    if (!$year) {
        return back()->with('error', 'Academic year not found.');
    }

    // Update the academic year with the validated data
    $year->update($data);

    // Redirect to the academic list with a success message
    return redirect()->route('admin.acedimcList')->with('success','အောင်မြင်စွာပြင်ဆင်ပီးပါပြီ');
}

public function acedmicDelete($id){

    return back()->with('success','အောင်မြင်စွာဖြတ်လိုက်ပါပြီ');

}
}

