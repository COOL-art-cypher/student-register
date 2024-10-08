@extends('admin.master')
@section('content')

<div class="col-12">
    <div class="" style="height:400px;padding:20px">
        <div class="mt-3 mb-2 text-center">
            <img src="{{ asset('user/images/logo.png') }}" style="height: 70px; width: 70px;">
            <span class="pcolor  fw-bold  mb-5" style="font-size: 1.8rem; font-weight: bold;">
                ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ
            </span>
        </div>

        <div class="row">
            <div class="col-6" style="height:200px" >
                <div class="card shadow-2xl p-3 text-center" >
                    <div >
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem"  >ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ</p>
                        <p class="pcolor  fw-bold  mb-3" style="font-size: 1.3rem">သတိပေးစာများ</p>
                        <p style="font-size: 3rem" class="pcolor  fw-bold  mb-3" ><a href="{{route('notice.list')}}" style="text-decoration: none">{{count($notices)}}</a></p>
                    </div>

                </div>
            </div>
            <div class="col-6" style="height:200px" >
                <div class="card shadow-2xl p-3 text-center" >
                    <div >
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ</p>
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">ကျောင်းအပ်သူများ</p>
                        <p style="font-size: 3rem" class="pcolor  fw-bold  mb-3" ><a href="{{route('admin.stu.reg.list')}}" style="text-decoration: none">{{count($regs)}}</a></p>
                    </div>

                </div>
            </div>

            <div class="col-6" style="height:200px" >
                <div class="card shadow-2xl p-3 text-center" >
                    <div >
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ</p>
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">ကျောင်းသားသုံးMail</p>
                        <p style="font-size: 3rem" class="pcolor  fw-bold  mb-3" ><a href="{{route('admin.list')}}" style="text-decoration: none">{{count($mails)}}</a></p>
                    </div>

                </div>
            </div>
            <div class="col-6" style="height:200px" >
                <div class="card shadow-2xl p-3 text-center" >
                    <div >
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ</p>
                        <p class="pcolor  fw-bold  mb-3"  style="font-size: 1.3rem">သင်တန်းနှစ်</p>
                        <p style="font-size: 3rem" class="pcolor  fw-bold  mb-3" ><a href="{{route('admin.acedimcList')}}" style="text-decoration: none">{{count($years)}}</a></p>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
