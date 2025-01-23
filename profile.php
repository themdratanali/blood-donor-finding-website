<?php
include 'assets/php/profile_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
    <title>প্রোফাইল</title>
</head>
<body>

<form action="profile.php" method="POST" id="profileForm">
    <h1>Welcome to your profile</h1>

    <div class="profile-info">
        <strong>নাম:</strong>
        <span id="fullnameDisplay"><?php echo $user['fullname']; ?></span>
        <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('fullname')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>জাতীয় পরিচয়পত্র নম্বর:</strong>
        <span id="nidDisplay"><?php echo $user['nid']; ?></span>
        <input type="text" id="nid" name="nid" value="<?php echo $user['nid']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('nid')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>জন্ম তারিখ:</strong>
        <span id="dobDisplay"><?php echo $user['dob']; ?></span>
        <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('dob')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>লিঙ্গ:</strong>
        <span id="genderDisplay"><?php echo $user['gender']; ?></span>
        <select id="gender" name="gender" class="hidden" required>
            <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
        </select>
        <span class="edit-btn" onclick="editField('gender')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>রক্তের গ্রুপ:</strong>
        <span id="bloodgroupDisplay"><?php echo $user['bloodgroup']; ?></span>
        <input type="text" id="bloodgroup" name="bloodgroup" value="<?php echo $user['bloodgroup']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('bloodgroup')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>মোবাইল:</strong>
        <span id="mobileDisplay"><?php echo $user['mobile']; ?></span>
        <input type="text" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('mobile')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>ইমেইল:</strong>
        <span id="emailDisplay"><?php echo $user['email']; ?></span>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('email')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>বিভাগ:</strong>
        <span id="divisionDisplay"><?php echo $user['division']; ?></span>
        <input type="text" id="division" name="division" value="<?php echo $user['division']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('division')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>জেলা:</strong>
        <span id="districtDisplay"><?php echo $user['district']; ?></span>
        <input type="text" id="district" name="district" value="<?php echo $user['district']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('district')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>ঠিকানা:</strong>
        <span id="addressDisplay"><?php echo $user['address']; ?></span>
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('address')">Edit</span>
    </div>

    <div class="profile-info">
        <strong>সর্বশেষ রক্তদান তারিখ:</strong>
        <span id="lastDonationDateDisplay"><?php echo $user['last_donation_date']; ?></span>
        <input type="date" id="last_donation_date" name="last_donation_date" value="<?php echo $user['last_donation_date']; ?>" class="hidden" required>
        <span class="edit-btn" onclick="editField('last_donation_date')">Edit</span>
    </div>

    <div class="profile-info">
        <input type="submit" value="Save Changes" class="hidden" id="saveBtn">
    </div>
</form>


    <a href="logout.php">Logout</a> <!-- Logout link -->

    <script>
        // Function to toggle edit mode for fields
        function editField(fieldId) {
            // Hide the display element and show the input element for the specific field
            document.getElementById(fieldId + 'Display').classList.add('hidden');
            document.getElementById(fieldId).classList.remove('hidden');
            document.getElementById('saveBtn').classList.remove('hidden');
        }
    </script>

</body>
</html>
