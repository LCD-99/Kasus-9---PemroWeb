<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <label for="role">Role:</label>
    <select name="role" required>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
        <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
    </select>
    <br>
    <button type="submit">Update</button>
</form>

</body>
</html>
