<?php
    session_start();
    require 'assets/php/connection.php';
    require 'assets/php/count.php';
    require 'assets/php/ind.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>রক্তবন্ধু বাংলাদেশ</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="header">
    <div id="logo">
        <img src="logo.png" alt="রক্তবন্ধু">
    </div>
    <div id="nav">
        <ul>
            <li><a href="index.php">হোম</a></li>
            <li><a href="index.php">আমাদের সম্পর্কে</a></li>
            <li><a href="index.php">রক্তদাতা খুঁজুন</a></li>
            <li><a href="login.php" target="_blank">রেজিস্ট্রেশন</a></li>
        </ul>
    </div>
</div>

<div class="container" id="homePage">
    <form action="index.php" method="post">
        <select name="division" id="division" onchange="updateDistricts(this.value)" required>
            <option value="">বিভাগ নির্বাচন করুন</option>
            <option value="Dhaka" <?php echo ($division == "Dhaka" ? 'selected' : ''); ?>>ঢাকা</option>
            <option value="Chattogram" <?php echo ($division == "Chattogram" ? 'selected' : ''); ?>>চট্টগ্রাম</option>
            <option value="Rajshahi" <?php echo ($division == "Rajshahi" ? 'selected' : ''); ?>>রাজশাহী</option>
            <option value="Khulna" <?php echo ($division == "Khulna" ? 'selected' : ''); ?>>খুলনা</option>
            <option value="Sylhet" <?php echo ($division == "Sylhet" ? 'selected' : ''); ?>>সিলেট</option>
            <option value="Barishal" <?php echo ($division == "Barishal" ? 'selected' : ''); ?>>বরিশাল</option>
            <option value="Rangpur" <?php echo ($division == "Rangpur" ? 'selected' : ''); ?>>রংপুর</option>
            <option value="Mymensingh" <?php echo ($division == "Mymensingh" ? 'selected' : ''); ?>>ময়মনসিংহ</option>
        </select>

        <select name="district" id="district" required>
            <option value="">জেলা নির্বাচন করুন</option>
        </select>

        <select name="bloodgroup" required>
            <option value="">রক্ত গ্রুপ নির্বাচন করুন</option>
            <option value="A+" <?php echo ($bloodgroup == "A+" ? 'selected' : ''); ?>>এ+</option>
            <option value="A-" <?php echo ($bloodgroup == "A-" ? 'selected' : ''); ?>>এ−</option>
            <option value="B+" <?php echo ($bloodgroup == "B+" ? 'selected' : ''); ?>>বি+</option>
            <option value="B-" <?php echo ($bloodgroup == "B-" ? 'selected' : ''); ?>>বি−</option>
            <option value="O+" <?php echo ($bloodgroup == "O+" ? 'selected' : ''); ?>>ও+</option>
            <option value="O-" <?php echo ($bloodgroup == "O-" ? 'selected' : ''); ?>>ও−</option>
            <option value="AB+" <?php echo ($bloodgroup == "AB+" ? 'selected' : ''); ?>>এবি+</option>
            <option value="AB-" <?php echo ($bloodgroup == "AB-" ? 'selected' : ''); ?>>এবি−</option>
        </select>
        <input type="submit" value="অনুসন্ধান">
    </form>

    <?php if (!empty($results)): ?>
        <h2>ফলাফল</h2>
        <table>
            <thead>
                <tr>
                    <th>নাম</th>
                    <th>রক্তের গ্রুপ</th>
                    <th>মোবাইল</th>
                    <th>জেলা</th>
                    <th>বর্তমান ঠিকানা</th>
                    <th>শেষ রক্তদান</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['bloodgroup']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['last_donation_date']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<!-- Footer Section -->
<footer>
  <div class="footer-container">
    <ul class="footer-links">
        <li><a href="#">পরিসংখ্যা</a></li>
        <li><a href="#">ব্যবহারের শর্তাবলি</a></li>
    </ul>
         <hr>
    <p class="footer-credit">পরিকল্পনা ও বাস্তবায়নে, মোঃ রতন আলী</p>
  </div>
