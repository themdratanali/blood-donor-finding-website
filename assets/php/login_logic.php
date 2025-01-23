<?php
// Include the database connection
include 'assets/php/connection.php';

if (isset($_SESSION['user_id'])) {
    // Redirect to profile page
    header("Location: profile.php");
    exit(); // Prevent further script execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database for the user based on the entered email
    $stmt = $conn->prepare("SELECT * FROM donors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Check if the entered password matches the stored password
        if ($user['password'] === $password) {
            // Correct credentials, redirect to the dashboard
            session_start(); // Start the session to store user data
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['username'] = $user['username']; // Store username in session
            header("Location: profile.php"); // Redirect to dashboard
            exit();
        } else {
            // Invalid password
            echo "<p style='color: red;'>Invalid password. Please try again.</p>";
        }
    } else {
        // No user found with the entered email
        echo "<p style='color: red;'>Invalid email. Please try again.</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>