<!-- resources/views/youths/report_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Report</title>
    <style>
        /* You can add your custom styling for the PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Youth Database</h1>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Birthdate</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Classification</th>
                <th>Age Group</th>
                <th>Sitio</th>
                <th>Highest Educational Attainment</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Work Status</th>
                <th>Registered Voter</th>
                <th>Voted Last Election</th>
                <th>Attended KK Assembly</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($youths as $youth)
                <tr>
                    <td>{{ $youth->first_name }}</td>
                    <td>{{ $youth->middle_name }}</td>
                    <td>{{ $youth->last_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($youth->birthdate)->age }}</td>
                    <td>{{ \Carbon\Carbon::parse($youth->birthdate)->format('Y-m-d') }}</td>
                    <td>{{ $youth->sex }}</td>
                    <td>{{ $youth->civil_status }}</td>
                    <td>{{ $youth->youth_classification }}</td>
                    <td>{{ $youth->youth_age_group }}</td>
                    <td>{{ $youth->sitio }}</td>
                    <td>{{ $youth->highest_educational_attainment }}</td>
                    <td>{{ $youth->email }}</td>
                    <td>{{ $youth->contact_number }}</td>
                    <td>{{ $youth->work_status }}</td>
                    <td>{{ $youth->registered_voter ? 'Yes' : 'No' }}</td>
                    <td>{{ $youth->voted_last_election ? 'Yes' : 'No' }}</td>
                    <td>{{ $youth->attended_kk_assembly ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('report.pdf') }}" class="btn btn-danger">Export as PDF</a>
</body>
</html>
