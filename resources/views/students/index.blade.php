<?php
$idx=1;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students App</title>
</head>
<body>

<h2>Add Student</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter Email" required>
    <button type="submit">Add</button>
</form>

<hr>

<h2>Students List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{ $idx++ }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
      <td>{{ $student->name == "luqman" ? "Admin" : "Student" }}</td>  
        <td>
            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
