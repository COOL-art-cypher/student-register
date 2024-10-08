@extends('admin.master')

@section('page_title', 'Graging')

@section('content')
    <div class="my-4 text-center">
        <h2>GRADING CERTIFICATE CREATION SYSTEM</h2>
    </div>

    @if (session()->has('success'))
        <div class="mx-3 alert alert-success alert-dismissible fade show my-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('errors'))
        <div class="mx-3 alert alert-danger alert-dismissible fade show my-2" role="alert">
            {{ session('errors') }}
        </div>
    @endif

    <div class="mt-5 mb-3 row">
        <input type="text" class="form-control col-1 mx-5" id="basic-url" aria-describedby="basic-addon3" value="1CST - " disabled>
        <form action="{{ route('student.search') }}" class="col-8 row" method="POST">
            @csrf
            <input type="text" class="form-control col-4" name="id" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Roll Number" required>
            <button class="btn btn-primary mx-4 col-1">Search</button>
        </form>
        <div class="col-2">
        <a href="{{ route('user.get.gradingList') }}" class="btn btn-info ">Reset All</a>
        </div>
    </div>








    <div class=" max-3">
        <table class="table table-bordered width-100px height-100px table-responsive">
            <thead>
                <tr>
                    <th scope="col">အမည်</th>
                    <th scope="col">ခုံအမှက်</th>
                    <th scope="col">Myan</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">Eng</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">Phy</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">PIT</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">Math</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">MS</th>
                    <th scope="col">60%</th>
                    <th scope="col">Ass 40%</th>
                    <th scope="col">100%</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Score</th>
                    <th scope="col">Grade pint</th>
                    <th scope="col">Total Grade Point</th>
                    <th scope="col">GPA</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="">{{ $student->name }}</td>
                        <td>{{ $student->roll_number }}</td>
                        <td>{{ $student->MyanmarMark[0]->exam_mark }}</td>
                        <td>{{ $student->MyanmarMark[0]->sixty_percent }}</td>
                        <td>{{ $student->MyanmarMark[0]->assignment_mark }}</td>
                        <td>{{ $student->MyanmarMark[0]->total_score }}</td>
                        <td>{{ $student->MyanmarMark[0]->grade }}</td>
                        <td>{{ $student->MyanmarMark[0]->grade_score }}</td>
                        <td>{{ $student->MyanmarMark[0]->grade_point }}</td>
                        <td>{{ $student->EnglishMark[0]->exam_mark }}</td>
                        <td>{{ $student->EnglishMark[0]->sixty_percent }}</td>
                        <td>{{ $student->EnglishMark[0]->assignment_mark }}</td>
                        <td>{{ $student->EnglishMark[0]->total_score }}</td>
                        <td>{{ $student->EnglishMark[0]->grade }}</td>
                        <td>{{ $student->EnglishMark[0]->grade_score }}</td>
                        <td>{{ $student->EnglishMark[0]->grade_point }}</td>
                        <td>{{ $student->PhysicsMark[0]->exam_mark }}</td>
                        <td>{{ $student->PhysicsMark[0]->sixty_percent }}</td>
                        <td>{{ $student->PhysicsMark[0]->assignment_mark }}</td>
                        <td>{{ $student->PhysicsMark[0]->total_score }}</td>
                        <td>{{ $student->PhysicsMark[0]->grade }}</td>
                        <td>{{ $student->PhysicsMark[0]->grade_score }}</td>
                        <td>{{ $student->PhysicsMark[0]->grade_point }}</td>
                        <td>{{ $student->PITMark[0]->exam_mark }}</td>
                        <td>{{ $student->PITMark[0]->sixty_percent }}</td>
                        <td>{{ $student->PITMark[0]->assignment_mark }}</td>
                        <td>{{ $student->PITMark[0]->total_score }}</td>
                        <td>{{ $student->PITMark[0]->grade }}</td>
                        <td>{{ $student->PITMark[0]->grade_score }}</td>
                        <td>{{ $student->PITMark[0]->grade_point }}</td>
                        <td>{{ $student->MathematicMark[0]->exam_mark }}</td>
                        <td>{{ $student->MathematicMark[0]->sixty_percent }}</td>
                        <td>{{ $student->MathematicMark[0]->assignment_mark }}</td>
                        <td>{{ $student->MathematicMark[0]->total_score }}</td>
                        <td>{{ $student->MathematicMark[0]->grade }}</td>
                        <td>{{ $student->MathematicMark[0]->grade_score }}</td>
                        <td>{{ $student->MathematicMark[0]->grade_point }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->exam_mark }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->sixty_percent }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->assignment_mark }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->total_score }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->grade }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->grade_score }}</td>
                        <td>{{ $student->MicrosoftOfficeMark[0]->grade_point }}</td>
                        <td>{{ $student->Grading[0]->total_GP }}</td>
                        <td>{{ $student->Grading[0]->GPA }}</td>
                        <td>
                            <a href="{{ route('user.get.grading', $student->id) }}" class="btn btn-primary">Show</a>
                            <span class="btn btn-danger mt-2" id="delete-btn"> Delete</span>
                            <form action="{{ route('user.grade.delete', $student->id) }}" method="POST" id="delete-form">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

      {{ $students->links() }}


@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#delete-btn').on('click', function() {
            if(confirm('ဖြတ်ရန်သေချာပါသလား')) {
                $('#delete-form').submit();
            }
        })
    })
</script>
@endpush
