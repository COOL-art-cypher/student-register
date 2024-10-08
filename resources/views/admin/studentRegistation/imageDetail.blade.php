@extends('admin.master')
@section('content')


<div class="page-wrapper mt-0 ">
    <div class="card  bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
            style="height: 800px; filter: blur(70px); object-fit: cover;">
        <div class="card-img-overlay">


            <div>
                <div class="col-12 text-end">
                    <a href="{{url()->previous()}}" class="btn btn-primary btn-sm mb-2 ">Back</a>

                 </div>


                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5">
                        <img src="{{ asset('storage/images/' . $image) }}" style="height: 600px;width:1200px">

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection





