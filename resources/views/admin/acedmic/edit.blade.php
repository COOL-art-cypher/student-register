@extends('admin.master')
@section('content')

<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(15px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
    <div class="col-8 mx-auto  mt-5">
        <div class="card mt-5 mb-3 card-small" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);  background-color: rgb(182, 218, 229);padding:10px">
            <div class="row g-0 d-flex align-items-center shadow-2xl " >
                <div class="col-lg-5 d-none d-lg-flex ">
                    <img src="{{asset('user/images/logo.png')}}"
                        alt="MADB logo" class="w-80 ml-5 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 250px" />
                </div>
                <div class="col-lg-7">
                    <div class="mr-5" >
                        <form action="{{route('admin.acedimic.update',$year->id)}}" method="post" >
                            @csrf
                            @method('PUT')
                            <h3 class="text-center mb-4">ပြုပြင်ရန်</h3>
                            <input type="hidden" value="{{$year->id}}" name="id">


                            <div class="mb-3">
                                <label for="name" class="mb-1"><b>နှစ်အမျိုးအမည်</b></label>
                                <input id="name" type="text" class="form-control border-0 shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name', $year->name) }}" autofocus>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="enrollment" class="mb-1"><b>ကျောင်းအပ်ခ</b></label>
                                <input id="enrollment" type="number" class="form-control border-0 shadow @error('enrollment') is-invalid @enderror" name="enrollment" value="{{ old('enrollment', $year->enrollment) }}">
                                @error('enrollment')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>





                            <div class="form-group row mb-1">
                                <div class="col-md-10 offset-md-1 text-center">

                                    <button type="submit" class="btn btn-sm wbtn border text-white fw-bold float-end">Update</button>
                                    <a href="{{route('admin.acedimcList')}}"  class="btn btn-sm wbtn border text-white fw-bold float-end"> Back</a>
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
