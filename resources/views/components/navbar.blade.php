@php
$user = auth()->user();
@endphp

<header class="bg-gradient-to-r from-purple-600 via-purple-600 to-purple-600 shadow-lg">

    <div class="lg:px-16 px-4 py-4 flex flex-wrap items-center justify-between">

        <!-- Logo -->
        <a href="#" class="text-white text-2xl font-bold tracking-wide">
            Company
        </a>

        <!-- Mobile Button -->
        <button id="menu-btn" class="md:hidden text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="28"
                height="28"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>

        <!-- Menu -->
        <div id="menu" class="hidden w-full md:flex md:w-auto md:items-center">

            <nav class="w-full">
                <ul class="md:flex items-center space-y-2 md:space-y-0 md:space-x-2 text-white text-sm font-medium pt-4 md:pt-0">

                    @if($user && $user->user_type === 'admin')
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/dashboard">Admin</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/dashboard">Dashboard</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/admin/users">Manage Users</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/admin/jobs">Manage Jobs</a></li>
                    @endif

                    @if($user && $user->user_type === 'job_seeker')
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/profile">Job Seeker</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/profile">Profile</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/jobs">Jobs</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/applications">Applications</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/saved_jobs">Saved Jobs</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/messages">Messages</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/settings">Settings</a></li>
                    @endif

                    @if($user && $user->user_type === 'company')
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">Company</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">Dashboard</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/profile">Profile</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/jobs">Job Postings</a></li>
                    @endif

                     @if($user && $user->user_type === 'user')
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">User</a></li>
                        <!-- <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">Dashboard</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/profile">Profile</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/jobs">Job Postings</a></li> -->
                    @endif

                     @if($user && $user->user_type === 'employer')
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">Employer</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/employer/job-postings">Job Postings</a></li>
                        <
                        
                        <!-- <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/dashboard">Dashboard</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/profile">Profile</a></li>
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/company/jobs">Job Postings</a></li> -->
                    @endif

                    <!-- Common Links -->
                    <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="#">About Us</a></li>
                    <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="#">Treatments</a></li>
                    <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="#">Blog</a></li>
                    <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="#">Contact Us</a></li>

                    <!-- Auth -->
                    @if($user)
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="px-3 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white transition">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a class="px-3 py-2 rounded-lg hover:bg-white hover:text-purple-700 transition" href="/login">Login</a></li>
                        <li><a class="px-3 py-2 rounded-lg bg-white text-purple-700 hover:bg-gray-100 transition" href="/register">Register</a></li>
                    @endif

                </ul>
            </nav>

        </div>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>