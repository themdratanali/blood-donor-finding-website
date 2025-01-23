<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection
include 'assets/php/connection.php';

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Query to get the user details
$stmt = $conn->prepare("SELECT * FROM donors WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch the user data
} else {
    echo "User not found.";
    exit();
}

$stmt->close();

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $nid = mysqli_real_escape_string($conn, $_POST['nid']);
    $dob = $_POST['dob'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $last_donation_date = $_POST['last_donation_date'];

    // Prepare SQL statement to update user data
    $stmt = $conn->prepare(
        "UPDATE donors 
        SET fullname = ?, nid = ?, dob = ?, gender = ?, bloodgroup = ?, 
            mobile = ?, email = ?, division = ?, district = ?, address = ?, 
            last_donation_date = ? 
        WHERE id = ?"
    );
    $stmt->bind_param(
        "sssssssssssi", 
        $fullname, $nid, $dob, $gender, $bloodgroup, 
        $mobile, $email, $division, $district, $address, 
        $last_donation_date, $user_id
    );

    // Execute the update query
    if ($stmt->execute()) {
        echo '<script>alert("Profile updated successfully!");</script>';
        // Reload the page to reflect updated data
        header("Refresh:0");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
