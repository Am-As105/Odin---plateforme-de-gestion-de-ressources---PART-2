<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }
        .container {
            width: 400px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            border-radius: 6px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: #4f46e5;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Login</h2>

    {{-- Session status --}}
    @if (session('status'))
        <p style="color: green">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div style="margin-top: 10px;">
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
            >

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Remember me --}}
        <div style="margin-top: 10px;">
            <label>
                <input type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        {{-- Forgot password --}}
        @if (Route::has('password.request'))
            <div style="margin-top: 10px;">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        @endif

        <button type="submit">Log in</button>
    </form>

</div>

</body>
</html>
