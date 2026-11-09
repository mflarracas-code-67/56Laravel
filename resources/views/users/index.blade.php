<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Student POS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Users</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/tasks">Tasks</a>
    </nav>

    <hr>

    <h2>User List</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ route('users.create') }}">
            <button type="button">+ Create User</button>
        </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                        <img
                            src="{{ $user->avatar
                                ? asset('storage/' . $user->avatar)
                                : asset('images/avatar-placeholder.svg') }}"
                            alt="{{ $user->full_name }} Avatar"
                            width="60"
                            height="60"
                            style="object-fit: cover; border-radius: 50%;"
                        >
                    </td>

                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
