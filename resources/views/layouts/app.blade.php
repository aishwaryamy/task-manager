<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            background: #f9fafb;
        }

        h1 {
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-bottom: 1px solid #eee;
            padding: 10px;
            text-align: left;
        }

        button {
            padding: 6px 10px;
            border: none;
            background: #2563eb;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
        }

        .done {
            background: #d1fae5;
        }

        .pending {
            background: #fee2e2;
        }

        .success {
            background: #ecfeff;
            padding: 10px;
            border: 1px solid #bae6fd;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="card">

@if(session('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif

@yield('content')

</div>

</body>
</html>