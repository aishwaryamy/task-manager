<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1100px;
            margin: 30px auto;
            background: #f5f7fb;
            color: #222;
        }

        .container {
            background: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
        }

        h1, h2, h3 {
            margin-top: 0;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn, button {
            display: inline-block;
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover, button:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .btn-success {
            background: #059669;
        }

        .btn-success:hover {
            background: #047857;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-warning {
            background: #d97706;
        }

        .btn-warning:hover {
            background: #b45309;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-top: 6px;
            margin-bottom: 14px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .section {
            background: #f9fafb;
            padding: 18px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            margin-top: 18px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 14px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .done {
            background: #d1fae5;
            color: #065f46;
        }

        .pending {
            background: #fee2e2;
            color: #991b1b;
        }

        .success {
            background: #ecfeff;
            padding: 12px;
            border: 1px solid #bae6fd;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .errors {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .inline-form {
            display: inline;
        }

        .subtask-card, .attachment-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 12px;
        }

        .muted {
            color: #6b7280;
            font-size: 14px;
        }

        .search-row {
            display: flex;
            gap: 10px;
            align-items: end;
            flex-wrap: wrap;
        }

        .search-row > div {
            flex: 1;
            min-width: 180px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="errors">
                <strong>Please fix the following:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>