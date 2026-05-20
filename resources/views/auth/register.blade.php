<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        <form method="POST" action="/register" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Name"
                class="w-full px-4 py-2 border rounded-lg">

            <input type="email" name="email" placeholder="Email"
                class="w-full px-4 py-2 border rounded-lg">

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border rounded-lg">

            <button class="w-full bg-green-600 text-white py-2 rounded-lg">
                Register
            </button>

        </form>

    </div>

</div>

</body>
</html>