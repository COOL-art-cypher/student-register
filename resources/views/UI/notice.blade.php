@extends('UI.master')

@section('content')
    <div style="height: 50px"></div>

    <div class="container">
       @foreach ($notices as $notice )
       <div class="row mb-3">
        <div class="col-12">
            <div class="card  " style="height:400px;padding:20px">
                <div class="mt-3 mb-2 text-center">
                    <img src="{{ asset('user/images/logo.png') }}" style="height: 70px; width: 70px;">
                    <span class="pcolor  fw-bold  mb-3" style="font-size: 1rem; font-weight: bold;">
                        ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ
                    </span>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="card shadow-2xl p-3">
                            <img src="{{asset('storage/images/'.$notice->image)}}" style="height: 200px;width:100%">
                        </div>
                    </div>
                    <div class="col-8">
                        <div >
                            <p class="pcolor fw-bold">{{$notice->text}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       @endforeach


    </div>

    <div style="height: 200px"></div>
@endsection
