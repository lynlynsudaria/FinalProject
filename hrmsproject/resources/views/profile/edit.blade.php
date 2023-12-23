<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            <div class="p-6 text-gray-900">
                    <div class="sidenav">
                    

                        <a href="employee" class="admin-link" style="margin-top: 30px;">
                        <span style="margin-right: 10px;">👤</span> {{ $user->name }}
                        <div id="status-indicator" style="margin-left: 60px;"></div>
                        </a>

                        <div class="search-bar" style="margin-bottom: 20px;">
                            <input type="text" class="search-input" placeholder="Search...">
                        </div>

                        <a href="profile"><i class="fas fa-home"></i> Profile</a>
                        <a href="salaries"><i class="fas fa-money-bill"></i> Apply Overtime</a>
                        <a href="departments"><i class="fas fa-wrench"></i> Leave</a>
                        <a href="employees"><i class="fas fa-user"></i> Certificates</a>
                        <a href="leaves"><i class="fas fa-calendar-alt"></i> Apply Resignation</a>
                        <a href="#about"><i class="fas fa-info-circle"></i> About Us</a>
                       


                    </div>
                </div>


                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Simulating user status (online or offline)
    const isUserOnline = true; // Set to true for online, false for offline

    // Get the status indicator element
    const statusIndicator = document.getElementById('status-indicator');

    // Update the indicator based on the user's status
    if (isUserOnline) {
        statusIndicator.innerHTML = 'Online';
        statusIndicator.style.color = 'green'; // Set the color for online status
    } else {
        statusIndicator.innerHTML = 'Offline';
        statusIndicator.style.color = 'red'; // Set the color for offline status
    }
</script>
