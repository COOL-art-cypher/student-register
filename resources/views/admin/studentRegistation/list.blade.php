@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(100px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-10">
                            <div class="d-flex justify-content-center gap-3">
                                <div class="col-12">
                                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('admin.stu.reg.list') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="student_name"
                                                    class="form-control border-success small" placeholder="Student Name"
                                                    value="{{ request('student_name') }}">
                                            <div class="input-group">
                                                <select name="academic_year_id" class="form-control border-success">
                                                    <option value="">Select Academic Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}" {{ request('academic_year_id') == $year->id ? 'selected' : '' }}>
                                                            {{ $year->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                              <div class="input-group mb-2">
                                                <select name="specialist" class="form-control border-success">
                                                    <option value="">Select Specialist</option>
                                                    <option value="computer_science"
                                                        {{ request('specialist') == 'computer_science' ? 'selected' : '' }}>
                                                        Computer Science</option>
                                                    <option value="computer_technology"
                                                        {{ request('specialist') == 'computer_technology' ? 'selected' : '' }}>
                                                        Computer Technology</option>
                                                    <option value="CST"
                                                        {{ request('specialist') == 'CST' ? 'selected' : '' }}>CST</option>
                                                </select>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn wbtn" type="submit">
                                                    <i class="fas fa-search fa-sm text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('admin.stu.reg.form') }}" class="btn wbtn text-white"><i class="fa fa-plus"></i></a>
                             {{--  <a href="{{ route('admin.stu.reg.form') }}" class="btn wbtn text-white"><i class="fa fa-plus"></i></a>  --}}
                            <a href="{{ route('admin.stu.reg.export', [
                                'search' => request('search'),
                                'academic_year_id' => request('academic_year_id'),
                                'specialist' => request('specialist')
                            ]) }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                        </div>
                    </div>
                </div>
                @if ($regs->isEmpty())
                    <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Registration has found ! </p>
                @else
                    <table class="custom-table border-success table-hover">
                        <thead class="border-success">
                            <tr>
                                <th style="font-size: 1.1rem">စဉ်</th>
                                <th style="font-size: 1.1rem">ကျောင်းသားအမည်</th>
                                <th style="font-size: 1.1rem">သင်တန်းနှစ်</th>

                                <th style="font-size: 1.1rem">ခုံနံပါတ်</th>
                                <th style="font-size: 1.1rem"> ဖုန်းနံပါတ်</th>

                                <th style="font-size: 1.1rem">အခြေအနေ</th>
                                <th style="font-size: 1.1rem">View</th>
                                <th style="font-size: 1.1rem">GiveEdit</th>
                                <th style="font-size: 1.1rem">Accept</th>
                                <th style="font-size: 1.1rem">Edit</th>
                                <th style="font-size: 1.1rem">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="border-success">
                            @php
                                $offset = ($regs->currentPage() - 1) * $regs->perPage();
                            @endphp
                            @foreach ($regs as $reg)
                                <tr>
                                    <td  style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>
                                    <td style="font-size: 1.1rem">{{ $reg->user->name }}</td>
                                    <td style="font-size: 1.1rem">{{ $reg->academicYear ? $reg->academicYear->name : 'N/A' }}</td>

                                    <td style="font-size: 1.1rem">
                                        @if ($reg->specialist === "computer_science")
                                            CS-{{ $reg->roll_no }}
                                        @elseif ($reg->specialist === "computer_technology")
                                            CT-{{ $reg->roll_no }}
                                        @else
                                            CST-{{ $reg->roll_no }}
                                        @endif
                                    </td>
                                    <td style="font-size: 1.1rem">{{ $reg->student_phone }}</td>

                                    <td style="font-size: 1.1rem">
                                        @if ($reg->status === "pending")
                                            <p style="font-size: 1.1rem"> စောင့်ဆိုင်းနေသည်</p>
                                        @elseif ($reg->status === "confirm")
                                            <p style="font-size: 1.1rem"> ကျောင်းအပ်လက်ခံထားသည်</p>
                                        @else
                                            <p style="font-size: 1.1rem"> ပြန်ပြင်ခိုင်းထားသည်</p>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.stu.reg.detail', $reg->id) }}"><i class="fas fa-eye" style="color:azure"></i></a></td>
                                    <td><a href="{{ route('admin.stu.give.edit', $reg->id) }}"><i class="fas fa-key" style="color:azure"></i></a></td>
                                    <td><a href="{{ route('admin.stu.accept', $reg->id) }}"><i class="fas fa-check" style="color:azure"></i></a></td>
                                    <td><a href="{{ route('admin.stu.reg.edit', $reg->id) }}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></i></a></td>
                                    <td><a href="{{ route('admin.stu.reg.delete', $reg->id) }}" onclick="return confirm('ဖြတ်ရန်သေချာလား?');"><i class="fas fa-trash-alt" style="color: red"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-2">
                        <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                            {{ $regs->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
