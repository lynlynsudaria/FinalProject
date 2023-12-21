
<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 650px;">
        EMPLOYEE/DEPARTMENT MANAGEMENT
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

<!-- <table class="table" style="margin-left: 250px;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Department ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employeeDepartments as $index => $employeeDepartment)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$employeeDepartment->employee_id}}</td>
                    <td>{{$employeeDepartment->department_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
</x-app-layout> -->
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    <p class="text-right">
                        @if(auth()->user()->role->role == 'admin')
                        <a href="/employeeDepartment" class="text-black btn btn-primary">Add</a>
                        @endif
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Leave</th>
                                <th scope="col">Salary</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentsCourses as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td><a class="link-underline-primary link-primary" href="/student/{{ $item->student_id }}">{{$item->student->name }}</a></td>
                                <td>{{ $item->course->course }}</td>
                                <td>{{ $item->instructor->name }}</td>
                                <td>{{ $item->grade }}</td>
                                <td>{{ $item->is_active_flag }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $studentsCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
