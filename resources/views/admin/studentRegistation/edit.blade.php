@extends('admin.master')

@section('content')
<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
            style="height: 800px; filter: blur(70px); object-fit: cover;">
        <div class="card-img-overlay">

<div style="height: 50px"></div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="height: 700px">
                <h1 class="pcolor text-center fw-bold mt-4 mb-3" style="font-size: 1rem; font-weight: bold;">
                    ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ
                </h1>
                <div class="container">
                    <form action="{{route('admin.stu.reg.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- Academic Year -->
                        <input name="user_id" value="{{$student->user->id}}" type="hidden">
                        <div class="mb-3 row align-items-center container">
                           <div class="col-4">
                             <label for="year-select" class=" col-form-label pcolor ml-5"><b>သင်တန်းနှစ်</b></label>
                            <div class="">
                                <select id="year-select" class="form-control @error('acedmic_year_id') is-invalid @enderror" name="acedmic_year_id" value="{{$student->acedmic_year_id}}">
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                                @error('acedmic_year_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
                          <div class="col-4">
                                                <label for="specialist"
                                                    class=" col-form-label pcolor ml-5"><b>အထူးပြုဘာသာ</b></label>
                                                <div class="">
                                                    <select id="specialist"
                                                        class="form-control @error('specialist') is-invalid @enderror"
                                                        name="specialist">
                                                        <option value="computer_science"
                                                            {{ old('specialist') == 'computer_science' ? 'selected' : '' }}>
                                                            Computer Science</option>
                                                        <option value="computer_technology"
                                                            {{ old('specialist') == 'computer_technology' ? 'selected' : '' }}>
                                                            Computer Technology</option>
                                                            <option value="CST"
                                                            {{ old('specialist') == 'CST' ? 'selected' : '' }}>
                                                            CST</option>
                                                    </select>
                                                    @error('specialist')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                            <div class="col-4">
                                 <label for="roll_no" class=" col-form-label pcolor ml-5"><b>ခုံနံပါတ်</b></label>
                            <div class="">
                                <input id="roll_no" type="number" class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" value="{{ old('roll_no') ?? $student->roll_no }}">
                                @error('roll_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div> </div>
                        </div>

                        <!-- Specialist -->


                        <!-- Student Name -->


                        <!-- Student Image -->
                        <div class="mb-3 row align-items-center container">
                           <div class="col-6">
                             <label for="student_image" class=" col-form-label pcolor ml-5"><b>ကျောင်းသားလိုင်စင်ပုံ</b></label>
                            <div class="">
                                <input id="student_image" type="file" class="form-control @error('student_image') is-invalid @enderror" name="student_image">
                                @error('student_image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-6">
                              <label for="student_phone" class=" col-form-label pcolor ml-5"><b>ကျောင်းသား ဖုန်းနံပါတ်</b></label>
                            <div class="">
                                <input id="student_phone" type="text" minlength="11" maxlength="11" class="form-control @error('student_phone') is-invalid @enderror" name="student_phone" value="{{ old('student_phone') ?? $student->student_phone }}">
                                @error('student_phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>

                        </div>

                        <!-- Father's Name -->
                        <div class="mb-3 row align-items-center container">
                           <div class="col-4">
                             <label for="father_name" class=" col-form-label pcolor ml-5"><b>အဘအမည်</b></label>
                            <div class="">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name')?? $student->father_name }}">
                                @error('father_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-4"> <label for="father_nrc_photo" class=" col-form-label pcolor ml-5"><b>အဘ မှတ်ပုံတင် မိတ္တူ အရှေ့</b></label>
                            <div class="">
                                <input id="father_nrc_photo" type="file" class="form-control @error('father_nrc_photo') is-invalid @enderror" name="father_nrc_photo">
                                @error('father_nrc_photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div></div>
                           <div class="col-4">
                              <label for="father_nrc_back" class="col-form-label pcolor ml-5"><b>အဘ မှတ်ပုံတင် မိတ္တူ အနောက်</b></label>
                            <div class="">
                                <input id="father_nrc_back" type="file" class="form-control @error('father_nrc_back') is-invalid @enderror" name="father_nrc_back">
                                @error('father_nrc_back')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
                        </div>




                        <!-- Mother's Name -->
                        <div class="mb-3 row align-items-center container">
                          <div class="col-4">
                             <label for="mother_name" class=" col-form-label pcolor ml-5"><b>အမိအမည်</b></label>
                            <div class="">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') ?? $student->mother_name }}">
                                @error('mother_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="col-4">
                             <label for="mother_nrc_photo" class=" col-form-label pcolor ml-5"><b>အမိမှတ်ပုံတင် မိတ္တူ အရှေ့</b></label>
                            <div class="">
                                <input id="mother_nrc_photo" type="file" class="form-control @error('mother_nrc_photo') is-invalid @enderror" name="mother_nrc_photo">
                                @error('mother_nrc_photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="col-4">
                            <label for="mother_nrc_back" class=" col-form-label pcolor ml-5"><b>အမိမှတ်ပုံတင် မိတ္တူ အနောက်</b></label>
                            <div class="">
                                <input id="mother_nrc_back" type="file" class="form-control @error('mother_nrc_back') is-invalid @enderror" name="mother_nrc_back">
                                @error('mother_nrc_back')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                        </div>



                        <!-- Parent's Phone Number -->
                        <div class="mb-3 row align-items-center container">
                        <div class="col-4">
                                <label for="parent_phone" class=" col-form-label pcolor ml-5"><b>မိဘ ဖုန်းနံပါတ်</b></label>
                            <div class="">
                                <input id="parent_phone" type="text" minlength="11" maxlength="11" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" value="{{ old('parent_phone')?? $student->parent_phone }}">
                                @error('parent_phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                             <label for="address" class=" col-form-label pcolor ml-5"><b>နေရပ်လိပ်စာ</b></label>
                            <div class="">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') ??  $student->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                             <label for="family" class=" col-form-label pcolor ml-5"><b>အိမ်ထောင်စုစာရင်း မိတ္တူ</b></label>
                            <div class="">
                                <input id="family" type="file" class="form-control @error('family') is-invalid @enderror" name="family">
                                @error('family')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        </div>



                              <div class="mb-3 row align-items-center container">
                                           <div class="col-4">
                                             <label for="family" class=" col-form-label pcolor ml-5"><b>
                                                    ငွေလွဲပြေစာ</b></label>
                                            <div class="">
                                                <input id="family" type="file"
                                                    class="form-control @error('family') is-invalid @enderror"
                                                    name="payment_img">
                                                @error('payment_img')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                           </div>
                                           <div class="col-4">
                                             <label for="family" class=" col-form-label pcolor ml-5"><b>
                                                 ကျောင်းသားမှတ်ပုံတင်
                                                        အရှေ့</b></label>
                                            <div class="">
                                                <input id="family" type="file"
                                                    class="form-control @error('family') is-invalid @enderror"
                                                    name="student_nrc_photo">
                                                @error('student_nrc_photo')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                           </div>
                                           <div class="col-4">
                                             <label for="family" class=" col-form-label pcolor ml-5"><b>
                                                   ကျောင်းသားမှတ်ပုံတင်
                                                        အနောက်</b></label>
                                            <div class="">
                                                <input id="family" type="file"
                                                    class="form-control @error('family') is-invalid @enderror"
                                                    name="student_nrc_back">
                                                @error('student_nrc_photo')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                           </div>
                                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3 row align-items-center container">
                            <div class="row align-items-center">
                                <div class="col-sm-6 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <a href="{{route('admin.stu.reg.list')}}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="height: 200px"></div>
@endsection
