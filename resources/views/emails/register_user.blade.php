<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td,
        th {
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
    <h2>We have new user</h2>
    <p>User info:</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Company name</th>
            <th>Password</th>         
        </tr>
        
        <tr>
            <td>{{ $user['f_name']. ' '.$user['l_name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['role'] }}</td>
            <td>{{ $user['phone'] }}</td>
            <td>{{ $user['country'] }}</td>
            <td>{{ $user['company_name'] }}</td>
            <td>{{ $user['password'] }}</td>
           
        </tr>
        
    </table>
</body>
</html>