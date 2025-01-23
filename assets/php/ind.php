<?php
function searchDonors($division, $district, $bloodgroup) 
    {
        global $conn;

        $sql = "SELECT fullname, bloodgroup, mobile, email, district, address, last_donation_date
                FROM donors 
                WHERE division = ? AND district = ? AND bloodgroup = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $division, $district, $bloodgroup);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    $division = isset($_POST['division']) ? $_POST['division'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $bloodgroup = isset($_POST['bloodgroup']) ? $_POST['bloodgroup'] : '';
    $results = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $division = $_POST['division'];
        $district = $_POST['district'];
        $bloodgroup = $_POST['bloodgroup'];
        $results = searchDonors($division, $district, $bloodgroup);
    }
?>