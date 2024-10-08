@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(60px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-11">
                                    <div class="d-flex jusitfy-content-center gap-3">
                                        <div class="col-12 ">
                                            <form
                                                class="d-none  d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <form action="{{ route('admin.list') }}" method="GET">
                                                        @csrf
                                                        <input type="text" name="search" class="form-control border-success small"
                                                               aria-label="Search" aria-describedby="basic-addon2"
                                                               value="{{ request('search') }}" style="">
                                                        <div class="input-group-append">
                                                            <button class="btn wbtn" type="submit">
                                                                <i class="fas fa-search fa-sm text-white"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </form>



                                        </div>

                                     <div class="form-control border-success small"><a href="{{ route('stop.stu.wordfile')}}"><i class="fas fa-download" style="color: blue"></i></a></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row align-items-center">


                        </div>
                    </div>





                    @if ($admins->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Reviews has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover">
                            <thead class=" border-success">
                                <tr>
                                    <th  style="font-size: 1.3rem">စဉ်</th>
                                    <th style="font-size: 1.3rem">အမည်</th>
                                    <th style="font-size: 1.3rem">Email</th>


                                     <th style="font-size: 1.3rem">ရပ်နားစာရင်းထည့်ထားသည်</th>
                                    <th style="font-size: 1.3rem">စာရင်းပြန်ထည့်မည်</th>



                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($admins->currentPage() - 1) * $admins->perPage();
                                @endphp
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>

                                        <td  style="font-size: 1.1rem">
                                            {{ $admin->name }}
                                        </td>

                                        <td style="font-size: 1.1rem">{{ $admin->email }}</td>

                                        <td style="font-size: 1.1rem">ရပ်နားထားသည်</td>
                                        <td style="font-size: 1.1rem"><a href="{{route('no.stop.mail',$admin->id)}}"><i class="fas fa-plus" style="color: white;font-size:1.5rem"></i></a></td>





                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $admins->links() }}
                            </div>

            </div>
            @endif
        @endsection

