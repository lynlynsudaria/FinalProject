<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 700px;">
        ANNOUNCEMENTS
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

    <div class="row" style="margin-left: 250px;">
  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">HIRING</div>
      <div class="card-body text-success">
        <h5 class="card-title">Accounting Department</h5>
        <p class="card-text">Is in need of 2 Bookkeepers who have knowledge in QuickBooks Online.</p>
      </div>
      <div class="card-footer bg-transparent border-success">Send your CV to HR Department</div>
    </div>
  </div>
  
  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">EMPLOYEE OF THE YEAR</div>
      <div class="card-body text-success">
        <h5 class="card-title">- Juan Dela Cruz</h5>
        <h5 class="card-title">- Kristy Santos</h5>
        <h5 class="card-title">- Felisimo Reyes</h5>
      </div>
      <div class="card-footer bg-transparent border-success">Thank you for all your Hardwork</div>
    </div>
  </div>

  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">CONVENTION </div>
      <div class="card-body text-success">
        <h5 class="card-title">To all Supervisors</h5>
        <h5 class="card-title">January 8-12, 2024</h5>
        <h5 class="card-title">@ Margarette Hotel</h5>
      </div>
      <div class="card-footer bg-transparent border-success">See you there..</div>
    </div>
  </div>
</div>



<div class="row" style="margin-left: 250px;">
  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">COMPANY EVENTS</div>
      <div class="card-body text-success">
        <h5 class="card-title">Team Building</h5>
        <h5 class="card-title">December 28, 2023</h5>
        <h5 class="card-title">@ Wendys Garden, Resorts and Function</h5>
      </div>
      <div class="card-footer bg-transparent border-success">You are all advised to attend..</div>
    </div>
  </div>
  
  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">LEADERSHIP</div>
      <div class="card-body text-success">
        <p class="card-text">Announcing changes in leadership roles or organizational structure, effective upon the management of the newly hired CEO. Please do cooperate. Thank you</p>
      </div>
      <div class="card-footer bg-transparent border-success">By: Management</div>
    </div>
  </div>

  <div class="col">
    <div class="card border-success mb-3" style="max-width: 18rem; margin-top: 30px; margin-left: 50px;">
      <div class="card-header bg-transparent border-success">EMPLOYEE BENIFITS</div>
      <div class="card-body text-success">
        <p class="card-text">Due to high demands in the market, you need to render a 2-hour overtime. Everyone will recieve a higher differencials and incentives starting next week</p>
      </div>
      <div class="card-footer bg-transparent border-success">Thank you for your hardwok.</div>
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
