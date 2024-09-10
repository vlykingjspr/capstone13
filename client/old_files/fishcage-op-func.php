<?php
if (isset($_POST['submit'])) {
    include("../conn.php");

    // Fetching form data
    $fcfn = $_POST['fcfname'];
    $fcmn = $_POST['fcmname'];
    $fcln = $_POST['fclname'];
    $fcap = $_POST['fcapp'];
    $fcpostal = $_POST['fpostal'];  // New postal data
    
    $fcprov = $_POST['fcprov'];
    $fccity = $_POST['fccity'];
    $fcbrgy = $_POST['fcbrgy'];
    $fcstreet = $_POST['fcstrt'];
    $fccontact = $_POST['fccon'];
    $fccategory = $_POST['fccat'];
    $fccage = $_POST['fccage'];
    $fccultured = $_POST['fccul'];
    $fcdimension = $_POST['fcdem'];
    $fcintended = $_POST['fcint'];
    $fcbname = $_POST['fcbname'];
    $fcbaddress = $_POST['fcbadd'];
    $fcbregister = $_POST['fcbreg'];
    $fccapital = $_POST['fccap'];
    $fcsource = $_POST['fcsrc'];

    $fcprof = $_FILES['fcpics']['name'];
    $tempname = $_FILES['fcpics']['tmp_name'];
    $targetDir = "../uploads/";
    $uniqueName = uniqid() . '-' . basename($fcprof); // Ensure unique filename
    $targetFile = $targetDir . $uniqueName;

    $cemail = $_POST['email'];
    $cpass = $_POST['pass']; // No hashing
    $crole = $_POST['roles'];

    // Ensure the uploads directory exists and is writable
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Validate the file upload
    if ($_FILES['fcpics']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($tempname, $targetFile)) {
            try {
                // SQL query with placeholders
                $fc_sql = "INSERT INTO fishcage (
                    fc_fname, fc_mname, fc_lname, fc_appell, fc_postal, fc_prov, fc_municipal, fc_brgy, fc_street, 
                    fc_contact, fc_invcategory, fc_cagetype, fc_culturedspicies, fc_dimension_size, fc_intendedfor, 
                    fc_businessname, fc_businessadd, fc_businessreg, fc_capitalinv, fc_source, u_profile, u_email, 
                    u_pass, u_role
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                // Prepare statement
                if ($stmt = $conn->prepare($fc_sql)) {
                    // Bind parameters
                    $stmt->bind_param(
                        "ssssssssssssssssssssssss", 
                        $fcfn, $fcmn, $fcln, $fcap, $fcpostal, $fcprov, $fccity, $fcbrgy, $fcstreet, $fccontact, 
                        $fccategory, $fccage, $fccultured, $fcdimension, $fcintended, $fcbname, $fcbaddress, 
                        $fcbregister, $fccapital, $fcsource, $uniqueName, $cemail, $cpass, $crole
                    );

                    // Execute statement
                    if ($stmt->execute()) {
                        
                    } else {
                        echo "<script>alert('Error inserting data');</script>";
                    }

                    // Close statement
                    $stmt->close();
                } else {
                    echo "<script>alert('Error preparing statement');</script>";
                }

                // Close connection
                $conn->close();
            } catch (Exception $e) {
                echo "<script>alert('Error: Please try again later.');</script>";
            }
        } else {
            echo "<script>alert('Failed to move uploaded file.');</script>";
        }
    } else {
        echo "<script>alert('File upload error');</script>";
    }
}

$role1 = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
?>
