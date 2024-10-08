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
                            <div class="row" >
                                <div class="col-11">
                                    <div class="d-flex jusitfy-content-center gap-3">
                                        <div class="col-12 ">
                                            <form
                                                class="d-none  d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">

                                            </form>

                                            <a href="{{route('notice.add')}}" class="btn wbtn text-white" type="submit">
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





                    @if ($notices->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Reviews has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover" >
                            <thead class=" border-success">
                                <tr>
                                    <th  style="font-size: 1.3rem">စဉ်</th>

                                    <th style="font-size: 1.3rem">အသိပေးစာ</th>
                                    <th style="font-size: 1.3rem">Image</th>
                                    <th style="font-size: 1.3rem">Edit</th>
                                    <th style="font-size: 1.3rem">Trash</th>

                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($notices->currentPage() - 1) * $notices->perPage();
                                @endphp
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>{{ $offset + $loop->iteration }}</td>

                                        <td >
                                            {{ $notice->text }}
                                        </td>


                                        <td class="text-white">
                                            @if (file_exists(public_path('storage/images/'. $notice->image)))
                                            <img src="{{asset('storage/images/'.$notice->image)}}" style="height: 30px;width:30px" class="rounded-circle">
                                            @else
                                                <p>Image not found</p>
                                            @endif
                                        </td>
                                        <th><a href="{{route('notice.edit',$notice->id)}}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></a></i></th>
                                    <th><a href="{{route('notice.delete',$notice->id)}}" onclick="return confirm('ဖြတ်ရန်သေချာလား?');"><i class="fas fa-trash-alt" style="color: red"></i></a></th>




                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $notices->links() }}
                            </div>

            </div>
            @endif
        @endsection

