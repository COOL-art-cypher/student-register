
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0px auto;
            background-color: #ffffff;
            padding: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center:
        }

        table {
            width: 100%;
            height: 50;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #dddddd;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 18px;
            font-weight: normal;
        }
        .details-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .details-table td {
            padding: 5px;
        }
        .details-table td span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        {{--  <div><img src="{{ asset('user/images/logo.png') }}" class="mt-5" style="height: 120px;width:120px"></div>  --}}


        <div class="container">
            <div class="header">
                <h2>The Republic of The Union of Myanmar</h2>
                <h2>Ministry of Science and Technology</h2>
                <h2>Department of Advanced Science and Technology</h2>
                <h2>University of Computer Studies (Hinthada)</h2>
            </div>
            </div>


        </div><br><br>
        <table style="width: 100%; border-collapse: collapse;border: none">
            <tr>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;"><span>Post Code:</span> 100601</p>
                </td>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;"><span>Email:</span> studentaffair@ucsh.edu.mm</p>
                </td>
            </tr>
            <tr>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;"><span>Phone:</span> 95-09-783543903</p>
                </td>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;"><span>Degree Programme:</span> B.C.Sc./B.C.Tech</p>
                </td>
            </tr>
            <tr>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;">Name:{{ $first['student']->name }}</p>
                </td>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;">Roll No:{{ $first['student']->roll_number }}</p>
                </td>
            </tr>
            <tr>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;">Year: First Year(2022-2023)Academic Year</p>
                </td>
                <td style="border: none; width: 50%; padding: 0px; margin: 0;">
                    <p style="margin: 0; line-height: 1.5;">Degree Programme: B.C.Sc./B.C.Tech</p>
                </td>
            </tr>
            Year: First Year(2022-2023)Academic Year
        </table>


    <table class="table">
        <thead>
            <tr class="text-center">
                <th colspan="6" style="text-align: center">First Semester(GPA Sheet)</th>
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
              <th colspan="6" style="text-align: center">Second Semester(GPA Sheet)</th>
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
          <td id="over-all"> {{ $over_all }} </td>
        </tr>
      </tbody>
      </table>




</body>
</html>

