@extends('admin.master')
@section('content')
    <div class="page-wrapper mt-0 ">
        <div class="card  bg-dark text-white">
            <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
            style="height: 1100px; filter: blur(70px); object-fit: cover;">
            <div class="card-img-overlay">

                <div class="container my-3 d-flex justify-content-center">


                </div>
                <div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-5">
                            <div class="border border-primary pt-3 mt-3 rounded shadow">
                                <!-- Added border-primary for border color -->

                                <ul class="list-group list-group-flush p-3">

                                    <div class="mb-3 text-center">
                                        @if ($user->image)
                                            <img src="{{ asset('storage/images/' . $user->image) }}"
                                                class="profileimg rounded-circle"
                                                style="width: 200px; height:200px; object-fit:cover">
                                        @else
                                            <p class="text-white"><b>No photo available !</b></p>
                                        @endif
                                    </div>

                                    <li class="list-group-item bg-transparent text-white"><b>Name :</b>&nbsp;
                                        {{ $user->name }}
                                    </li>
                                    <li class="list-group-item bg-transparent text-white"><b>Email :</b>&nbsp;
                                        {{ $user->email }}
                                    </li>
                                    <li class="list-group-item bg-transparent text-white"><b>Role :</b>&nbsp;

                                        ကျောင်းသားရေးရာဌာန အက်မင်

                                    </li>
                                    <li class="list-group-item bg-transparent text-white">
                                        <a href="{{route('admin.profile.edit')}}" type="button" class="btn btn-sm  wbtn text-white border  ">
                                           EditInfo
                                        </a>
                                      
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Modal -->


                    </div>
                </div>
            </div>
        </div>
    @endsection
