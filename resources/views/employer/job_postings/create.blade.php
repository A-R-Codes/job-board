<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Posting</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    @include('components.navbar')

    <div class="max-w-4xl mx-auto px-4 py-10">

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Create New Job Posting
            </h1>

            <p class="text-gray-500 mt-2">
                Create a new job opportunity for candidates.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-5">
                <h2 class="text-white text-xl font-semibold">
                    Job Information
                </h2>
            </div>

            <form action="{{ route('employer.job-postings.store') }}"
                  method="POST"
                  class="p-6 md:p-8">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Job Title
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               placeholder="Enter job title"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('title')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location
                        </label>

                        <input type="text"
                               name="location"
                               value="{{ old('location') }}"
                               placeholder="Enter location"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('location')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Job Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Job Type
                        </label>

                        <select name="job_type"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                            <option value="">Select Job Type</option>

                            <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}>
                                Full Time
                            </option>

                            <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}>
                                Part Time
                            </option>

                            <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>
                                Contract
                            </option>

                            <option value="Remote" {{ old('job_type') == 'Remote' ? 'selected' : '' }}>
                                Remote
                            </option>

                            <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>
                                Internship
                            </option>

                        </select>

                        @error('job_type')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Salary
                        </label>

                        <input type="number"
                               name="salary"
                               value="{{ old('salary') }}"
                               placeholder="Enter salary"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('salary')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Vacancy -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Number of Vacancies
                        </label>

                        <input type="number"
                               name="vacancy"
                               value="{{ old('vacancy') }}"
                               placeholder="Enter vacancies"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('vacancy')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Application Deadline
                        </label>

                        <input type="date"
                               name="deadline"
                               value="{{ old('deadline') }}"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

                        @error('deadline')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Job Description
                    </label>

                    <textarea name="description"
                              rows="6"
                              placeholder="Enter complete job description"
                              class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-10">

                    <button type="submit"
                            class="bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition duration-300">
                        Create Job Posting
                    </button>

                    <a href="{{ route('employer.job-postings.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-8 py-3 rounded-xl transition duration-300 text-center">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>