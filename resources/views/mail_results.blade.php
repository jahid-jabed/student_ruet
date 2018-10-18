<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        
        Hi,
        <br>
        <p>This is fake testing result of <b>{{ $result->year }}</b> year <b style="text-transform: lowercase;">{{ $result->semester }}</b> semester, <b>{{ $result->examination }}</b>!</p>
        <br><br>

        <table border="1">
            <caption style="text-transform: uppercase;">{{ $result->year }} year {{ $result->semester }} semester, {{ $result->examination }}</caption>
            <tr>
                <th>
                    GP
                </th>
                <td>
                    {{ $result->gp }}
                </td>
            </tr>
            <tr>
                <th>
                    Earned Credit
                </th>
                <td>
                    {{ $result->earned_credit }}
                </td>
            </tr>
            <tr>
                <th>
                    GPA
                </th>
                <td>
                    {{ $result->gpa }}
                </td>
            </tr>
            <tr>
                <th>
                    Total Earned Credit
                </th>
                <td>
                    {{ $result->total_earned_credit }}
                </td>
            </tr>
            <tr>
                <th>
                    CGPA
                </th>
                <td>
                    {{ $result->cgpa }}
                </td>
            </tr>
            <tr>
                <th>
                    Failed Subjects
                </th>
                <td>
                    {{ $result->failed }}
                </td>
            </tr>
            <tr>
                <th>
                    X-Grade Subjects
                </th>
                <td>
                    {{ $result->x_graded }}
                </td>
            </tr>
        </table>
        <br><br>Thanks,
        <br>Exam Controller, RUET.
    </body>
</html>