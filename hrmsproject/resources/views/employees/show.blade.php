<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 650px;">
        EMPLOYEE MANAGEMENT
    </h1>
</x-slot>

<div class="sidenav">

    <a href="#" class="admin-link" style="margin-top: 30px;">
    <span style="margin-right: 10px;">👤</span> {{ Auth::user()->name }}
    <div id="status-indicator" style="margin-left: 60px;"></div>
    </a>

    <div class="search-bar" style="margin-bottom: 20px;">
        <input type="text" class="search-input" placeholder="Search...">
    </div>
   
    <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
    <a href="departments"><i class="fas fa-wrench"></i> Department</a>
    <a href="employees"><i class="fas fa-user"></i> Employee</a>
    <a href="salaries"><i class="fas fa-money-bill"></i> Salary</a>
    <a href="leaves"><i class="fas fa-calendar-alt"></i> Leave</a>
    <a href="aboutus"><i class="fas fa-info-circle"></i> About Us</a>
</div>

<div class="py-12" style="margin-left:250px; margin-top:5px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="jumbotron">
                    <h1 class="display-4">{{ $employee->name }}</h1>
                    <p class="lead">{{ $employee->address }}, {{ $employee->age }} yrs old</p>
                    <hr class="my-4">
                    <p>{{ Carbon\Carbon::parse($employee->created_at)->format('M d, Y') }} ({{ Carbon\Carbon::parse($employee->created_at)->diffForHumans() }})</p>
                    <br>
                    <a href="/employees" class="text-black btn btn-secondary">Back</a>
                    <a href="/employee/{{ $employee->id }}/edit" class="text-black btn btn-success">Edit</a>
                </div>
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>
