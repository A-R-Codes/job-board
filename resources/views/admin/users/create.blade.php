<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    @include('components.navbar')

    <div class="max-w-4xl mx-auto px-4 py-10">

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Create New User
            </h1>

            <p class="text-gray-500 mt-2">
                Add a new user with image, role, and account details.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-5">
                <h2 class="text-white text-xl font-semibold">
                    User Information
                </h2>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.users.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 md:p-8">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter full name"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter email address"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('email')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Enter password"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('password')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Confirm Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               placeholder="Confirm password"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                    </div>

                    <!-- User Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            User Type
                        </label>

                        <select name="user_type"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                            <option value="">Select User Type</option>

                            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="employer" {{ old('user_type') == 'employer' ? 'selected' : '' }}>
                                Employer
                            </option>

                            <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>
                                User
                            </option>

                            <option value="job_seeker" {{ old('user_type') == 'job_seeker' ? 'selected' : '' }}>
                                Job Seeker
                            </option>

                            <option value="company" {{ old('user_type') == 'company' ? 'selected' : '' }}>
                                Company
                            </option>

                        </select>

                        @error('user_type')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- User Image -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            User Image
                        </label>

                        <input type="file"
                               name="image"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('image')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-10">

                    <button type="submit"
                            class="bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition duration-300">
                        
                        Create User
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-8 py-3 rounded-xl transition duration-300 text-center">
                        
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>