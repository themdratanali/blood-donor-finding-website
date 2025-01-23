<?php
$totalCount = 0;
$divisionCounts = [];

$totalCountQuery = "SELECT COUNT(*) AS total FROM donors";
$resultTotal = $conn->query($totalCountQuery);
if ($resultTotal->num_rows > 0) {
    $totalCount = $resultTotal->fetch_assoc()['total'];
}

$divisionQuery = "SELECT division, COUNT(*) AS count FROM donors GROUP BY division";
$resultDivision = $conn->query($divisionQuery);
if ($resultDivision->num_rows > 0) {
    while ($row = $resultDivision->fetch_assoc()) {
        $divisionCounts[$row['division']] = $row['count'];
    }
}
?>
