<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('students.update', $student->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $student->name }}" required>
    <input type="email" name="email" value="{{ $student->email }}" required>
    <button type="submit">Update</button>
</form>

<a href="{{ route('students.index') }}">Back to List</a>

</body>
</html>
