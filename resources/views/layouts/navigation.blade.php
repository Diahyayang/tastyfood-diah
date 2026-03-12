<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">

            <!-- LOGO -->
            <div class="flex">
                <a href="{{ url('/admin/kontak') }}" class="text-lg font-bold">
                    ADMIN
                </a>
            </div>

            <!-- LOGOUT -->
            <div class="flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
