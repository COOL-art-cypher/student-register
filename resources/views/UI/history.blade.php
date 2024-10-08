@extends('UI.master')
@section('content')
<div style="height: 50px"></div>

<div class="container my-1 d-flex justify-content-center">
    <div class="col-12 text-end">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm mb-2">Back</a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
          @if(is_null($regs))
              <h1 class="text-white text-center">သင်အပ်ခဲ့သော  အချက်လက်များ မရှိပါ</h1>
          @else
             <div class="text-white">သင်အပ်ခဲ့သော အချက်လက်များ</div>
              <table class="custom-table border-success table-hover">
                  <thead class="border-success">
                      <tr>
                          <th class="text-white">စဉ်</th>
                          <th class="text-white">အမည်</th>
                          <th class="text-white">သင်တန်းနှစ်</th>
                          <th class="text-white">အထူးပြုဘာသာ</th>
                          <th class="text-white">ခုံနံပါတ်</th>
                          <th class="text-white">ဖုန်းနံပါတ်</th>
                          <th class="text-white">View</th>
                          <th class="text-white">အခြေအနေ</th>
                          <th class="text-white">Manage</th>
                      </tr>
                  </thead>
                  <tbody class="border-success">
                      @php
                          $offset = ($regs->currentPage() - 1) * $regs->perPage();
                      @endphp
                      @foreach ($regs as $reg)
                          <tr>
                              <td class="text-white">{{ $offset + $loop->iteration }}</td>
                              <td class="text-white">{{ $reg->user->name }}</td>
                              <td class="text-white">{{ $reg->academicYear ? $reg->academicYear->name : 'N/A' }}</td>
                              <td class="text-white">{{ $reg->specialist }}</td>
                              <td class="text-white">@if($reg->specialist==="computer_science") CS-{{ $reg->roll_no }}
                                                     @elseif ($reg->specialist==="computer_technology") CT-{{ $reg->roll_no }}
                                                     @else CST-{{ $reg->roll_no }}
                                                     @endif  </td>
                              <td class="text-white">{{ $reg->student_phone }}</td>
                              <td class="text-white"><a href="{{route('ui.view.reg.detail',$reg->id)}}"><i class="fas fa-eye"></i></a></td>
                              <td class="text-white">@if($reg->status==="pending")
                                                     ကျောင်းအပ်လက်ခံရန်စောင့်ဆိုင်းနေသည်
                                                    @elseif ($reg->status==="confirm")
                                                    လက်ခံထားသည်</td>
                                                     @else
                                                     ပြန်ပြင်ခိုင်းထားသည်
                                                     @endif
                              <td class="text-white">
                                <a href="{{route('ui.reg.delete',$reg->id)}}" onclick="return confirm('ဖြတ်ရန်သေချာလား?');"><i class="fas fa-trash-alt" style="color: red"></i></a>
                                @if($reg->status==="edit")
                                <a href="{{route('ui.reg.edit',$reg->id)}}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></i></a>
                                @endif
                            </td>
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
@endsection
