<?php
include("connection.php");

echo "<h3>COVID Tests Debug</h3>";

// چیک کریں کہ tests ہیں یا نہیں
$query = "SELECT COUNT(*) as total FROM tbl_test";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc($result);

echo "Total tests in database: " . $data['total'] . "<br><br>";

// تفصیلی ڈیٹا
$detail_query = "SELECT * FROM tbl_test";
$detail_result = mysqli_query($connection, $detail_query);

echo "Detailed tests:<br>";
while($row = mysqli_fetch_assoc($detail_result)) {
    echo "ID: " . $row['id'] . " | Patient ID: " . $row['p_id'] . " | Hospital ID: " . $row['h_id'] . " | Result: " . $row['result'] . "<br>";
}
?>