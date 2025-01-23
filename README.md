<h2>Project Overview</h2>
<p>The Blood Donor Finder website is a platform designed to connect blood donors with recipients efficiently. Users can search for blood donors based on location and blood type, while donors can register to be part of the database.</p>

<h2>Features</h2>
<ul>
    <li><strong>User Registration:</strong> Donors can register by providing personal details and blood group information.</li>
    <li><strong>Search Functionality:</strong> Search for donors by division, district, and blood group.</li>
    <li><strong>Admin Panel:</strong> Manage donor records, update information, and view statistics.</li>
    <li><strong>Responsive Design:</strong> Accessible on various devices with a user-friendly interface.</li>
</ul>

<h2>Technologies Used</h2>
<ul>
    <li><strong>Frontend:</strong> HTML, CSS, JavaScript</li>
    <li><strong>Backend:</strong> PHP (Core PHP)</li>
    <li><strong>Database:</strong> MySQL (phpMyAdmin via XAMPP)</li>
    <li><strong>Version Control:</strong> GitHub</li>
</ul>

<h2>Installation Instructions</h2>

<h3>Prerequisites</h3>
<ul>
    <li>XAMPP (for Apache and MySQL)</li>
    <li>PHP (at least version 7.4)</li>
    <li>Git (for cloning the repository)</li>
</ul>

<h3>Steps to Install</h3>
<ol>
    <li>Clone the repository from GitHub:
        <pre><code>git clone https://github.com/yourusername/blood-donor-finder.git</code></pre>
    </li>
    <li>Move the project folder to your XAMPP <code>htdocs</code> directory.</li>
    <li>Start the Apache and MySQL services using XAMPP Control Panel.</li>
    <li>Import the database:
        <ul>
            <li>Open <code>phpMyAdmin</code> and create a new database named <code>bld_dntn</code>.</li>
            <li>Import the <code>bld_dntn.sql</code> file provided in the <code>database</code> folder.</li>
        </ul>
    </li>
    <li>Update database connection details in <code>assets/php/connection.php</code>:
        <pre><code>$host = 'localhost';</code></pre></li>

<h2>Usage Instructions</h2>
<ul>
    <li><strong>Donor Registration:</strong> Navigate to the registration page and provide necessary details.</li>
    <li><strong>Search Donors:</strong> Select your division, district, and blood group to find donors.</li>
    <li><strong>Admin Login:</strong> Access the admin dashboard to manage records (Default credentials: admin/Password).</li>
</ul>

<h2>Contribution</h2>
<p>Feel free to contribute to the project by submitting pull requests on GitHub.</p>

<h2>License</h2>
<p>This project is licensed under the MIT License.</p>

<h2>Contact</h2>
<p>For any inquiries, please contact <a href="mailto:themdratanali@gmail.com">themdratanali@gmail.com</a>.</p>
<p><strong>Project Developed by:</strong> <a href="https://mdratanali.com/"> Md. Ratan Ali </a></p>
