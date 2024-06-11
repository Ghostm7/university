@extends('students.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .sidebar {
            width: 290px;
            background-color: #2c3e50;
            padding: 15px;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.log-out {
            background-color: #e74c3c;
        }

        .main-content {
            margin-left: 290px;
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        .main-content h1 {
            margin-top: 0;
            color: #333;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="{{ route('students.index') }}">Manage Users</a></li>
            <li><a href="{{ route('students.create') }}">Add New</a></li>
            <li><a class="log-out" href="Login">Log Out</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-header">Students Page</div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="post">
                    {!! csrf_field() !!}
                    <label>Name</label></br>
                    <input type="text" name="name" id="name" class="form-control"></br>
                    <label>Address</label></br>
                    <input type="text" name="address" id="address" class="form-control"></br>
                    <label>Mobile</label></br>
                    <input type="text" name="mobile" id="mobile" class="form-control"></br>
                    <input type="submit" value="Save" class="btn btn-success"></br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
