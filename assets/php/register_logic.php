<?php
include 'assets/php/connection.php';  // Database connection

if (isset($_SESSION['user_id'])) {
    // Redirect to profile page
    header("Location: profile.php");
    exit(); // Prevent further script execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $nid = mysqli_real_escape_string($conn, $_POST['nid']); // National ID
    $dob = $_POST['dob']; // Date of Birth
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']); // Current address
    $last_donation_date = $_POST['last_donation_date']; // Last donation date
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Plain text password

    // Validation
    // Inline email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('<script>alert("ইমেইল ফরম্যাট সঠিক নয়!"); window.history.back();</script>');
    }

    // Inline mobile number validation
    if (!preg_match("/^[0-9]{11}$/", $mobile)) {
        die('<script>alert("মোবাইল নম্বর সঠিক নয়!"); window.history.back();</script>');
    }

    // Validate National ID
    if (!preg_match("/^[0-9]{9,15}$/", $nid)) {
        die('<script>alert("এনআইডি ফরম্যাট সঠিক নয়!"); window.history.back();</script>');
    }

    // Check if email or NID already exists
    $checkDuplicate = $conn->prepare("SELECT * FROM donors WHERE email = ? OR nid = ?");
    $checkDuplicate->bind_param("ss", $email, $nid);
    $checkDuplicate->execute();
    $result = $checkDuplicate->get_result();
    if ($result->num_rows > 0) {
        die('<script>alert("এই ইমেইল বা এনআইডি ইতিমধ্যে নিবন্ধিত!"); window.history.back();</script>');
    }

    // Validate password strength
    if (strlen($password) < 6) {
        die('<script>alert("পাসওয়ার্ড কমপক্ষে ৮ অক্ষরের হতে হবে!"); window.history.back();</script>');
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO donors (fullname, nid, dob, gender, bloodgroup, mobile, email, division, district, address, last_donation_date, password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $fullname, $nid, $dob, $gender, $bloodgroup, $mobile, $email, $division, $district, $address, $last_donation_date, $password);

    if ($stmt->execute()) {
        echo '<script>alert("নিবন্ধন সফল হয়েছে!"); window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("নিবন্ধন ব্যর্থ হয়েছে! আবার চেষ্টা করুন।"); window.history.back();</script>';
    }

    $stmt->close();
    $conn->close();
}
?>