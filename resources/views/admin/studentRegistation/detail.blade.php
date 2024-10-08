@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0 ">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
            style="height: 1200px; filter: blur(70px); object-fit: cover;">
        <div class="card-img-overlay">

            <div class="container my-1 d-flex justify-content-center">

                <div class="col-12 text-end">
                    <a href="{{route('admin.stu.reg.list')}}" class="btn wbtn btn-sm mb-2 text-white">Back</a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 mb-4">
                    <div class="border border-primary pt-3 mt-3 rounded shadow"
                         style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); background-color: rgb(250, 250, 250); height: 500px; overflow-y: auto;">
                        <!-- Added scrollable container with height 600px and overflow-y: auto; -->

                        <ul class="list-group list-group-flush p-3">
                            <div class="mb-3 text-center">
                                @if ($student->student_image)
                                    <a href="{{ route('image.show', ['name' => $student->student_image]) }}">
                                        <img src="{{ asset('storage/images/'.$student->student_image) }}"
                                             class="profileimg rounded-circle"
                                             style="width: 200px; height:200px; object-fit:cover">
                                    </a>
                                @else
                                    <p class="text-white"><b>No photo available !</b></p>
                                @endif
                            </div>

                            <!-- List items for student details -->
                            <li class="list-group-item bg-transparent "  style="font-size: 1.2rem"><b >ကျောင်းသားအမည် :</b>&nbsp;
                                {{ $student->user->name }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>သင်တန်းနှစ် :</b>&nbsp;
                                {{ $student->academicYear->name }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ကျောင်းအပ်ခ :</b>&nbsp;
                                {{ $student->academicYear->enrollment }} ကျပ်
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အထူးပြုဘာသာ :</b>&nbsp;
                                {{ $student->specialist }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ခုံနံပါတ် :</b>&nbsp;
                                @if($student->specialist==="computer_science") CS-{{ $student->roll_no }}
                                @elseif ($student->specialist==="computer_technology") CT-{{ $student->roll_no }}
                                @else CST-{{ $student->roll_no }}
                                @endif
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အဘအမည် :</b>&nbsp;
                                {{ $student->father_name}}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အဘ မှတ်ပုံတင် မိတ္တူအရှေ့ :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->father_nrc_photo]) }}"> <i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အဘ မှတ်ပုံတင် မိတ္တူအနောက် :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->father_nrc_back]) }}"> <i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အမိအမည် :</b>&nbsp;
                                {{ $student->mother_name}}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အမိမှတ်ပုံတင် မိတ္တူ အရှေ့:</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->mother_nrc_photo]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အမိမှတ်ပုံတင် မိတ္တူ  အနောက် :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->mother_nrc_back]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ကျောင်းသားမှတ်ပုံတင် မိတ္တူ အရှေ့:</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->student_nrc_photo]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ကျောင်းသားမှတ်ပုံတင် မိတ္တူ  အနောက် :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->student_nrc_back]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>အိမ်ထောင်စုစရင်း မိတ္တူ :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->family]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>နေရပ်လိပ်စာ :</b>&nbsp;
                                {{ $student->address }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>မိဘ ဖုန်းနံပါတ် :</b>&nbsp;
                                {{ $student->parent_phone }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ကျောင်းသားဖုန်းနံပါတ် :</b>&nbsp;
                                {{ $student->student_phone }}
                            </li>
                            <li class="list-group-item bg-transparent " style="font-size: 1.2rem"><b>ငွေလွဲပြေစာ :</b>&nbsp;
                                <a href="{{ route('image.show', ['name' => $student->payment_img]) }}"><i class="fas fa-eye"> </i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
