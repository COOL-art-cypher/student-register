$(document).ready(function () {
    let total_gp = 0;

    function checkGetGradetype(type, grade, grade_score) {
        if(type == 'grade') {
            return grade;
        } else if(type == 'grade_score') {
            return grade_score;
        }
    }

    function getGrading(value, type) {
        if (value <= 39) {
            return checkGetGradetype(type, 'F', 0);
        } else if (value > 39 && value <= 49) {
            return checkGetGradetype(type, 'D', 1);
        } else if (value > 49 && value <= 54) {
            return checkGetGradetype(type, 'C', 2);
        } else if (value > 54 && value <= 59) {
            return checkGetGradetype(type, 'C+', 2.33);
        } else if (value > 59 && value <= 64) {
            return checkGetGradetype(type, 'B-', 2.67);
        } else if (value > 64 && value <= 69) {
            return checkGetGradetype(type, 'B', 3);
        } else if (value > 69 && value <= 74) {
            return checkGetGradetype(type, 'B+', 3.33);
        } else if (value > 74 && value <= 79) {
            return checkGetGradetype(type, 'A-', 3.67);
        } else if (value > 79 && value <= 89) {
            return checkGetGradetype(type, 'A', 3.8);
        } else if (value > 89 && value <= 100) {
            return checkGetGradetype(type, 'A+', 4);
        }
    }

    function calculateSixtyPercent(value) {
        if(value != '' && ! isNaN(parseInt(value)) && value < 100) {
            return ((parseInt(value) * 60) / 100);
        } else {
            return false;
        }
    }

    function checkFloatOrInt(value) {
        if(value % 1 == 0) {
            return true;
        }

        return false;
    }

    function calculations(selector) {
        $(document).on('keyup', `#${selector}_exam_mark`, function () {
            $(`#${selector}_exam_percent_mark`).val('')

            if($(this).val() == '') {
                $(`#${selector}_total_score`).val('');
                $(`#${selector}_grade`).val('');
                $(`#${selector}_grade_score`).val('');
                $(`#${selector}_grade_point`).val('');
            }

            if(calculateSixtyPercent($(this).val())) {
                $(`#${selector}_exam_percent_mark`).val(calculateSixtyPercent($(this).val()))
                $(`#${selector}_exam_mark_error`).html('')
            } else {
                $(`#${selector}_exam_mark_error`).html('Please enter valid mark.')
            }

            if($(`#${selector}_practical_mark`).val() != '' && $(this).val() != '') {
                if($(`#${selector}_exam_mark`).val() != '' && $(this).val() != '') {
                    console.log(checkFloatOrInt($(`#${selector}_exam_percent_mark`).val()));
                    if(checkFloatOrInt($(`#${selector}_exam_percent_mark`).val())) {
                        $(`#${selector}_total_score`).val(parseInt($(`#${selector}_practical_mark`).val()) + parseInt($(`#${selector}_exam_percent_mark`).val()));

                        $(`#${selector}_grade`).val(getGrading($(`#${selector}_total_score`).val(), 'grade'))

                        $(`#${selector}_grade_score`).val(getGrading($(`#${selector}_total_score`).val(), 'grade_score'))

                        $(`#${selector}_grade_point`).val((getGrading($(`#${selector}_total_score`).val(), 'grade_score') * 3).toFixed(2))
                    } else {
                        $(`#${selector}_total_score`).val(parseInt($(`#${selector}_practical_mark`).val()) + parseInt(Math.trunc($(`#${selector}_exam_percent_mark`).val())) + 1);

                        $(`#${selector}_grade`).val(getGrading($(`#${selector}_total_score`).val(), 'grade'))

                        $(`#${selector}_grade_score`).val(getGrading($(`#${selector}_total_score`).val(), 'grade_score'))

                        $(`#${selector}_grade_point`).val((getGrading($(`#${selector}_total_score`).val(), 'grade_score') * 3).toFixed(2))
                    }
                }
            }
        });

        $(document).on('keyup', `#${selector}_practical_mark`, function () {
            if($(this).val() == '') {
                $(`#${selector}_total_score`).val('');
                $(`#${selector}_grade`).val('');
                $(`#${selector}_grade_score`).val('');
                $(`#${selector}_grade_point`).val('');
            }

            if($(`#${selector}_exam_mark`).val() != '' && $(this).val() != '') {
                if(checkFloatOrInt($(`#${selector}_exam_percent_mark`).val())) {
                    $(`#${selector}_total_score`).val(parseInt($(`#${selector}_practical_mark`).val()) + parseInt($(`#${selector}_exam_percent_mark`).val()));

                    $(`#${selector}_grade`).val(getGrading($(`#${selector}_total_score`).val(), 'grade'))

                    $(`#${selector}_grade_score`).val(getGrading($(`#${selector}_total_score`).val(), 'grade_score'))

                    $(`#${selector}_grade_point`).val((getGrading($(`#${selector}_total_score`).val(), 'grade_score') * 3).toFixed(2))
                } else {
                    $(`#${selector}_total_score`).val(parseInt($(`#${selector}_practical_mark`).val()) + parseInt(Math.trunc($(`#${selector}_exam_percent_mark`).val())) + 1);

                    $(`#${selector}_grade`).val(getGrading($(`#${selector}_total_score`).val(), 'grade'))

                    $(`#${selector}_grade_score`).val(getGrading($(`#${selector}_total_score`).val(), 'grade_score'))

                    $(`#${selector}_grade_point`).val((getGrading($(`#${selector}_total_score`).val(), 'grade_score') * 3).toFixed(2))
                }
            }
        });
    }

    calculations('myan');
    calculations('eng');
    calculations('phy');
    calculations('pit');
    calculations('math');
    calculations('ms');

    setInterval(function () {
        total_gp = 0;
        let grade_point_inputs = $('.grade_point');
        let check = true;

        grade_point_inputs.each(function () {
            if($(this).val() == '') {
                check = false;
            }
            total_gp = total_gp + Number($(this).val());
        });

        console.log(total_gp);

        if(check) {
            $('#total-gp').val(total_gp.toFixed(2));
            $('#gpa').val((total_gp / 18).toFixed(2));
            $('.submit').removeAttr('disabled')

            total_gp = 0;
        } else {
            $('#total-gp').val('');
            $('#gpa').val('');
            $('.submit').attr('disabled', 'disabled');
        }
    }, 2000);

    $('#calculation-form').on('submit', function (e) {
        e.preventDefault();

        let disabledFields = $('form :disabled');

        disabledFields.each(function() {
            $(this).prop('disabled', false);
        });

        $(this).off('submit').submit();
    })
});
