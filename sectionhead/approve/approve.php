<?php
session_start();
include("../../conn.php");

if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'Section Head') {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'insert') {
        
        $id = $_POST['u_id'];
        $gender = $_POST['gender'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $province = $_POST['province'];
        $municipal = $_POST['municipal'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $or_number = $_POST['OR'];
        $fftype = $_POST['AT'];  
        $u_email = $_POST['u_email'];
        
       
        $conn->begin_transaction();

        try {
          
            $stmt = $conn->prepare("INSERT INTO licensing (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $gender, $fname, $mname, $lname, $dob, $province, $municipal, $street, $barangay, $or_number, $fftype);

            if ($stmt->execute()) {
                
                updateOtherTables($conn, $u_email, $fftype);
  
                $delete_stmt = $conn->prepare("DELETE FROM section_head WHERE client_id = ?");
                $delete_stmt->bind_param("s", $id);

                if ($delete_stmt->execute()) {
                    
                    $conn->commit();
                    header("Location: ../dashboard.php");
                    exit(); 
                } else {
                    throw new Exception("Error deleting row: " . $delete_stmt->error);
                }
            } else {
                throw new Exception("Error inserting row: " . $stmt->error);
            }
        } catch (Exception $e) {
           
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }

        $stmt->close();
        $delete_stmt->close();
        $conn->close();
    }
}


function updateOtherTables($conn, $u_email, $fftype) {
  
    $tables = ['fishinggears', 'fisherfolks', 'fishworkerlicense']; 

    foreach ($tables as $table) {
        $update_stmt = $conn->prepare("UPDATE $table SET u_status = 4, issuance_date = NOW() WHERE u_email = ? AND approval_type = ?");
        $update_stmt->bind_param("ss", $u_email, $fftype);
        
        if ($update_stmt->execute()) {
            if ($update_stmt->affected_rows > 0) {
                echo "Updated $table with a timestamp.<br>";
            } else {
                echo "No matching records found in $table.<br>";
            }
        } else {
            echo "Error updating $table: " . $update_stmt->error . "<br>";
        }
        
        $update_stmt->close();
    }
}

?>