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

                                            <a href="{{route('admin.acedimc.add')}}" class="btn wbtn text-white" type="submit">
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





                    @if ($years->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Years has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover">
                            <thead class=" border-success">
                                <tr style="font-size: 1.3rem">
                                    <th  style="font-size: 1.3rem">စဉ်</th>
                                    <th  style="font-size: 1.3rem">နှစ်အမျိုးအမည်</th>
                                    <th   style="font-size: 1.3rem">ကျောင်းအပ်ခ</th>

                                    <th  style="font-size: 1.3rem" >Edit</th>
                                    <th  style="font-size: 1.3rem">Trash</th>

                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($years->currentPage() - 1) * $years->perPage();
                                @endphp
                                @foreach ($years as $year)
                                    <tr>
                                        <td style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>

                                        <td style="font-size: 1.1rem" >
                                            {{ $year->name }}
                                        </td>

                                        <td style="font-size: 1.1rem">{{ $year->enrollment }} ကျပ်</td>

                                        <th style="font-size: 1.1rem"><a href="{{route('admin.acedimic.edit',$year->id)}}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></a></i></th>
                                    <th style="font-size: 1.1rem"><a href="{{route('admin.acedimic.delete',$year->id)}}"  onclick="return confirm('ဖြတ်ရန်သေချာလား?');"><i class="fas fa-trash-alt" style="color: red"></i></a></th>




                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $years->links() }}
                            </div>

            </div>
            @endif

@endsection
