<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../../conn.php"); // 

    
    if (!isset($_SESSION["user"])) {
        echo "User not logged in.";
        exit();
    }

    $fgfn = htmlspecialchars($_POST['fg_fname']);
    $fgmn = htmlspecialchars($_POST['fg_mname']);
    $fgln = htmlspecialchars($_POST['fg_lname']);
    $fgap = htmlspecialchars($_POST['fg_appell']);
    $fgpos = htmlspecialchars($_POST['fgpostal']);
    $fgprov = htmlspecialchars($_POST['fg_prov']);
    $fgcity = htmlspecialchars($_POST['fg_city']);
    $fgbrgy = htmlspecialchars($_POST['fg_brgy']);
    $fgstreet = htmlspecialchars($_POST['fg_street']);
    $fgcontact = htmlspecialchars($_POST['fg_contact']);
    $fgOR = htmlspecialchars($_POST['fg_OR']);
    $fggender = htmlspecialchars($_POST['fg_gender']);
    $fgtype = isset($_POST['fg_type']) ? htmlspecialchars($_POST['fg_type']) : null;    
    $fgwing = htmlspecialchars($_POST['fg_wing']);
    $fgcenter = htmlspecialchars($_POST['fg_center']);
    $fgother = htmlspecialchars($_POST['fg_other']);
    $fgemail = htmlspecialchars($_POST['u_email']);
    $u_status = 1;
    $AT = "Fishing Gear Permit";

    $fg_sql = "INSERT INTO fishinggears (fg_locfname, fg_locmname, fg_loclname, fg_locappel, fg_postal, fg_locprov, fg_locmunicipal, fg_locbarangay, fg_locstreet, fg_loccontact, fg_OR, fg_gender, fg_type, fg_wing, fg_centerline, fg_otherspec, u_email, u_status, approval_type) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($fg_sql)) {
        $stmt->bind_param("ssssisssssissssssis", $fgfn, $fgmn, $fgln, $fgap, $fgpos, $fgprov, $fgcity, $fgbrgy, $fgstreet, $fgcontact, $fgOR, $fggender, $fgtype, $fgwing, $fgcenter, $fgother, $fgemail, $u_status, $AT);

        if ($stmt->execute()) {
            // Log the user action
            logUserAction($_SESSION["user"], 'Fishing Gear Permit Registration Sent');
            echo "success";
        } else {
            echo "Error: SQL Execution Error - " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo '<script type="text/javascript">
                alert("Error preparing statement: ' . $conn->error . '");
              </script>';
    }
    
    $conn->close();
}

function logUserAction($userEmail, $action) {
    global $conn;

    if ($userEmail === null || $userEmail === '') {
        echo "User email is not set.";
        return;
    }

    if ($stmt = $conn->prepare("INSERT INTO activity_logs (user_email, action, timestamp) VALUES (?, ?, NOW())")) {
        $stmt->bind_param("ss", $userEmail, $action);
        if (!$stmt->execute()) {
            echo "Error logging action: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing log statement: " . $conn->error;
    }
}
?>
