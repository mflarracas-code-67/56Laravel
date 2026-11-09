<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User - Student POS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Create User</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/tasks">Tasks</a>
    </nav>

    <hr>

    <h2>User Information</h2>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label for="username">Username:</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="full_name">Full Name:</label><br>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="email">Email:</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Password:</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
            <small>Minimum of 8 characters.</small>
        </div>

        <br>

        <button type="submit">Create User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>

</body>
</html>
