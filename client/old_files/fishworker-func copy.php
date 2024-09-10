<?php
      
     require_once("../fpdf/fpdf.php");
     include("../conn.php");

     //fishworker
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
     $fage = $_POST['fwage'];
     $fdob = $_POST['fwdob'];
     $fpob = $_POST['fwpob'];
     $fciv = $_POST['fwcivil'];
     $fgender = $_POST['fwgender'];
     $feduc = $_POST['fweduc'];
     $fchild = $_POST['fwchildren'];
     $fcontact = $_POST['fwcontact'];
     $fweight = $_POST['fwweight'];
     $fheight = $_POST['fwheight'];
     $fnato = $_POST['fwnationality'];
     $fskin = $_POST['fwskincomp'];
     $fOR = $_POST['fwOR'];
     $dateiss = $_POST['fwdateissued'];
     //emergency contacts
     $ecsal = $_POST['ecsalute'];
     $ecfn = $_POST['ecname'];
     $ecmn = $_POST['ecmiddle'];
     $ecln = $_POST['eclast'];
     $ecap = $_POST['ecappel'];
     $ecpo = $_POST['ecpostal'];
     $ecpr = $_POST['ecprov'];
     $ecct = $_POST['eccity'];
     $ecbr = $_POST['ecbrgy'];
     $ecst= $_POST['ecstreet'];
     $eccon = $_POST['eccontact'];
     $ecrel = $_POST['ecrelationship'];

     $fcrtk = $_POST['fwcrtkof'];
     $fcrtksince = $_POST['fwcrtksince'];
     $fcrtkloc = $_POST['fwcrtkloc'];
     $faqua = $_POST['fwaqua'];
     $faqua2 = $_POST['fwaqua2'];
     $funits = $_POST['fwunits'];
     $funitsdimen = $_POST['fwunitsdim'];
     //locator
     $locsal = $_POST['locsalute'];
     $locfn = $_POST['locfname'];
     $locmn = $_POST['locmiddle'];
     $locln = $_POST['loclast'];
     $locap = $_POST['locappel'];
     $locpost = $_POST['locpostal'];
     $locprov = $_POST['locprov'];
     $loccity = $_POST['loccity'];
     $locbrgy = $_POST['locbrgy'];
     $locstreet = $_POST['locstreet'];
     $locunits= $_POST['locunits'];
     //other

     //profile
     $fprof = $_POST['fwprofile'];

    $pdf = new FPDF();
    $pdf -> AddPage();

    $pdf->SetFont('Arial', '', 11);

    $pdf->Image('../fpdf/Group 6.png', 0, 0, 210, 297); // A4 size

