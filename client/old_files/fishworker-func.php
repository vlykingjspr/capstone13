<?php
if (isset($_POST['submit'])) {
    include("../conn.php");

    $fsalute = $_POST['fwsalute'];
    $fname = $_POST['fwFname'];
    $fMname = $_POST['fwMname'];
    $fLname = $_POST['fwLname'];
    $fappell = $_POST['fwappel'];
    $fpostal = $_POST['fwpost'];
    $fprovince = $_POST['fwprov'];
    $fcity = $_POST['fwcity'];
    $fbrgy = $_POST['fwbrgy'];
    $fstreet = $_POST['fwstreet'];
    $fgender = $_POST['fwgender'];
    $fage = $_POST['fwage'];
    $fdob = $_POST['fwdob'];
    $fcontact = $_POST['fwcontact'];
    $fOR = $_POST['fwOR'];
    $fcrtk = $_POST['fwcrtkof'];
    $fcrtksince = $_POST['fwcrtksince'];
    $fcrtkloc = $_POST['fwcrtkloc'];
    $faqua = $_POST['fwaqua'];
    $faqua2 = $_POST['fwaqua2'];
    $funits = $_POST['fwunits'];
    $funitsdimen = $_POST['fwunitsdim'];

    $fprof = $_FILES['fwprofile']['name'];
    $tempname = $_FILES['fwprofile']['tmp_name'];
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($fprof);

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['roles'];
    $status = $_POST['status'];

    // Locator_investor
    $locfn = $_POST['locfname'];
    $locmn = $_POST['locmiddle'];
    $locln = $_POST['loclast'];
    $locap = $_POST['locappel'];
    $locprov = $_POST['locprov'];
    $loccity = $_POST['loccity'];
    $locbrgy = $_POST['locbrgy'];
    $locstreet = $_POST['locstreet'];
    $locunits = $_POST['locunits'];

    // Ensure the uploads directory exists and is writable
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Validate the file upload
    if ($_FILES['fwprofile']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($tempname, $targetFile)) {
            try {
                $conn->begin_transaction();

                $fw_sql = "INSERT INTO fishworkerlicense (
                    fw_fname, fw_mname, fw_lname, fw_appell, fw_province, fw_municipal, fw_barangay, fw_street, fw_gender, 
                    fw_age, fw_dob, fw_contact, fw_OR, fw_caretakerof, fw_caretakersince, fw_location, fw_aquaculture, 
                    fw_FLA_Private, fw_unitsmanaged, fw_unitdeminsions, u_profile, u_email, u_pass, u_role, u_status
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($fw_sql);
                $stmt->bind_param(
                    'sssssssssssssssssssssssss', $fname, $fMname, $fLname, $fappell, $fprovince, $fcity, $fbrgy, $fstreet, 
                    $fgender, $fage, $fdob, $fcontact, $fOR, $fcrtk, $fcrtksince, $fcrtkloc, $faqua, $faqua2, $funits, 
                    $funitsdimen, $fprof, $email, $pass, $role, $status
                );

                if ($stmt->execute()) {
                    $user_id = $stmt->insert_id;

                    $ec_sql = "INSERT INTO locatorinvestor (
                        fw_id, loc_fname, loc_mname, loc_lname, loc_appell, loc_prov, loc_municipal, loc_brgy, loc_street, loc_units
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt = $conn->prepare($ec_sql);
                    $stmt->bind_param(
                        'isssssssss', $user_id, $locfn, $locmn, $locln, $locap, $locprov, $loccity, $locbrgy, $locstreet, $locunits
                    );

                    if ($stmt->execute()) {
                        $conn->commit();
                        
                    } else {
                        $conn->rollback();
                        echo '<script type="text/javascript">
                            alert("Error inserting Locator data: ' . $stmt->error . '");
                            </script>';
                    }
                } else {
                    $conn->rollback();
                    echo '<script type="text/javascript">
                        alert("Error inserting Fishworker data: ' . $stmt->error . '");
                        </script>';
                }

                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                $conn->rollback();
                echo '<script type="text/javascript">
                    alert("Error: ' . $conn->error . '");
                    </script>';
            }
        } else {
            echo '<script type="text/javascript">
                alert("Failed to move uploaded file.");
                </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("File upload error: ' . $_FILES['fwprofile']['error'] . '");
            </script>';
    }
}
?>