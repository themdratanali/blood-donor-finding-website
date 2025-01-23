<?php
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);

    $query = "SELECT * FROM donors WHERE 1=1";

    if (!empty($division)) {
        $query .= " AND division = '$division'";
    }
    if (!empty($district)) {
        $query .= " AND district = '$district'";
    }
    if (!empty($bloodgroup)) {
        $query .= " AND bloodgroup = '$bloodgroup'";
    }

    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<?php
function searchDonors($division, $district, $bloodgroup) {
    global $conn;

    $sql = "SELECT fullname, bloodgroup, mobile, email, district 
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $division = $_POST['division'];
    $district = $_POST['district'];
    $bloodgroup = $_POST['bloodgroup'];
    $results = searchDonors($division, $district, $bloodgroup);
}
?>
