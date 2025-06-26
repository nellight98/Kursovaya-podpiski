<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Left side (optional) -->
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="auto">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @php
                            $unreadCount = Auth::user()->unreadNotifications()->count();
                        @endphp

                        <div class="flex space-x-6 px-4 py-2">
                            <a
                                href="{{ route('profile.edit') }}"
                                class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                            >
                                Profile
                            </a>
                            <a
                                href="{{ route('profile.subscriptions') }}"
                                class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                            >
                                My Subscriptions
                            </a>
                            <a
                                href="{{ route('notifications.index') }}"
                                class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                            >
                                Notifications
                                @if($unreadCount > 0)
                                    <span class="text-red-600">({{ $unreadCount }})</span>
                                @endif
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                                >
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-x-6 flex px-4">
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                class="px-3 py-2"
            >
                Dashboard
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 px-4">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500 mb-2">{{ Auth::user()->email }}</div>

            <div class="flex space-x-6">
                <a
                    href="{{ route('profile.edit') }}"
                    class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                >
                    Profile
                </a>
                <a
                    href="{{ route('profile.subscriptions') }}"
                    class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                >
                    My Subscriptions
                </a>
                <a
                    href="{{ route('notifications.index') }}"
                    class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                >
                    Notifications
                    @if($unreadCount > 0)
                        <span class="text-red-600">({{ $unreadCount }})</span>
                    @endif
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button
                        type="submit"
                        class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md whitespace-nowrap"
                    >
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
