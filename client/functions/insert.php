<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../../conn.php"); 
    
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : '';

    if ($formType === 'fisherfolk'){ 

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
        $targetDir = "../../uploads/";
        $targetFile = $targetDir . basename($ffprof);
        $filename = basename($ffprof);

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
                        $fcage, $fdob, $fres, $fgender, $contact, $ffor, $fforg, $ffmy, $ffpos, $filename, $cemail, $cpass, $crole, $status, $AT
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
    
    else if ($formType === 'fishworker'){
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
    $targetDir = "../../uploads/";
    $targetFile = $targetDir . basename($fprof);
    $filename = basename($fprof);

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
                        $funitsdimen, $filename, $email, $pass, $role, $status
                    );

                    if ($stmt->execute()) {
                        echo "success";
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

else if ($formType === 'fishcage')
{
    $fcfn = $_POST['fcfname'];
    $fcmn = $_POST['fcmname'];
    $fcln = $_POST['fclname'];
    $fcap = $_POST['fcapp'];
    $fcpostal = $_POST['fpostal'];  
    
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
    $filename = basename($fcprof);

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
                            $fcbregister, $fccapital, $fcsource, $filename, $cemail, $cpass, $crole
                        );

                        // Execute statement
                        if ($stmt->execute()) {
                            echo "success";
                        } else {
                            echo "Error: SQL Execution Error - " . $conn->error;
                        }
                    } 

                    // Close connection
                  
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
    
}