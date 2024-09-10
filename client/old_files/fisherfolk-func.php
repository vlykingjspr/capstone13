<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../conn.php");

    // Collect POST data
    $ffn = $_POST['fffname'];
    $ffmn = $_POST['ffmname'];
    $ffln = $_POST['fflname'];
    $ffap = $_POST['ffappell'];
    $ffpostal = $_POST['fpostal'];
    $fcprov = $_POST['ffprov'];
    $fccity = $_POST['ffcity'];
    $fcbrgy = $_POST['ffbrgy'];
    $fcstreet = $_POST['ffstreet'];
    $fcage = $_POST['ffage'];
    $fdob = $_POST['ffdob'];
    $fres = $_POST['ffresidence'];
    $fgender = $_POST['ffgender'];
    $contact = $_POST['ffcontact'];
    $ffor = $_POST['ffOR'];
    $fforg = $_POST['fforg'];
    $ffmy = $_POST['ffmemberyear'];
    $ffpos = $_POST['fforgpos'];
    
    $ffprof = $_FILES['ffprofile']['name'];
    $tempname = $_FILES['ffprofile']['tmp_name'];
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($ffprof);

    $cemail = $_POST['email'];
    $cpass = $_POST['pass'];
    $crole = $_POST['roles'];
    $status = $_POST['status'];
    $AT = "Fishery License Permit";
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($_FILES['ffprofile']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($tempname, $targetFile)) {
            try {
                $ff_sql = "INSERT INTO fisherfolks (
                    ff_fname, ff_mname, ff_lname, ff_appell, ff_postall, ff_prov, ff_municipal, ff_barangay, ff_street, 
                    ff_age, ff_dob, ff_residence, ff_gender, ff_contact, ff_OR, ff_orgname, 
                    ff_membersince, ff_orgposition, u_profile, u_email, u_pass, u_role, u_status, approval_type
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($ff_sql);
                $stmt->bind_param(
                    "ssssssssssssssssssssssss", 
                    $ffn, $ffmn, $ffln, $ffap, $ffpostal, $fcprov, $fccity, $fcbrgy, $fcstreet, 
                    $fcage, $fdob, $fres, $fgender, $contact, $ffor, $fforg, $ffmy, $ffpos, $targetFile, $cemail, $cpass, $crole, $status, $AT
                );

                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "Error: SQL Execution Error - " . $conn->error;
                }
                
            } catch (Exception $e) {
                echo "Error: Exception - " . $e->getMessage();
            }
        } else {
            echo "Error: Failed to move uploaded file.";
        }
    } else {
        echo "Error: File upload error - " . $_FILES['ffprofile']['error'];
    }
}
?>



