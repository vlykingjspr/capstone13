<?php
    if (isset($_POST['submit'])) 
    {
        include("../conn.php");
        $ffn = $_POST['fffname']; // ff_fname
        $ffmn = $_POST['ffmname']; // ff_mname
        $ffln = $_POST['fflname']; // ff_lname
        $ffap = $_POST['ffappell']; // ff_appell
        $fcprov = $_POST['ffprov']; // ff_prov
        $fccity = $_POST['ffcity']; // ff_municipal
        $fcbrgy = $_POST['ffbrgy']; // ff_barangay
        $fcstreet = $_POST['ffstreet']; // ff_street
        $fcage = $_POST['ffage']; // ff_age
        $fdob = $_POST['ffdob']; // ff_dob
        $fres = $_POST['ffresidence']; // ff_residence
        $fgender = $_POST['ffgender']; // ff_gender
        $contact = $_POST['ffcontact']; // ff_contact
        $ffor = $_POST['ffOR']; // ff_OR
        $fforg = $_POST['fforgname']; // ff_orgname
        $ffmy = $_POST['ffmemberyear']; // ff_membersince
        $ffpos = $_POST['fforgpos']; // ff_orgposition

        $ffprof = $_FILES["ffprofile"]["name"];
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($ffprof);

        $cemail = $_POST['email2']; // u_email
        $cpass = $_POST['pass2']; // u_pass
        $crole = $_POST['roles2']; // u_role

        try {
            // Prepare SQL and bind parameters
            $ff_sql = "INSERT INTO fisherfolks (
                ff_fname, ff_mname, ff_lname, ff_appell, ff_prov, ff_municipal, ff_barangay, ff_street, ff_age, 
                ff_dob, ff_residence, ff_gender, ff_contact, ff_OR, ff_orgname, 
                ff_membersince, ff_orgposition, u_profile, u_email, u_pass, u_role
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($ff_sql);
            $stmt->bind_param(
                'sssssssssssssssssssss', $ffn, $ffmn, $ffln, $ffap, $fcprov, $fccity, $fcbrgy, $fcstreet, $fcage, 
                $fdob, $fres, $fgender, $contact, $ffor, $fforg, $ffmy, $ffpos, $ffprof, $cemail, $cpass, $crole
            );

            if ($stmt->execute()) {
                echo '<script type="text/javascript">
                    alert("PDF generated and data successfully inserted into the database!");
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    alert("Error inserting data: ' . $stmt->error . '");
                    </script>';
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo '<script type="text/javascript">
                alert("Error: ' . $e->getMessage() . '");
                </script>';
        }
    }
?>