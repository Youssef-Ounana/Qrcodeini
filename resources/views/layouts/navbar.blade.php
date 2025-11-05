<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo / Brand -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 hover:text-blue-800 transition">
                    🧾 QRApp
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex space-x-6 items-center">
                <a href="{{ route('qrcodes.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">🏠 Home</a>

                @guest
                    <a href="{{ route('user.register') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">📝 Register</a>
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">🔐 Login</a>
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition">🚪 Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
