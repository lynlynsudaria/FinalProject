<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 650px;">
        EMPLOYEE MANAGEMENT
    </h1>
</x-slot>

<div class="sidenav">

    <a href="#" class="admin-link" style="margin-top: 30px;">
    <span style="margin-right: 10px;">👤</span> Administrator
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

<div class="py-12" style="margin-left:250px;">
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
                        <a href="/employee" class="btn btn-secondary">Add Employee</a>
                        @endif
                    </p>

    <table class="table" >
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Age</th>
      <th scope="col">Birthday</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Date Hired</th>
      <th scope="col">Gender</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($employees as $index => $item)
    <tr>
      <th scope="row">{{$index+1}}</th>
      <td><a class="link-underline-primary link-primary" href="/employee/{{ $item->id }}">{{ $item->name }}</a></td>
      <td>{{$item->address}}</td>
      <td>{{$item->age}}</td>
      <td>{{$item->birthday}}</td>
      <td>{{$item->contact_no}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->date_hired}}</td>
      <td>{{$item->gender}}</td>
      <td>{{$item->status}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $employees->links() }}
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
