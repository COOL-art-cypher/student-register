@extends('admin.master')

@section('page_title', 'Create Student Marking')

@push('styles')
    <style>
        .border-dashed {
            border-style: dashed !important;
        }
    </style>
@endpush

@section('content')
    <div class="h-100 px-5 py-5 row">
        <div class="text-center">
            <h2 class="mb-4">Student Grading System</h2>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.store.calculation') }}" class="row" method="POST" id="calculation-form">
            @csrf
            <div class="form-group mb-4" id="name-div">
                <label for="name" class="">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control shadow-none border-0 border-bottom border-info border-dashed rounded-0" required   >
            </div>

            <div class="form-group mb-4">
                <label for="semester" class="">Semester <span class="text-danger">*</span></label>
                <select id="semester" name="semester" class="form-select" aria-label="Default select example">
                    <option value="1">First Semester</option>
                    <option value="2">Second Semester</option>
                </select>
            </div>

            <div class="form-group mb-5">
                <label for="roll-number" class="">Roll Number <span class="text-danger">*</span></label>
                <input type="text" name="roll_number" id="roll-number" class="form-control shadow-none border-0 border-bottom border-info border-dashed rounded-0" required >
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">Myanmar (M-1101)</h6>
                        <h6 class="second-title" style="display: none;">Myanmar (M-1201)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" name="marks[myanmar][exam_mark]" id="myan_exam_mark" required>
                                    <span class="text-danger mt-1" id="myan_exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="myan_exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" name="marks[myanmar][sixty_percent]" id="myan_exam_percent_mark" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="myan_practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" name="marks[myanmar][assignment_mark]" id="myan_practical_mark" required>
                                    <span class="text-danger mt-1" id="myan_practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="myan_total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="myan_total_score" name="marks[myanmar][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="myan_grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" name="marks[myanmar][grade]" id="myan_grade" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" name="marks[myanmar][grade_score]" id="myan_grade_score" disabled readonly>
                                    <span class="text-danger mt-1" id="grade_score_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="myan_grade_point" name="marks[myanmar][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">English (E-1101)</h6>
                        <h6 class="second-title" style="display: none;">English (E-1201)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" name="marks[english][exam_mark]" id="eng_exam_mark" required>
                                    <span class="text-danger mt-1" id="exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" id="eng_exam_percent_mark" name="marks[english][sixty_percent]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" id="eng_practical_mark" name="marks[english][assignment_mark]" required>
                                    <span class="text-danger mt-1" id="practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="eng_total_score" name="marks[english][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" id="eng_grade" name="marks[english][grade]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" id="eng_grade_score" name="marks[english][grade_score]" disabled readonly>
                                    <span class="text-danger mt-1" id="grade_score_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="eng_grade_point" name="marks[english][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">Physics (P-1101)</h6>
                        <h6 class="second-title" style="display: none;">Physics (P-1201)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" name="marks[physics][exam_mark]" id="phy_exam_mark" required>
                                    <span class="text-danger mt-1" id="exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" id="phy_exam_percent_mark" name="marks[physics][sixty_percent]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" id="phy_practical_mark" name="marks[physics][assignment_mark]" required>
                                    <span class="text-danger mt-1" id="practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="phy_total_score" name="marks[physics][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" id="phy_grade" name="marks[physics][grade]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" id="phy_grade_score" name="marks[physics][grade_score]" disabled readonly>
                                    <span class="text-danger mt-1" id="grade_score_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="phy_grade_point" name="marks[physics][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">Principle of Information Technology (CST-1111)</h6>
                        <h6 class="second-title" style="display: none;">Programming Logic and Design (CST-1211)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" id="pit_exam_mark" name="marks[PIT][exam_mark]" required>
                                    <span class="text-danger mt-1" id="exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" id="pit_exam_percent_mark" name="marks[PIT][sixty_percent]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" id="pit_practical_mark" name="marks[PIT][assignment_mark]" required>
                                    <span class="text-danger mt-1" id="practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="pit_total_score" name="marks[PIT][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" id="pit_grade" name="marks[PIT][grade]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" id="pit_grade_score" name="marks[PIT][grade_score]" disabled readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="pit_grade_point" name="marks[PIT][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">Mathematics of Computing (CST-1142)</h6>
                        <h6 class="second-title" style="display: none;">Mathematics of Computing (CST-1242)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" id="math_exam_mark" name="marks[math][exam_mark]" required>
                                    <span class="text-danger mt-1" id="exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" id="math_exam_percent_mark" name="marks[math][sixty_percent]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" id="math_practical_mark" name="marks[math][assignment_mark]" required>
                                    <span class="text-danger mt-1" id="practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="math_total_score" name="marks[math][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" id="math_grade" name="marks[math][grade]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" id="math_grade_score" name="marks[math][grade_score]" disabled readonly>
                                    <span class="text-danger mt-1" id="grade_score_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="math_grade_point" name="marks[math][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="first-title">Microsoft Office (SS-1101)</h6>
                        <h6 class="second-title" style="display: none;">Microsoft Office (SS-1201)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exam_mark" class="form-label">Mark (Exam)</label>
                                    <input type="text" class="form-control form-value shadow-none" id="ms_exam_mark" name="marks[MS][exam_mark]" required>
                                    <span class="text-danger mt-1" id="exam_mark_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exam_percent_mark" class="form-label"> 60% </label>
                                    <input type="text" class="form-control form-value" id="ms_exam_percent_mark" name="marks[MS][sixty_percent]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="practical_mark" class="form-label">Assessment</label>
                                    <input type="text" class="form-control form-value shadow-none" id="ms_practical_mark" name="marks[MS][assignment_mark]" required>
                                    <span class="text-danger mt-1" id="practical_mark_error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="total_score" class="form-label"> Total Score</label>
                                    <input type="text" class="form-control" id="ms_total_score" name="marks[MS][total_score]" disabled readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control form-value" id="ms_grade" name="marks[MS][grade]" disabled readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="grade_score" class="form-label">Grade Score</label>
                                    <input type="number" max="3" class="form-control shadow-none" id="ms_grade_score" name="marks[MS][grade_score]" disabled readonly>
                                    <span class="text-danger mt-1" id="grade_score_error"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="grade_point" class="form-label"> Grade Point</label>
                                    <input type="text" class="form-control grade_point" id="ms_grade_point" name="marks[MS][grade_point]" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="total-gp" class="form-label">Total GP</label>
                <input type="text" name="total_gp" id="total-gp" class="form-control shadow-none" disabled>
            </div>

            <div class="form-group mb-4">
                <label for="gpa" class="form-label">GPA</label>
                <input type="text" name="gpa" id="gpa" class="form-control shadow-none" disabled>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary submit" disabled>Submit</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#semester').on('change', function() {
            console.log($(this).val() == 2);
            if($(this).val() == 2) {
                {{--  $('.second-title').show()
                $('.first-title').hide()  --}}
                $('#name-div').hide().find('input').val('abcd')
            } else {
                {{--  $('.second-title').hide()
                $('.first-title').show()  --}}
                $('#name-div').show().find('input').val('')
            }
        })
    </script>
@endpush
