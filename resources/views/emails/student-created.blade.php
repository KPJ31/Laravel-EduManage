<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Student Created</title>
</head>
<body>
    <h2>New Student Created</h2>

    <p>A new student has been registered in the SMS Admin system.</p>

    <table cellpadding="8" cellspacing="0" border="1">
        <tr>
            <th align="left">Name</th>
            <td>{{ $student->fname }} {{ $student->lname }}</td>
        </tr>
        <tr>
            <th align="left">Email</th>
            <td>{{ $studentDetail->email }}</td>
        </tr>
        <tr>
            <th align="left">Phone</th>
            <td>{{ $studentDetail->phone }}</td>
        </tr>
        <tr>
            <th align="left">Address</th>
            <td>{{ $studentDetail->address }}</td>
        </tr>
        <tr>
            <th align="left">Date of Birth</th>
            <td>{{ $student->dob }}</td>
        </tr>
        <tr>
            <th align="left">Gender</th>
            <td>{{ ucfirst($student->gender) }}</td>
        </tr>
    </table>
</body>
</html>
