<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Users Management
                </h1>

                <p class="text-gray-500 mt-1">
                    Manage all registered users from here.
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-300">
                
                + Create User
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

            <!-- Table Header -->
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-indigo-600 to-blue-500">
                <h2 class="text-xl font-semibold text-white">
                    Users List
                </h2>
            </div>

           @if (session('success'))
                <div class="max-w-7xl mx-auto mb-6">
                    <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl shadow-sm">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                User
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                User Type
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @foreach ($users as $user)

                            <tr class="hover:bg-indigo-50 transition duration-200">

                                <!-- User Info -->
                                <td class="px-6 py-2">
                                    
                                    <div class="flex items-center gap-4">

                                        <!-- User Image -->
                                        <div class="flex-shrink-0">

                                            @if ($user->image)
                                                <img 
                                                    src="{{ asset('storage/' . $user->image) }}"
                                                    alt="User Image"
                                                    class="w-14 h-14 rounded-full object-cover border-4 border-indigo-100 shadow"
                                                >
                                            @else
                                                <img 
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4f46e5&color=fff"
                                                    alt="User Image"
                                                    class="w-14 h-14 rounded-full object-cover border-4 border-indigo-100 shadow"
                                                >
                                            @endif

                                        </div>

                                        <!-- Name -->
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">
                                                {{ $user->name }}
                                            </h3>

                                            <p class="text-sm text-gray-500">
                                                ID: #{{ $user->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                <!-- Email -->
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    {{ $user->email }}
                                </td>

                                <!-- User Type -->
                                <td class="px-6 py-5">

                                    @if ($user->user_type == 'admin')

                                        <span class="bg-red-100 text-red-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            Admin
                                        </span>

                                    @elseif ($user->user_type == 'employer')

                                        <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            Employer
                                        </span>

                                    @elseif ($user->user_type == 'company')

                                        <span class="bg-purple-100 text-purple-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            Company
                                        </span>

                                    @elseif ($user->user_type == 'job_seeker')

                                        <span class="bg-yellow-100 text-yellow-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            Job Seeker
                                        </span>
                                    

                                    @elseif ($user->user_type == 'user')

                                        <span class="bg-green-100 text-green-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            User
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-700 text-sm font-semibold px-4 py-2 rounded-full">
                                            No Type
                                        </span>


                                    @endif

                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-center gap-3">

                                        <!-- Edit -->
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm rounded shadow-md transition duration-300 font-medium">
                                            
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-500 btn-sm hover:bg-red-600 text-white px-3 py-1 text-sm rounded shadow-md transition duration-300 font-medium">
                                                
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>