<?php
session_start();
include("../../conn.php");

if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'CAGRO - Administrator') {
    header("location: ../../login.php");
    exit();
}

if (isset($_POST['ff_id'])) {
    $ff_id = intval($_POST['ff_id']);
    $sql = "SELECT u_status FROM fisherfolks WHERE ff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => $row['u_status']]);
    } else {
        echo json_encode(['status' => null]);
    }
} else if (isset($_POST['fw_id'])) {
    $ff_id = intval($_POST['fw_id']);
    $sql = "SELECT u_status FROM fishworkerlicense WHERE fw_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => $row['u_status']]);
    } else {
        echo json_encode(['status' => null]);
    }
}
else if (isset($_POST['fg_id'])) {
    $ff_id = intval($_POST['fg_id']);
    $sql = "SELECT u_status FROM fishinggears WHERE fg_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => $row['u_status']]);
    } else {
        echo json_encode(['status' => null]);
    }
}
?>