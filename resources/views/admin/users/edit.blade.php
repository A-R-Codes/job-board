<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

@include('components.navbar')

<div class="max-w-4xl mx-auto px-4 py-10">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit User
        </h1>

        <p class="text-gray-500 mt-2">
            Update user details and profile image.
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-5">
            <h2 class="text-white text-xl font-semibold">
                Update Information
            </h2>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.users.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 md:p-8">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="w-full rounded-xl border px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none">

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="w-full rounded-xl border px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Type -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">User Type</label>

                    <select name="user_type"
                            class="w-full rounded-xl border px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none">

                        <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="employer" {{ $user->user_type == 'employer' ? 'selected' : '' }}>Employer</option>
                        <option value="user" {{ $user->user_type == 'user' ? 'selected' : '' }}>User</option>
                        <option value="company" {{ $user->user_type == 'company' ? 'selected' : '' }}>Company</option>
                        <option value="job_seeker" {{ $user->user_type == 'job_seeker' ? 'selected' : '' }}>Job Seeker</option> 
                    </select>

                    @error('user_type')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Profile Image</label>

                    <input type="file"
                           name="image"
                           class="w-full rounded-xl border px-4 py-3 bg-white">

                    @error('image')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <!-- Current Image -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-2">Current Image</p>

                        @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}"
                                 class="w-20 h-20 rounded-full object-cover border shadow">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                 class="w-20 h-20 rounded-full object-cover border shadow">
                        @endif
                    </div>

                </div>

            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-10">

                <button type="submit"
                        class="bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold px-8 py-3 rounded-xl shadow-lg">

                    Update User
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-8 py-3 rounded-xl rounded-xl flex items-center justify-center">

                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>