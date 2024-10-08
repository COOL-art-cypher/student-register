@extends('admin.master')

@section('page_title', 'Graging')

@section('content')




<div class="container">
    <div class="row">
      <div class="row">
        <div class="col-1"><a href="{{ route('user.get.gradingList') }}" class="btn wbtn text-white "><i class="fa-duotone fa-solid fa-backward"></i></a>
            </div>
            <div class="col-10"></div>
        
        <div class="col-1"><a href="{{ route('downloadworld',  [$first['student']->id]) }}" class="btn wbtn text-white "><i class="fa-sharp fa-solid fa-file-export"></i></a> </div>


      </div>

    <div class="col-10">
    <div class="row">
        <div class="col-2"><div class="sidebar-brand-icon">
            <img src="{{ asset('user/images/logo.png') }}" class="mt-5" style="height: 120px;width:120px">
        </div>
        </div>
        <div class="col-8" >
            <div class="text-center">
            <h4>The Republic Of The Union of Myanmar</h4>
            </div>
            <div class="text-center"><h4>Ministry of Science and Techonlogy</h4></div>
            <div class="text-center"><h4>Department of Advanced Science and Techonlogy</h4></div>
            <div class="text-center"><h4>University of Computer Studies (Hinthada)</h4></div>
        </div>
        <div class="col-2">

        </div>

    </div><br><br>
    <div class="row">
        <div class="col-6">
            <h6>Address: No.28, Kayin Kyaung Street,Tar Ngar Se(South) Quarter,
            Hinthada,Ayeyarwady Region,Myanmar</h6>
        </div>
        <div class="col-2"></div>
        <div class="col"><h6>Phone: 95-09-783543903</h6></div>

    </div>
    <div class="row">
        <div class="col"><h6>Post Code:100601</h6></div>
        <div class="col"></div>
        <div class="col"><h6>Email:<a href="">studentaffair@ucsh.edu.mm</a></h6></div>
    </div>

    <div class="row">
        <div class="col">
          <h6>Name:{{ $first['student']->name }}</h6>
        </div>
        <div class="col">

        </div>
        <div class="col">
          <h6>Roll No:{{ $first['student']->roll_number }}</h6>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h6>Year: First Year(2022-2023)Academic Year</h6>
        </div>
        <div class="col">

        </div>
        <div class="col">
          <h6>Degree Programme: B.C.Sc./B.C.Tech</h6>
        </div>
      </div>



    <div class="row">


      <div class="col-1">
      </div>
      <div class="col-10">

<table class="table">
    <thead>
        <tr class="text-center">
            <th colspan="6">First Semester(GPA Sheet)</th>
        </tr>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Subject</th>
            <th scope="col">Credit Unit</th>
            <th scope="col">Grade</th>
            <th scope="col">Grade score</th>
            <th scope="col">Grade Point</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Myanmar</td>
        <td>3</td>
        <td>{{ $first['myanmar']->grade ?? '-' }}</td>
        <td>{{ $first['myanmar']->grade_score ?? '-' }}</td>
        <td>{{ $first['myanmar']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>English</td>
        <td>3</td>
        <td>{{ $first['english']->grade ?? '-' }}</td>
        <td>{{ $first['english']->grade_score ?? '-' }}</td>
        <td>{{ $first['english']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Physics</td>
        <td>3</td>
        <td>{{ $first['physics']->grade ?? '-' }}</td>
        <td>{{ $first['physics']->grade_score ?? '-' }}</td>
        <td>{{ $first['physics']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Princle of information Technology</td>
        <td>3</td>
        <td>{{ $first['PIT']->grade ?? '-' }}</td>
        <td>{{ $first['PIT']->grade_score ?? '-' }}</td>
        <td>{{ $first['PIT']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Caculus I</td>
        <td>3</td>
        <td>{{ $first['math']->grade ?? '-' }}</td>
        <td>{{ $first['math']->grade_score ?? '-' }}</td>
        <td>{{ $first['math']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Microsoft Office 365</td>
        <td>3</td>
        <td>{{ $first['microsoft']->grade ?? '-' }}</td>
        <td>{{ $first['microsoft']->grade_score ?? '-' }}</td>
        <td>{{ $first['microsoft']->grade_point ?? '-' }}</td>
      </tr>
      <tr>

        <th colspan="2">Total Credit Unit</th>
        <td>18</td>
        <th colspan="2">Total Grade Point</th>
        <td>{{ $first['grading']->total_GP ?? '-'  }}</td>

      </tr>
      <tr>
        <td colspan="3"></td>
        <th colspan="2">Cumulative GPA For each Semester</th>
        <td id="fir-gpa">{{ $first['grading']->GPA ?? '-'  }}</td>
      </tr>
    </tbody>
  </table>


  <table class="table">
    <thead>
        <tr class="text-center">
            <th colspan="6">Second Semester(GPA Sheet)</th>
        </tr>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Subject</th>
            <th scope="col">Credit Unit</th>
            <th scope="col">Grade</th>
            <th scope="col">Grade score</th>
            <th scope="col">Grade Point</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Myanmar</td>
        <td>3</td>
        <td>{{ $second['myanmar']->grade ?? '-' }}</td>
        <td>{{ $second['myanmar']->grade_score ?? '-' }}</td>
        <td>{{ $second['myanmar']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>English</td>
        <td>3</td>
        <td>{{ $second['english']->grade ?? '-' }}</td>
        <td>{{ $second['english']->grade_score ?? '-' }}</td>
        <td>{{ $second['english']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Physics</td>
        <td>3</td>
        <td>{{ $second['physics']->grade ?? '-' }}</td>
        <td>{{ $second['physics']->grade_score ?? '-' }}</td>
        <td>{{ $second['physics']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Programming Login and Design</td>
        <td>3</td>
        <td>{{ $second['PIT']->grade ?? '-' }}</td>
        <td>{{ $second['PIT']->grade_score ?? '-' }}</td>
        <td>{{ $second['PIT']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Caculus I</td>
        <td>3</td>
        <td>{{ $second['math']->grade ?? '-' }}</td>
        <td>{{ $second['math']->grade_score ?? '-' }}</td>
        <td>{{ $second['math']->grade_point ?? '-' }}</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Microsoft Office 365</td>
        <td>3</td>
        <td>{{ $second['microsoft']->grade ?? '-' }}</td>
        <td>{{ $second['microsoft']->grade_score ?? '-' }}</td>
        <td>{{ $second['microsoft']->grade_point ?? '-' }}</td>
      </tr>
      <tr>

        <th colspan="2">Total Credit Unit</th>
        <td>18</td>
        <th colspan="2">Total Grade Point</th>
        <td>{{ $second['grading']->total_GP ?? '-'  }}</td>

      </tr>
      <tr>
        <td colspan="3"></td>
        <th colspan="2">Cumulative GPA For each Semester</th>
        <td id="sec-gpa">{{ $second['grading']->GPA ?? '-'  }}</td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <th colspan="2">Over All GPA</th>
        <td id="over-all"> - </td>
      </tr>
    </tbody>
  </table>


    </div>
    <div class="col-1">
    </div>
    </div>

    </div>

    <div class="col-2"></div>
    </div>


</div>
@endsection

@push('scripts')
    <script>
      $(document).ready(function() {
        let firstGpa = $('#fir-gpa').text();
        let secondGpa = $('#sec-gpa').text();

        if(firstGpa != '-' && secondGpa != '-') {
          let res = (parseFloat(firstGpa) + parseFloat(secondGpa)) / 2;
          $('#over-all').text(res.toFixed(3));
        }
      })
    </script>
@endpush
