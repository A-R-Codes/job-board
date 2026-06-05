<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Postings</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Job Postings Management
                </h1>

                <p class="text-gray-500 mt-1">
                    Manage all job postings from here.
                </p>
            </div>

            <a href="{{ route('employer.job-postings.create') }}"
               class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-300">

                + Create Job Posting
            </a>

        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

            <!-- Table Header -->
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-indigo-600 to-blue-500">
                <h2 class="text-xl font-semibold text-white">
                    Job Postings List
                </h2>
            </div>

            @if (session('success'))
                <div class="max-w-7xl mx-auto mb-6">
                    <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl shadow-sm">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase">
                                Title
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase">
                                Location
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase">
                                Job Type
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase">
                                Salary
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-600 uppercase">
                                Deadline
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-600 uppercase">
                                Actions
                            </th>

                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @foreach ($job_postings as $job)

                            <tr class="hover:bg-indigo-50 transition duration-200">

                                <!-- Title -->
                                <td class="px-6 py-5">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">
                                            {{ $job->title }}
                                        </h3>

                                        <p class="text-sm text-gray-500">
                                            ID: #{{ $job->id }}
                                        </p>
                                    </div>
                                </td>

                                <!-- Location -->
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    {{ $job->location }}
                                </td>

                                <!-- Job Type -->
                                <td class="px-6 py-5">
                                    <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-2 rounded-full">
                                        {{ $job->job_type }}
                                    </span>
                                </td>

                                <!-- Salary -->
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    {{ $job->salary }}
                                </td>

                                <!-- Deadline -->
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    {{ $job->deadline }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-center gap-3">

                                        <!-- Edit -->
                                        <a href="{{ route('employer.job-postings.edit', $job->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm rounded shadow-md transition duration-300 font-medium">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('employer.job-postings.destroy', $job->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this job posting?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-sm rounded shadow-md transition duration-300 font-medium">
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