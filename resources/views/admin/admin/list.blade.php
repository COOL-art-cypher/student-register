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
                                            <a href="{{route('admin.list')}}" class="btn wbtn text-white" type="submit">
                                                All
                                            </a>
                                            <a href="{{route('add.admin')}}" class="btn wbtn text-white" type="submit">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                        </div>


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
                                    <th style="font-size: 1.3rem">စဉ်</th>
                                    <th style="font-size: 1.3rem">အမည်</th>
                                    <th style="font-size: 1.3rem">Email</th>


                                    <th style="font-size: 1.3rem">ရပ်နားစရင်းထည့်မည်</th>
                                    <th style="font-size: 1.3rem">Edit</th>
                                    <th style="font-size: 1.3rem">Trash</th>

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
                                           
                                        <td style="font-size: 1.1rem"><a href="{{route('stop.mail',$admin->id)}}" onclick="return confirm('သေချာလား?');" ><i class="fas fa-ban" style="color: red"></i></a></td>
                                        <th><a href="{{route('admin.info.edit',$admin->id)}}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></a></i></th>
                                    <th><a href="{{route('admin.delete',$admin->id)}}" onclick="return confirm('ဖြတ်ရန်သေချာလား?');"><i class="fas fa-trash-alt" style="color: red"></i></a></th>




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

