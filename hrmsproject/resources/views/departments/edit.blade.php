<!-- <x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 650px;">
        EMPLOYEE DEPARTMENT MANAGEMENT
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

<div class="py-12" style="margin-left:250px; margin-top:5px;" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="/department/{{ $department->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                          <div class="col-md-6">
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ old('name', $department->name) }}">
                            <br>
                            @error('name')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>


                     <div class="row">
                        <div class="col-md-11">
                            <a href="/departments" class="text-black btn btn-secondary">Back</a>
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
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                <form action="/department/{{ $department->id }}" method="POST">
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
</x-app-layout>  -->

 -->
