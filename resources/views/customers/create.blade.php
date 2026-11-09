<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer - Student POS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Create Customer</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/tasks">Tasks</a>
    </nav>

    <hr>

    <h2>Customer Information</h2>

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

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

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
            <label for="phone">Phone:</label><br>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                required
            >
        </div>

        <br>

        <button type="submit">Create Customer</button>
        <a href="{{ route('customers.index') }}">Cancel</a>
    </form>

</body>
</html>
