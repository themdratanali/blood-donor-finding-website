<?php
session_start();
require 'assets/php/connection.php'; 
require 'assets/php/login_logic.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <title>রক্তদাতা লগইন ফর্ম  - রক্তদাতা বাংলাদেশ</title>
</head>
<body>
    <div class="container-login">
        <h1>রক্তদাতা লগইন ফর্ম</h1>
        <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
        <form action="login.php" method="post">
            <label>ব্যবহারকারীর নাম<span class="required">*</span></label>
            <input type="email" name="email" placeholder="ব্যবহারকারীর নাম লিখুন" required>

            <label>পাসওয়ার্ড<span class="required">*</span></label>
            <input type="password" name="password" placeholder="পাসওয়ার্ড লিখুন" required>

            <input type="submit" value="লগইন">
        </form>
        <p class="text">রেজিস্ট্রেশন করতে চান? <a href="register.php">এখানে ক্লিক করুন</a></p>
    </div>
</body>
</html>