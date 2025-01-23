<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['sess_user_id']) || empty($_SESSION['sess_user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's information
$user_id = $_SESSION['sess_user_id'];
$username = $_SESSION['sess_username'];

// Database connection
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bld_dntn"; // your database name

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from the database
$sql = "SELECT * FROM donors WHERE id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>User Dashboard</title>
</head>
<body>
<div class="header">
    <div id="logo">
        <img src="logo.png" alt="Logo">
    </div>
    <div id="nav">
        <ul>
            <li><a href="index.php">রক্তদাতা খুঁজুন</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <h1>Welcome, <?php echo $user['fullname']; ?>!</h1>
    <h2>Your Dashboard</h2>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['mobile']; ?></p>
    <p><strong>Blood Group:</strong> <?php echo $user['bloodgroup']; ?></p>
    <p><strong>Division:</strong> <?php echo $user['division']; ?></p>
    <p><strong>District:</strong> <?php echo $user['district']; ?></p>
</div>

<footer>
    © 2024 Your Organization. All Rights Reserved.
</footer>

</body>
</html>

<?php
$conn->close();
?>
