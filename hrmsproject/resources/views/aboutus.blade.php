
<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 650px;">
        COMPANY OVERVIEW
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
    <a href="about"><i class="fas fa-info-circle"></i> About Us</a>


</div>

<button class="accordion" style="margin-left:260px; margin-top:50px; color: rgb(22, 199, 218);">MISSION</button>
<div class="panel">
  <p style="margin-left:260px">To empower organizations with a robust Employee Management System (EMS) that optimizes workforce efficiency, fosters a positive workplace culture, and ensures seamless collaboration between employees and management. Our mission is to provide a user-friendly, comprehensive solution that streamlines HR processes, enhances employee engagement, and contributes to the overall success and growth of our client organizations.</p>
</div>

<button class="accordion" style="margin-left:260px; margin-top:50px; color: rgb(22, 199, 218);">VISION</button>
<div class="panel">
  <p style="margin-left:260px">Our vision is to be the leading provider of innovative Employee Management Systems globally, revolutionizing the way organizations manage and interact with their workforce. We aspire to create a future where businesses, regardless of size or industry, leverage cutting-edge technology to nurture a motivated and skilled workforce. Through continuous innovation and a commitment to excellence, we aim to be the catalyst for positive organizational transformation, promoting productivity, transparency, and employee well-being.</p>
</div>

<button class="accordion" style="margin-left:260px; margin-top:50px;color: rgb(22, 199, 218);">ABOUT US</button>
<div class="panel">
  <p style="margin-left:260px">Welcome to to our company, a pioneer in providing comprehensive Employee Management Solutions. With a rich history of [number of years] years in the industry, we have been at the forefront of transforming how organizations manage their most valuable asset - their people.
  <p style="margin-left:260px">Why Choose our Company Name?</p>
<p style="margin-left:260px">Innovation: We leverage the latest technologies to provide you with a modern and intuitive Employee Management System.</p>
<p style="margin-left:260px">Customization: Tailor our system to meet the unique needs and workflows of your organization.</p>
<p style="margin-left:260px">Reliability: Trust in a system that ensures accuracy, security, and compliance with industry standards.</p>
<p style="margin-left:260px">Dedicated Support: Our team is committed to providing excellent customer support, ensuring you have a smooth experience with our solutions.</p>
<p style="margin-left:260px">Join us on the journey of transforming HR management, optimizing productivity, and building a motivated workforce.</p>
</div>

<button class="accordion" style="margin-left:260px; margin-top:50px; color: rgb(22, 199, 218);">CONTACT US</button>
<div class="panel">
  <p style="margin-left:260px">Have questions or interested in learning more about us? Our dedicated team is here to assist you.</p>
  <p style="margin-left:260px">Contact Information:Roxxane Jean Mabao</p>
  <p style="margin-left:260px">Address: Philippines</p>
  <p style="margin-left:260px">Phone: 0926-242-4541</p>
  <p style="margin-left:260px">Email: example@gmail.com</p>
  <p style="margin-left:260px">For assistance with our Employee Management System or any inquiries, our customer support team is available:</p>
  <p style="margin-left:260px">Stay updated on the latest news, features, and insights by following us on social media:</p>

  <p style="margin-left:260px">Connect With Us:</p>
<p style="margin-left:260px"><ul>
    <li style="margin-left:260px">Facebook: <a href="https://www.facebook.com/" target="_blank">Visit our Facebook Page</a></li></p>
    <li style="margin-left:260px">Twitter: <a href="https://www.twitter.com/" target="_blank">Follow us on Twitter</a></li></p>
    <li style="margin-left:260px">LinkedIn: <a href="https://www.linkedin.com/" target="_blank">Connect with us on LinkedIn</a></li></p>
</ul></p>

<p style="margin-left:260px">We look forward to hearing from you and exploring how our Employee Management System can contribute to the success of your organization. Thank you for considering [Your Company Name] as your HR partner.</p>
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
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</x-app-layout>
