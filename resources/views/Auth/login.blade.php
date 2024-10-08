@extends('UI.master')

@section('content')

<div class="container">
    <div style="height: 30px">

    </div>
    <div class="col-8 mx-auto mt-5">
        <div class="card mt-5 mb-3 card-small" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);  background-color: rgb(182, 218, 229);">
            <div class="row g-0 d-flex align-items-center shadow-2xl" >
                <div class="col-lg-5 d-none d-lg-flex ">
                    <img src="{{asset('user/images/logo.png')}}"
                        alt="MADB logo" class="w-80 ml-5 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 250px" />
                </div>
                <div class="col-lg-7">
                    <div class="mr-5">
                        <form action="{{route('login')}}" method="post"> @csrf
                            <h3>အကောင့်၀င်ရန်</h3>


                            <div class=" p-4 border-0 ">
                                <div class="mb-3">
                                    <label for="email" class="mb-2"><b>Email</b></label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control border-0 shadow @error('email') is-invalid @enderror"
                                        id="email" placeholder="Enter your email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="mb-2"><b>လျှိုဝှက်နံပါတ်ထည့်ရန်</b></label>
                                    <input type="password" name="password"
                                        class="form-control border-0 shadow @error('password') is-invalid @enderror"
                                        id="password" placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <button class="btn btn-sm  wbtn text-white border border-primary ">၀င်မည်</button>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



@endsection
