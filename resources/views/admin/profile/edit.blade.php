@extends('admin.master')
@section('content')

    <div class="page-wrapper mt-0 ">
        <div class="card  bg-dark text-white">
            <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
            style="height: 1100px; filter: blur(70px); object-fit: cover;">
            <div class="card-img-overlay">
    <div style="height: 50px"></div>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <div class="border wtext wborder p-3">
                <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="text-center mb-4">အကောင့်ပြုပြင်ရန်</h3>
                    <div class="mb-3">
                        <label for="image-upload" class="mb-1"><b>Upload Image</b></label>
                        <input id="image-upload" type="file" class="form-control border-0 shadow @error('image') is-invalid @enderror" name="image">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="mb-1"><b>Name</b></label>
                        <input id="name" type="text" class="form-control border-0 shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="mb-2"><b>E-Mail Address</b></label>
                        <input id="email" type="email" class="form-control border-0 shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="mb-1"><b>Password</b></label>
                        <input id="password" type="password" class="form-control border-0 shadow @error('password') is-invalid @enderror" name="password" value="{{old('password',$user->password)}}">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>





                    <div class="form-group row mb-1">
                        <div class="col-md-10 offset-md-1 text-center">

                            <button type="submit" class="btn btn-sm wbtn border text-white fw-bold float-end">Update</button>
                            <a href="{{route('admin.profile')}}"  class="btn btn-sm wbtn border text-white fw-bold float-end"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="section-twitter">
    <i class="fa fa-twitter icon-big"></i>
</div></div></div>

@endsection
