<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkingStoreRequest;

use App\Models\EnglishMark;
use App\Models\Grading;
use App\Models\MathematicMark;
use App\Models\MicrosoftOfficeMark;
use App\Models\MyanmarMark;
use App\Models\PhysicsMark;
use App\Models\PITMark;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class MarkCalculationController extends Controller
{
    public function index()
    {
        $roll_number = '1CST-33';
        $student = Student::where('roll_number', );
        return view('mark_calculation.index');
    }

    public function store(MarkingStoreRequest $request)
    {
        $attributes = $request->validated();

        DB::beginTransaction();

        try {
            $student = Student::firstOrCreate(
                ['roll_number' =>  $attributes['roll_number']],
                [
                    'name' => $attributes['name'],
                    'roll_number' => $attributes['roll_number'],
                    'semester' => $attributes['semester']
                ]
            );

            $marks = $attributes['marks'];

            foreach($marks as $key => $mark) {
                $marks[$key]['student_id'] = $student->id;
                $marks[$key]['semester'] = $attributes['semester'];
            }

            MyanmarMark::create($marks['myanmar']);
            EnglishMark::create($marks['english']);
            PhysicsMark::create($marks['physics']);
            PITMark::create($marks['PIT']);
            MathematicMark::create($marks['math']);
            MicrosoftOfficeMark::create($marks['MS']);

            Grading::create([
                'total_GP' => $attributes['total_gp'],
                'GPA' => $attributes['gpa'],
                'student_id' => $student->id,
                'semester' => $attributes['semester']
            ]);

            DB::commit();

            //return back()->with('success', 'Student marking successfully added.');

            return redirect()
                ->route('user.get.gradingList')
                ->with('success', 'Student grading successfully created.');


        } catch (Exception $e) {
            DB::rollBack();

            echo $e->getMessage();
        }
    }

    public function search(Request $request)
    {
        $student = Student::where('roll_number', '1CST-' . $request->id)->paginate(10);

        if($student) {
            return view('grading_list.index', [
                'students' => $student,
            ]);
        }
    }

    public function gradingLists()
    {
        $students = Student::paginate(10);

        return view('grading_list.index', [
            'students' => $students,
        ]);
    }

    public function getGrading(Student $student)
    {
        $data = [
            'first' => [
                'student' => $student,
                'myanmar' => $student->MyanmarMark->where('semester', 1)->first(),
                'grading' => $student->Grading->where('semester', 1)->first(),
                'english' => $student->EnglishMark->where('semester', 1)->first(),
                'math' => $student->MathematicMark->where('semester', 1)->first(),
                'physics' => $student->PhysicsMark->where('semester', 1)->first(),
                'PIT' => $student->PITMark->where('semester', 1)->first(),
                'microsoft' => $student->MicrosoftOfficeMark->where('semester', 1)->first(),
            ],
            'second' => [
                'student' => $student,
                'myanmar' => $student->MyanmarMark->where('semester', 2)->first(),
                'grading' => $student->Grading->where('semester', 2)->first(),
                'english' => $student->EnglishMark->where('semester', 2)->first(),
                'math' => $student->MathematicMark->where('semester', 2)->first(),
                'physics' => $student->PhysicsMark->where('semester', 2)->first(),
                'PIT' => $student->PITMark->where('semester', 2)->first(),
                'microsoft' => $student->MicrosoftOfficeMark->where('semester', 2)->first(),
            ]
        ];
        return view('grading_list.show', $data);
    }



    public function downloadMark(Student $student)
    {

    $data = [
        'first' => [
            'student' => $student,
            'myanmar' => $student->MyanmarMark->where('semester', 1)->first(),
            'grading' => $student->Grading->where('semester', 1)->first(),
            'english' => $student->EnglishMark->where('semester', 1)->first(),
            'math' => $student->MathematicMark->where('semester', 1)->first(),
            'physics' => $student->PhysicsMark->where('semester', 1)->first(),
            'PIT' => $student->PITMark->where('semester', 1)->first(),
            'microsoft' => $student->MicrosoftOfficeMark->where('semester', 1)->first(),
        ],
        'second' => [
            'student' => $student,
            'myanmar' => $student->MyanmarMark->where('semester', 2)->first(),
            'grading' => $student->Grading->where('semester', 2)->first(),
            'english' => $student->EnglishMark->where('semester', 2)->first(),
            'math' => $student->MathematicMark->where('semester', 2)->first(),
            'physics' => $student->PhysicsMark->where('semester', 2)->first(),
            'PIT' => $student->PITMark->where('semester', 2)->first(),
            'microsoft' => $student->MicrosoftOfficeMark->where('semester', 2)->first(),
        ]
    ];

    // dd();

    if(isset($data['first']['grading']->GPA) && isset($data['second']['grading']->GPA)) {
        $data['over_all'] = ($data['first']['grading']->GPA + $data['second']['grading']->GPA) / 2;
    } else {
        $data['over_all'] = '-';
    }

    try {
        $pdf = pdf::loadView('pdf.markdata', $data);
        $filename = 'grading_list_' . str_replace(' ', '_', $student->name) . '.pdf';
        return $pdf->download($filename);
    } catch (Exception $e) {
        return back()->withError('Error generating PDF: ' . $e->getMessage());
    }
}

    public function delete(Student $student)
    {
        DB::beginTransaction();

        try {
            foreach($student->MyanmarMark as $m) {
                $m->delete();
            }
            foreach($student->EnglishMark as $e) {
                $e->delete();
            }
            foreach($student->MathematicMark as $M) {
                $M->delete();
            }
            foreach($student->PhysicsMark as $p) {
                $p->delete();
            }
            foreach($student->PITMark as $P) {
                $P->delete();
            }
            foreach($student->MicrosoftOfficeMark as $o) {
                $o->delete();
            }
            foreach($student->Grading as $g) {
                $g->delete();
            }
            // $student->EnglishMark->delete();
            // $student->MathematicMark->delete();
            // $student->PhysicsMark->delete();
            // $student->PITMark->delete();
            // $student->MicrosoftOfficeMark->delete();
            // $student->Grading->delete();
            $student->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('errors', 'Something Worng' . $e->getMessage());
        }

        return back()->with('success', 'Successfully deleted.');
    }

    public function downloadMarkworld(Student $student)
    {
        $data = [
            'first' => [
                'student' => $student,
                'myanmar' => $student->MyanmarMark->where('semester', 1)->first(),
                'grading' => $student->Grading->where('semester', 1)->first(),
                'english' => $student->EnglishMark->where('semester', 1)->first(),
                'math' => $student->MathematicMark->where('semester', 1)->first(),
                'physics' => $student->PhysicsMark->where('semester', 1)->first(),
                'PIT' => $student->PITMark->where('semester', 1)->first(),
                'microsoft' => $student->MicrosoftOfficeMark->where('semester', 1)->first(),
            ],
            'second' => [
                'student' => $student,
                'myanmar' => $student->MyanmarMark->where('semester', 2)->first(),
                'grading' => $student->Grading->where('semester', 2)->first(),
                'english' => $student->EnglishMark->where('semester', 2)->first(),
                'math' => $student->MathematicMark->where('semester', 2)->first(),
                'physics' => $student->PhysicsMark->where('semester', 2)->first(),
                'PIT' => $student->PITMark->where('semester', 2)->first(),
                'microsoft' => $student->MicrosoftOfficeMark->where('semester', 2)->first(),
            ]
        ];

        if (isset($data['first']['grading']->GPA) && isset($data['second']['grading']->GPA)) {
            $data['over_all'] = ($data['first']['grading']->GPA + $data['second']['grading']->GPA) / 2;
        } else {
            $data['over_all'] = '-';
        }

        // Create a new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addImage(
            public_path('user/images/logo.png'),  // Path to the image file
            array(
                'width' => 80,
                'height' => 80,
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER
            )
        );

        // Add the content from the HTML to the Word file
        $section->addText(
            'The Republic of The Union of Myanmar',
            ['name' => 'Arial', 'size' => 12, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );
        $section->addText(
            'Ministry of Science and Technology',
            ['name' => 'Arial', 'size' => 12, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );
        $section->addText(
            'Department of Advanced Science and Technology',
            ['name' => 'Arial', 'size' => 12, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );
        $section->addText(
            'University of Computer Studies (Hinthada)',
            ['name' => 'Arial', 'size' => 12, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );


            $table = $section->addTable();
        $table->addRow();
        $table->addCell(12000)->addText('Address: No.28, Kayin Kyaung Street,Tar Ngar Se(South) Quarter,
            Hinthada,Ayeyarwady Region,Myanmar');
        $table->addCell(6000)->addText('Phone: 95-09-783543903');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(12000)->addText('Post Code:100601');
        $table->addCell(6000)->addText('Email:studentaffair@ucsh.edu.mm');
        $table->addRow();
        $table->addCell(12000)->addText("Name: {$data['first']['student']->name}");
        $table->addCell(6000)->addText("Roll No: {$data['first']['student']->roll_number}");
        $table->addRow();
        $table->addCell(12000)->addText("Year: First Year(2022-2023) Academic Year");
        $table->addCell(8000)->addText('Degree Programme: B.C.Sc./B.C.Tech');





        // First Semester Table
        $section->addText(
            'First Semester (GPA Sheet)',
            ['name' => 'Arial', 'size' => 10, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('NO');
        $table->addCell(4000)->addText('Subject');
        $table->addCell(2000)->addText('Credit Unit');
        $table->addCell(2000)->addText('Grade');
        $table->addCell(2000)->addText('Grade score');
        $table->addCell(2000)->addText('Grade Point');

        $subjects = ['myanmar', 'english', 'physics', 'PIT', 'math', 'microsoft'];
        foreach ($subjects as $key => $subject) {
            $table->addRow();
            $table->addCell(2000)->addText($key + 1);
            $table->addCell(4000)->addText(ucfirst($subject));
            $table->addCell(2000)->addText(3); // Assuming each subject has 3 credits
            $table->addCell(2000)->addText($data['first'][$subject]->grade ?? '-');
            $table->addCell(2000)->addText($data['first'][$subject]->grade_score ?? '-');
            $table->addCell(2000)->addText($data['first'][$subject]->grade_point ?? '-');
        }

        // Add GPA details for the first semester
        $section->addText("Total Grade Point: " . ($data['first']['grading']->total_GP ?? '-'));
        $section->addText("Cumulative GPA: " . ($data['first']['grading']->GPA ?? '-'));

        // Second Semester Table
        $section->addText(
            'Second Semester (GPA Sheet)',
            ['name' => 'Arial', 'size' => 10, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]  // Center the text
        );
        $section->addText('Second Semester (GPA Sheet)');
        $table = $section->addTable();
        foreach ($subjects as $key => $subject) {
            $table->addRow();
            $table->addCell(2000)->addText($key + 1);
            $table->addCell(4000)->addText(ucfirst($subject));
            $table->addCell(2000)->addText(3); // Assuming each subject has 3 credits
            $table->addCell(2000)->addText($data['second'][$subject]->grade ?? '-');
            $table->addCell(2000)->addText($data['second'][$subject]->grade_score ?? '-');
            $table->addCell(2000)->addText($data['second'][$subject]->grade_point ?? '-');
        }

        // Add GPA details for the second semester
        $section->addText("Total Grade Point: " . ($data['second']['grading']->total_GP ?? '-'));
        $section->addText("Cumulative GPA: " . ($data['second']['grading']->GPA ?? '-'));

        // Overall GPA
        $section->addText("Overall GPA: " . $data['over_all']);

        // Save and download the Word document
        $filename = 'grading_list_' . str_replace(' ', '_', $student->name) . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
        $phpWordWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $phpWordWriter->save($tempFile);

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }



}
