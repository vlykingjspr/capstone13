
<?php
session_start();
include("../../conn.php");

if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'CAGRO - Administrator') {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fisherfolk') {
    $ff_id = intval($_POST['id']);
    $ff_gender = $_POST['gender'];
    $ff_fname = $_POST['fname'];
    $ff_mname = $_POST['mname'];
    $ff_lname = $_POST['lname'];
    $ff_dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $postal = $_POST['postal'];
    $province = $_POST['province'];
    $municipal = $_POST['municipal'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $ff_OR = $_POST['OR'];
    $u_email = $_POST ['uemail'];
    $fftype = $_POST['AT'];

    if ($_POST['action'] == 'update') {
        $sql_update = "UPDATE fisherfolks SET ff_gender = ?, ff_fname = ?, ff_mname = ?, ff_lname = ?, ff_dob = ?, ff_contact = ?, ff_postall = ?, ff_prov = ?, ff_municipal = ?, ff_barangay = ?,ff_street = ?, ff_OR = ? WHERE ff_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssssssssssssi", $ff_gender, $ff_fname, $ff_mname, $ff_lname, $ff_dob, $contact, $postal, $province, $municipal, $barangay, $street, $ff_OR, $ff_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['message'] = "Fisherfolk Details Updated Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating data: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        header("Location: ../fisherfolks.php");
        exit();
        
    } elseif ($_POST['action'] == 'send_for_approval') {
        $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql_insert2 = "UPDATE fisherfolks SET u_status = ? WHERE ff_id = ?";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssssssss", $ff_gender, $ff_fname, $ff_mname, $ff_lname, $ff_dob, $province, $municipal, $street, $barangay, $ff_OR, $fftype, $u_email);
        
        if ($stmt_insert->execute()) {
            
            $stmt_insert2 = $conn->prepare($sql_insert2);
            $new_status = 3; 
            $stmt_insert2->bind_param("is", $new_status, $ff_id);
            
            if ($stmt_insert2->execute()) {
                $_SESSION['message'] = "Approval Request Sent.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        header("Location: ../fisherfolks.php");
        exit();
        
    } elseif ($_POST['action'] == 'issue_requirements') {
        $sql_status_update = "UPDATE fisherfolks SET u_status = 2 WHERE ff_id = ?";
        $stmt_status_update = $conn->prepare($sql_status_update);
        $stmt_status_update->bind_param("i", $ff_id);
        
        if ($stmt_status_update->execute()) {
            $_SESSION['message'] = "Requirements Issued Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        header("Location: ../fisherfolks.php");
        exit();
    }
}

    elseif (isset($_POST['form_type']) && $_POST['form_type'] == 'fishworker') {

    $fw_id = intval($_POST['id']);  
    $fw_gender = $_POST['gender'];
    $fw_fname = $_POST['fname'];
    $fw_mname = $_POST['mname'];
    $fw_lname = $_POST['lname'];
    $fw_dob = $_POST['dob'];
    $contact = $_POST['contact']; 
    $postal = $_POST['postal'];  
    $province = $_POST['province'];  
    $municipal = $_POST['municipal']; 
    $barangay = $_POST['barangay'];
    $street = $_POST['street']; 
    $fw_OR = $_POST['OR'];
    $locator = $_POST['locator'];
    $fftype = $_POST['AT'];

    if ($_POST['action'] == 'update') {
    $sql_update = "UPDATE fishworkerlicense 
            SET fw_gender = ?, fw_fname = ?, fw_mname = ?, fw_lname = ?, fw_dob = ?, fw_contact = ?, fw_postal = ?, fw_province = ?, fw_municipal = ?, fw_barangay=?, fw_street = ?, fw_OR = ? 
            WHERE fw_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssssssssssi", $fw_gender, $fw_fname, $fw_mname, $fw_lname, $fw_dob, $contact, $postal, $province, $municipal, $barangay, $street, $fw_OR, /*$locator*/ $fw_id);
    $stmt_update->execute();
        if ($stmt_update->execute()) {
            $_SESSION['message'] = "Fishworker Details Updated Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating data: " . $conn->error;
                $_SESSION['message_type'] = "error";
        } 
        header("Location: ../fishworkers.php");
        exit();
    }

    elseif ($_POST['action'] == 'send_for_approval') {
        // Updated INSERT query
        $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql_insert2 = "UPDATE fishworkerlicense SET u_status = ? WHERE fw_id = ?";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssssssssss", $fw_gender, $fw_fname, $fw_mname, $fw_lname, $fw_dob, $province, $municipal, $street, $barangay, $ff_OR, $fftype);
    
        if ($stmt_insert->execute()) {
            
            $stmt_insert2 = $conn->prepare($sql_insert2);
            $new_status = 3; 
            $stmt_insert2->bind_param("is", $new_status, $fw_id);
            
            if ($stmt_insert2->execute()) {
                $_SESSION['message'] = "Approval Request Sent.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        header("Location: ../fishworkers.php");
        exit();
    }
    elseif ($_POST['action'] == 'issue_requirements') {
        $sql_status_update = "UPDATE fishworkerlicense SET u_status = 2 WHERE fw_id = ?";
        $stmt_status_update = $conn->prepare($sql_status_update);
        $stmt_status_update->bind_param("i", $fw_id);
        
        if ($stmt_status_update->execute()) {
            $_SESSION['message'] = "Requirements Issued Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        header("Location: ../fishworkers.php");
        exit();
    }
}

if (isset($_POST['form_type']) && $_POST['form_type'] == 'fishgear') {
    $fg_id = intval($_POST['id']);
    $fg_gender = $_POST['gender'];
    $fg_fname = $_POST['fname'];
    $fg_mname = $_POST['mname'];
    $fg_lname = $_POST['lname'];
    $fg_dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $postal = $_POST['postal'];
    $province = $_POST['province'];
    $municipal = $_POST['municipal'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $fg_OR = $_POST['OR'];
    $u_email = $_POST ['uemail'];
    $fgtype = $_POST['AT'];

    if ($_POST['action'] == 'update') {
        $sql_update = "UPDATE fishinggears SET fg_gender = ?, fg_locfname = ?, fg_locmname = ?, fg_loclname = ?, fg_dob = ?, fg_loccontact = ?, fg_postal = ?, fg_locprov = ?, fg_locmunicipal = ?, fg_locbarangay = ?,fg_locstreet = ?, fg_OR = ? WHERE fg_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssssssssssssi", $fg_gender, $fg_fname, $fg_mname, $fg_lname, $fg_dob, $contact, $postal, $province, $municipal, $barangay, $street, $fg_OR, $fg_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['message'] = "Fishing Gears Details Updated Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating data: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        header("Location: ../fishinggears.php");
        exit();
        
    } elseif ($_POST['action'] == 'send_for_approval') {
        $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql_insert2 = "UPDATE fishinggears SET u_status = ? WHERE fg_id = ?";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssssssss", $fg_gender, $fg_fname, $fg_mname, $fg_lname, $fg_dob, $province, $municipal, $street, $barangay, $fg_OR, $fgtype, $u_email);
        
        if ($stmt_insert->execute()) {
            
            $stmt_insert2 = $conn->prepare($sql_insert2);
            $new_status = 3; 
            $stmt_insert2->bind_param("is", $new_status, $fg_id);
            
            if ($stmt_insert2->execute()) {
                $_SESSION['message'] = "Approval Request Sent.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        header("Location: ../fishinggears.php");
        exit();
        
    } elseif ($_POST['action'] == 'issue_requirements') {
        $sql_status_update = "UPDATE fishinggears SET u_status = 2 WHERE fg_id = ?";
        $stmt_status_update = $conn->prepare($sql_status_update);
        $stmt_status_update->bind_param("i", $fg_id);
        
        if ($stmt_status_update->execute()) {
            $_SESSION['message'] = "Requirements Issued Successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        header("Location: ../fishinggears.php");
        exit();
    }
}

}

?>