</footer>
<script>
     const districts = {
        Dhaka: [
            { value: "Dhaka", text: "ঢাকা" },
            { value: "Faridpur", text: "ফরিদপুর" },
            { value: "Gazipur", text: "গাজীপুর" },
            { value: "Gopalganj", text: "গোপালগঞ্জ" },
            { value: "Kishoreganj", text: "কিশোরগঞ্জ" },
            { value: "Madaripur", text: "মাদারিপুর" },
            { value: "Manikganj", text: "মানিকগঞ্জ" },
            { value: "Munshiganj", text: "মুন্সিগঞ্জ" },
            { value: "Mymensingh", text: "ময়মনসিংহ" },
            { value: "Narail", text: "নড়াইল" },
            { value: "Narshingdi", text: "নরসিংদী" },
            { value: "Netrokona", text: "নেত্রকোনা" },
            { value: "Shariatpur", text: "শরীয়তপুর" },
            { value: "Tangail", text: "টাঙ্গাইল" }
        ],
        Chattogram: [
            { value: "Bandarban", text: "বান্দরবান" },
            { value: "Bhola", text: "ভোলা" },
            { value: "Bagerhat", text: "বাগেরহাট" },
            { value: "Chattogram", text: "চট্টগ্রাম" },
            { value: "Chuadanga", text: "চুয়াডাঙ্গা" },
            { value: "Comilla", text: "কুমিল্লা" },
            { value: "CoxsBazar", text: "কক্সবাজার" },
            { value: "Feni", text: "ফেনী" },
            { value: "Khagrachari", text: "খাগড়াছড়ি" },
            { value: "Lakshmipur", text: "লক্ষ্মীপুর" },
            { value: "Noakhali", text: "নোয়াখালী" },
            { value: "Rangamati", text: "রাঙ্গামাটি" }
        ],
        Rajshahi: [
            { value: "Bogura", text: "বগুড়া" },
            { value: "Chapainawabganj", text: "চাপাইনবাবগঞ্জ" },
            { value: "Joypurhat", text: "জয়পুরহাট" },
            { value: "Naogaon", text: "নওগাঁ" },
            { value: "Pabna", text: "পাবনা" },
            { value: "Rajbari", text: "রাজবাড়ী" },
            { value: "Rajshahi", text: "রাজশাহী" },
            { value: "Sirajganj", text: "সিরাজগঞ্জ" }
        ],
        Khulna: [
            { value: "Bagerhat", text: "বাগেরহাট" },
            { value: "Chuadanga", text: "চুয়াডাঙ্গা" },
            { value: "Jessore", text: "যশোর" },
            { value: "Jhenaidah", text: "ঝিনাইদহ" },
            { value: "Khulna", text: "খুলনা" },
            { value: "Kushtia", text: "কুষ্টিয়া" },
            { value: "Meherpur", text: "মেহেরপুর" },
            { value: "Satkhira", text: "সাতক্ষীরা" }
        ],
        Sylhet: [
            { value: "Habiganj", text: "হবিগঞ্জ" },
            { value: "Moulvibazar", text: "মৌলভীবাজার" },
            { value: "Sunamganj", text: "সুনামগঞ্জ" },
            { value: "Sylhet", text: "সিলেট" }
        ],
        Barishal: [
            { value: "Barishal", text: "বরিশাল" },
            { value: "Patuakhali", text: "পটুয়াখালী" },
            { value: "Bhola", text: "ভোলা" },
            { value: "Jhalokati", text: "ঝালকাঠি" },
            { value: "Borguna", text: "বরগুনা" },
            { value: "Pirojpur", text: "পিরোজপুর" }
        ],
        Rangpur: [
            { value: "Rangpur", text: "রংপুর" },
            { value: "Kurigram", text: "কুড়িগ্রাম" },
            { value: "Gaibandha", text: "গাইবান্ধা" },
            { value: "Dinajpur", text: "দিনাজপুর" },
            { value: "Thakurgaon", text: "ঠাকুরগাঁও" },
            { value: "Lalmonirhat", text: "লালমনিরহাট" },
            { value: "Nilphamari", text: "নীলফামারী" },
            { value: "Panchagarh", text: "পঞ্চগড়" }
        ],
        Mymensingh: [
            { value: "Mymensingh", text: "ময়মনসিংহ" },
            { value: "Jamalpur", text: "জামালপুর" },
            { value: "Netrokona", text: "নেত্রকোনা" },
            { value: "Sherpur", text: "শেরপুর" }
        ]
    };

    function updateDistricts(division) {
        const districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '<option value="">জেলা নির্বাচন করুন</option>';
        if (division && districts[division]) {
            districts[division].forEach(district => {
                const option = document.createElement('option');
                option.value = district.value; // Correctly set the value
                option.textContent = district.text; // Correctly set the text
                districtSelect.appendChild(option);
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const division = "<?php echo $division; ?>";
        const selectedDistrict = "<?php echo $district; ?>";
        
        if (division) {
            updateDistricts(division);
            if (selectedDistrict) {
                document.getElementById('district').value = selectedDistrict;
            }
        }
    });
    
    function showSummary(event) {
        event.preventDefault(); // Prevent default link behavior
        document.getElementById('homePage').classList.add('hidden'); // Hide home page content
        document.getElementById('summarySection').classList.remove('hidden'); // Show summary section
    }
</script>
</body>
</html>
