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

<div class="py-12" style="margin-left:250px; margin-top:5px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/employee" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ old('name') }}">
                            <br>
                            @error('name')
                            <p class="alert alert-danger">
                               {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address"
                                aria-describedby="address" name="address" >{{ old('address') }}</textarea>
                            <br>
                            @error('address')
                            <p class="alert alert-danger">
                               {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age"  aria-describedby="age" value="{{ old('age') }}">
                            <br>
                            @error('age')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"  aria-describedby="birthday" value="{{ old('birthday') }}">
                            <br>
                            @error('birthday')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                            
                            @error('email')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contactno" class="form-label">Contact No.</label>
                            <input type="number" class="form-control" id="contactno" name="contactno"  aria-describedby="contactno" value="{{ old('contactno') }}">
                            <br>
                            @error('contactno')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datehired" class="form-label">Date Hired</label>
                            <input type="date" class="form-control" id="datehired" name="datehired"  aria-describedby="datehired" value="{{ old('datehired') }}">
                            <br>
                            @error('datehired')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" aria-describedby="gender" value="{{ old('gender') }}">
                            
                            @error('gender')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

    
                        <a href="/employees" class="text-black btn btn-secondary">Back</a>
                        <button type="submit" class="text-black btn btn-success">Submit</button>
                    </form>
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