<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Student POS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Edit User</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/tasks">Tasks</a>
    </nav>

    <hr>

    <h2>Update User Information</h2>

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

    <form
        action="{{ route('users.update', $user->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="username">Username:</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}"
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
                value="{{ old('full_name', $user->full_name) }}"
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
                value="{{ old('email', $user->email) }}"
                required
            >
        </div>

        <br>

        <div>
            <label>Current Avatar:</label><br>

            @if ($user->avatar)
                <img
                    src="{{ asset('storage/' . $user->avatar) }}"
                    alt="Current User Avatar"
                    width="120"
                    height="120"
                    style="object-fit: cover; border-radius: 50%;"
                >
            @else
                <p>No avatar uploaded yet.</p>
            @endif
        </div>

        <br>

        <div>
            <label for="avatar">Upload New Avatar:</label><br>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept="image/*"
            >
            <small>Accepted: image files only. Maximum size: 2MB.</small>
        </div>

        <br>

        <div>
            <label for="password">New Password:</label><br>
            <input
                type="password"
                id="password"
                name="password"
            >
            <small>Leave blank to keep the current password.</small>
        </div>

        <br>

        <button type="submit">Update User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>

</body>
</html>
