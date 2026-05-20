@php
    $user = auth()->user();
@endphp

<nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="text-xl font-bold">
                MyApp
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">

                <a href="/dashboard" class="text-gray-700 hover:text-blue-600">Dashboard</a>

                @if($user && $user->user_type === 'admin')
                    <a href="/admin/users" class="text-gray-700 hover:text-blue-600">Users</a>
                    <a href="/admin/reports" class="text-gray-700 hover:text-blue-600">Reports</a>
                @endif

                @if($user && $user->user_type === 'user')
                    <a href="/profile" class="text-gray-700 hover:text-blue-600">Profile</a>
                    <a href="/orders" class="text-gray-700 hover:text-blue-600">My Orders</a>
                @endif

                <!-- Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-blue-600">
                        Menu ▼
                    </button>

                    <div class="absolute hidden group-hover:block bg-white border shadow-md mt-2 w-40">
                        <a href="/settings" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                        <a href="/help" class="block px-4 py-2 hover:bg-gray-100">Help</a>
                    </div>
                </div>

                @if($user)
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="text-red-600 hover:text-red-800">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-blue-600">Login</a>
                @endif

            </div>

            <!-- Mobile Button -->
            <button id="menuBtn" class="md:hidden text-2xl">
                ☰
            </button>

        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 space-y-2">

            <a href="/dashboard" class="block">Dashboard</a>

            @if($user && $user->user_type === 'admin')
                <a href="/admin/users" class="block">Users</a>
                <a href="/admin/reports" class="block">Reports</a>
            @endif

            @if($user && $user->user_type === 'user')
                <a href="/profile" class="block">Profile</a>
                <a href="/orders" class="block">My Orders</a>
            @endif

            <a href="/settings" class="block">Settings</a>
            <a href="/help" class="block">Help</a>

            @if($user)
                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-red-600">Logout</button>
                </form>
            @else
                <a href="/login" class="text-blue-600">Login</a>
            @endif

        </div>

    </div>
</nav>

<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>