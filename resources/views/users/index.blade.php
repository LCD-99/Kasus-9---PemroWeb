<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f7fc;
            color: #555;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 30px;
            color: white;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            transition: transform 0.3s ease;
        }

        .sidebar .btn {
            width: 100%;
            text-align: left;
            padding: 14px 20px;
            margin-bottom: 12px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
        }

        .sidebar .btn:hover {
            background-color: #495057;
            transform: translateX(10px);
        }

        .sidebar .btn-back {
            background-color: #f0ad4e;
        }

        .sidebar .btn-success {
            background-color: #28a745;
        }

        .content {
            flex-grow: 1;
            margin-left: 250px; /* Adjusted to make room for the sidebar */
            padding: 30px;
            background-color: #f8f9fa;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 700;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px;
            text-align: center;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Button Styling */
        .btn-delete {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-delete:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

        .btn-edit {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-edit:hover {
            background-color: #138496;
            transform: scale(1.05);
        }

        /* Card Styling */
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-body {
            padding: 25px;
        }

        .table-container {
            margin-top: 30px;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .text-adminp {
            color: white;
            text-align: center;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h1 class="text-adminp">Admin Panel</h1>
    <!-- Back to Dashboard Button -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Back to Dashboard</a>

    <!-- Add New User Button -->
    <a href="{{ route('users.create') }}" class="btn btn-success">Add New User</a>
</div>

<!-- Main Content Area -->
<div class="content">
    <div class="card">
        <div class="card-body">
            <h1>User Management</h1>

            <!-- User Table -->
            <div class="table-container">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS and Popper.js for improved interaction -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
