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

<div class="py-12" style="margin-left:250px; margin-top:5px;" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="/employee/{{ $employee->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                          <div class="col-md-6">
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
        

                        <div class="mb-3 row">
    <div class="col-md-6">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" aria-describedby="address" name="address">{{ old('address', $employee->address) }}</textarea>
        @error('address')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="birthday" class="form-label">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" aria-describedby="birthday" value="{{ old('birthday', $employee->birthday) }}">
        @error('birthday')
            <p class="alert alert-danger">
                {{ $message }}
            </p>
        @enderror
    </div>
</div>



                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ old('name', $employee->name) }}">
                            <br>
                            @error('name')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" aria-describedby="age" value="{{ old('age', $employee->age) }}">
                            <br>
                            @error('age')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" aria-describedby="address"
                                name="address">{{ old('address', $employee->address) }}</textarea>
                            <br>
                            @error('address')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" aria-describedby="birthday" value="{{ old('birthday', $employee->birthday) }}">
                            
                            @error('birthday')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email', $employee->email) }}">
                            
                            @error('email')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" aria-describedby="contact_number" value="{{ old('contact_number', $employee->contact_number) }}">
                            
                            @error('contact_number')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date_hired" class="form-label">Date Hired</label>
                            <input type="date" class="form-control" id="date_hired" name="date_hired" aria-describedby="date_hired" value="{{ old('date_hired', $employee->date_hired) }}">
                            
                            @error('date_hired')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" aria-describedby="gender" value="{{ old('gender', $employee->gender) }}">
                            
                            @error('gender')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                            
                     <div class="row">
                        <div class="col-md-11">
                            <a href="/employees" class="text-black btn btn-secondary">Back</a>
                            <button type="submit" class="text-black btn btn-success">Update</button>
                        </div>
                        <div class="col-md-1">
                           <button type="button" class="text-black btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Delete
                        </button>

                        </div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="text-black btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="/employee/{{ $employee->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="text-black btn btn-danger">Confirm</button>
                </form>
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


