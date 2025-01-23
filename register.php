<?php 
session_start();
require 'assets/php/register_logic.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <title>রক্তদাতা নিবন্ধন ফর্ম  - রক্তদাতা বাংলাদেশ</title>
</head>
<body>
    <div class="container">
      <h1>রক্তদাতা নিবন্ধন ফর্ম</h1>
        <form action="register.php" method="post">
            <div class="form-row">
                <label>সম্পূর্ণ নাম<span class="required">*</span></label>
                <input type="text" name="fullname" placeholder="সম্পূর্ণ নাম লিখুন" required>
            </div>
            <div class="form-row">
                <label>এনআইডি<span class="required">*</span></label>
                <input type="text" name="nid" placeholder="আপনার জাতীয় পরিচয়পত্র নম্বর লিখুন" pattern="[0-9]{10,13}" required>
            </div>
            <div class="form-row">
                <label>জন্ম তারিখ<span class="required">*</span></label>
                <input type="date" name="dob" required>
            </div>
            <div class="form-row">
                <div class="gender-group" class="form-row">
                    <label>লিঙ্গ<span class="required">*</span></label>
                    <label style="margin-left: 55px;margin-right: 20px;"><input type="radio" name="gender" value="male" checked>  পুরুষ</label>
                    <label  style="margin-left: 40px;margin-right: 10px;"><input type="radio" name="gender" value="female">  মহিলা</label>
                    <label style="margin-left: 40px;margin-right: 20px;"><input type="radio" name="gender" value="other">  অন্যান্য</label>
                </div>
            </div>        
            <div class="form-row">
                <label>মোবাইল<span class="required">*</span></label>
                <input type="text" name="mobile" placeholder="মোবাইল নম্বর লিখুন" pattern="[0-9]{11}" required>
            </div>
            <div class="form-row">
                <label>ইমেইল<span class="required">*</span></label>
                <input type="email" name="email" placeholder="ইমেইল লিখুন" required>
            </div>       

            <div class="form-row">
                <label>রক্তের গ্রুপ<span class="required">*</span></label>
                <select name="bloodgroup" required>
                    <option value="">ব্লাড গ্রুপ</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div> 
            <div class="form-row">
                <label>বিভাগ<span class="required">*</span></label>
                <select name="division" id="division" required onchange="loadDistricts(this.value)">
                    <option value="">বিভাগ নির্বাচন করুন</option>
                    <option value="Dhaka">ঢাকা</option>
                    <option value="Chattogram">চট্টগ্রাম</option>
                    <option value="Rajshahi">রাজশাহী</option>
                    <option value="Khulna">খুলনা</option>
                    <option value="Sylhet">সিলেট</option>
                    <option value="Barishal">বরিশাল</option>
                    <option value="Rangpur">রংপুর</option>
                    <option value="Mymensingh">ময়মনসিংহ</option>
                </select>
            </div>
            <div class="form-row">
                <label>জেলা<span class="required">*</span></label>
                <select name="district" id="district" required>
                    <option value="">জেলা নির্বাচন করুন</option>
                </select>
            </div>

            <div class="form-row">
                <label>বর্তমান ঠিকানা<span class="required">*</span></label>
                <input type="text" name="address" placeholder="আপনার বর্তমান সম্পূর্ণ ঠিকানা লিখুন" required>
            </div>

            <div class="form-row">
                <label>শেষ রক্তদান<span class="required">*</span></label>
                <input type="date" name="last_donation_date" required>
            </div>
            <div class="form-row">
                <label>পাসওয়ার্ড<span class="required">*</span></label>
                <input type="password" name="password" placeholder="পাসওয়ার্ড লিখুন" required>
            </div>
            <input type="submit" value="রেজিস্ট্রেশন সম্পূর্ণ করুন">
            <p class="text">প্রোফাইল লগইন করুন <a href="login.php"> এখানে ক্লিক করুন</a></p>
        </form>
    </div>
    <script src="assets/js/districts.js"></script>
</body>
</html>