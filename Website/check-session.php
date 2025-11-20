<?php
session_start();
header('Content-Type: application/json');

if(isset($_SESSION['patient_session'])) {
    echo json_encode(['loggedin' => true]);
} else {
    echo json_encode(['loggedin' => false]);
}
?>