// Add personal information
    $pdf->SetXY(27, 29);
    $pdf->Cell(40, 10, $dateiss);

    $pdf->SetXY(26, 70);
    $pdf->Cell(40, 10, $fsalute);
    $pdf->SetXY(61, 70);
    $pdf->Cell(40, 10, $fLname);
    $pdf->SetXY(103, 70);
    $pdf->Cell(40, 10, $fname);
    $pdf->SetXY(150, 70);
    $pdf->Cell(40, 10, $fMname);
    $pdf->SetXY(198, 70);
    $pdf->Cell(40, 10, $fappell);

    $pdf->SetXY(17, 76);
    $pdf->Cell(40, 10, $fstreet . "," . $fbrgy);
    $pdf->SetXY(79, 76);
    $pdf->Cell(40, 10, $fcity );
    $pdf->SetXY(133, 76);
    $pdf->Cell(40, 10, $fprovince);
    $pdf->SetXY(190, 77);
    $pdf->Cell(40, 10, $fpostal);

    $pdf->SetXY(24, 87);
    $pdf->Cell(40, 10, $fcontact);
    
    $pdf->SetXY(6, 100);
    $pdf->Cell(40, 10, $fage);
    $pdf->SetXY(35, 99);
    $pdf->Cell(40, 10, $fdob);
    $pdf->SetXY(77, 99);
    $pdf->Cell(40, 10, $fpob);
    $pdf->SetXY(154, 94);
    $pdf->Cell(40, 10, $fciv);

    $pdf->SetXY(20, 108);
    $pdf->Cell(40, 10, $fgender);
    $pdf->SetXY(60, 112);
    $pdf->Cell(40, 10, $fheight);
    $pdf->SetXY(90, 112);
    $pdf->Cell(40, 10, $fweight);
    $pdf->SetXY(154, 108);
    $pdf->Cell(40, 10, $fskin);

    $pdf->SetXY(25, 118);
    $pdf->Cell(40, 10, $fnato);

    $pdf->SetXY(48, 128);
    $pdf->Cell(40, 10, $feduc);

    $pdf->SetXY(44, 148);
    $pdf->Cell(40, 10, $fchild);
    
   
    $pdf->SetXY(40, 100);
    $pdf->Cell(40, 10, $fOR);
    

    // Emergency contact information
    $pdf->SetXY(107, 121);
    $pdf->Cell(40, 10, $ecsal . " " . $ecfn . " " . $ecmn . " " . $ecln . " " . $ecap);
    $pdf->SetXY(103, 140);
    $pdf->Cell(40, 10, $ecst . " " . $ecbr . " " . $ecct . " " . $ecpr . " " . $ecpo);
    $pdf->SetXY(100, 130);
    $pdf->Cell(40, 10, $ecrel);
    $pdf->SetXY(160, 130);
    $pdf->Cell(40, 10, $eccon);

    // Role in aquaculture
    $pdf->SetXY(43, 161);
    $pdf->Cell(40, 10, $fcrtk);
    $pdf->SetXY(107, 168);
    $pdf->Cell(40, 10, $fcrtksince);
    $pdf->SetXY(160, 167);
    $pdf->Cell(40, 10, $fcrtkloc);

    $pdf->SetXY(70, 173);
    $pdf->Cell(40, 10, $faqua);
    $pdf->SetXY(90, 173);
    $pdf->Cell(40, 10, $faqua2);
    $pdf->SetXY(115, 176);
    $pdf->Cell(40, 10, $funits);
    $pdf->SetXY(160, 176);
    $pdf->Cell(40, 10, $funitsdimen);

    // Locator information
    $pdf->SetXY(31, 189);
    $pdf->Cell(40, 10, $locfn . " " . $locmn . " " . $locln . " " . $locap);
    $pdf->SetXY(115, 190);
    $pdf->Cell(40, 10, $locstreet . ", " . $locbrgy . ", " . $loccity . ", " . $locprov . " " . $locpost);
    $pdf->SetXY(90, 190);
    $pdf->Cell(40, 10, $locunits);

    // Other information
    // Add profile photo
    // Adjust the position and size as needed

    // Output the PDF
    $fullname = $fname. ' ' . $fMname. ' ' .$fLname. ' ' .$fappell;
    $file = $fullname. 'Fishworkers_License_Application.pdf';
    $pdf->Output($file, 'D');


    // Get form data
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

    $fprof = $_FILES['fwprofile'];
    $tempname = $_FILES['fwprofile']['tmp_name'];
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($fprof);

    $email= $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['roles'];

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

    $fw_sql = "Insert into fishworkerlicense (fw_fname, fw_mname, fw_lname, fw_appell, fw_province, fw_municipal, fw_barangay, fw_street, fw_gender, fw_age, fw_dob, fw_contact, fw_OR, fw_caretakerof, fw_caretakersince, fw_location, fw_aquaculture, fw_FLA_Private, fw_unitsmanaged, fw_unitdeminsions, u_profile,u_email,u_pass,u_role) 
    Values('$fname','$fMname','$fLname', '$fappell','$fprovince',' $fcity','$fbrgy','$fstreet','$fgender',
    '$fage', '$fdob', '$fcontact', '$fOR', '$fcrtk', '$fcrtksince', '$fcrtkloc', '$faqua', '$faqua2', '$funits', '$funitsdimen', '$fprof','$email','$pass','$role')";
    $stmt = $conn->prepare($fw_sql);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    $ec_sql = "Insert into locatorinvestor (fw_id, loc_fname, loc_mname, loc_lname, loc_appell, loc_prov, loc_municipal, loc_brgy, loc_street,loc_units)
    Values('$user_id','$locfn','$locmn','$locln','$locap','$locprov','$loccity','$locbrgy','$locstreet', '$locunits')";
    $stmt = $conn->prepare($ec_sql);
    $stmt->execute();

    $stmt->close();
    $conn->close();
        
            echo '<script type="text/javascript">
            alert("PDF generated and data successfully inserted into the database!");
            </script>';
            

