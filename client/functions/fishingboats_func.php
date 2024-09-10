<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    include("../../conn.php");

    // Sanitize and convert input data
    $fbfn = htmlspecialchars($_POST['fbopfname']);
    $fbmn = htmlspecialchars($_POST['fbopmname']);
    $fbln = htmlspecialchars($_POST['fboplname']);
    $fbap = htmlspecialchars($_POST['fbopappel']);
    $fbpos = (int)$_POST['fbpostal']; // Convert to integer
    $fbprov = htmlspecialchars($_POST['fbopprov']);
    $fbcity = htmlspecialchars($_POST['fbopcity']);
    $fbbrgy = htmlspecialchars($_POST['fbopbrgy']);
    $fbstreet = htmlspecialchars($_POST['fbopstreet']);
    $fbport = htmlspecialchars($_POST['fbhport']);
    $fbves = htmlspecialchars($_POST['fbvesseln']);
    $fbtype = htmlspecialchars($_POST['fbvtype']);
    $fbvbplace = htmlspecialchars($_POST['fbvbuiltp']);
    $fbvbyear = (int)$_POST['fbvbuilty']; // Convert to integer
    $fbvmat = htmlspecialchars($_POST['fbvmaterial']);
    $RL = (float)$_POST['fbRL']; // Convert to float
    $RB = (float)$_POST['fbRB']; // Convert to float
    $RD = (float)$_POST['fbRD']; // Convert to float
    $TL = (float)$_POST['fbTL']; // Convert to float
    $TB = (float)$_POST['fbTB']; // Convert to float
    $TD = (float)$_POST['fbTD']; // Convert to float
    $GT = (float)$_POST['fbGT']; // Convert to float
    $NT = (float)$_POST['fbNT']; // Convert to float
    $ENGINE = htmlspecialchars($_POST['fbENGINE']);
    $SERIAL = htmlspecialchars($_POST['fbSERIAL']);
    $HP = (float)$_POST['fbHP']; // Convert to float
    $fbemail = htmlspecialchars($_POST['u_email']); // Email

    // Debug: Print all input values
    var_dump($fbfn, $fbmn, $fbln, $fbap, $fbpos, $fbprov, $fbcity, $fbbrgy, $fbstreet, $fbport,
        $fbves, $fbtype, $fbvbplace, $fbvbyear, $fbvmat, $RL, $RB, $RD, $TL, $TB, $TD,
        $GT, $NT, $ENGINE, $SERIAL, $HP, $fbemail);

    // SQL Query
    $fb_sql = "INSERT INTO fishingboats (
        fb_opfname, fb_opmname, fb_oplname, fb_opappel, fb_postal, fb_opprov, fb_opmunicipal, fb_opbarangay, fb_opstreet, fb_homeport,
        fb_vesselname, fb_vesseltype, fb_placebuilt, fb_yearbuilt, fb_materialbuilt, fb_RL, fb_RB, fb_RD, fb_TL, fb_TB, fb_TD, fb_GT, fb_NT,
        fb_enginemake, fb_serial, fb_horsepower, u_email
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($fb_sql)) {
        $stmt->bind_param(
            "ssssissssssssisddddddddssds",
            $fbfn, $fbmn, $fbln, $fbap, $fbpos, $fbprov, $fbcity, $fbbrgy, $fbstreet, $fbport,
            $fbves, $fbtype, $fbvbplace, $fbvbyear, $fbvmat, $RL, $RB, $RD, $TL, $TB, $TD,
            $GT, $NT, $ENGINE, $SERIAL, $HP, $fbemail
        );

        if ($stmt->execute()) {
            echo '<script type="text/javascript">
                    alert("Registered! Redirecting...");
                  </script>';
            // Optional redirect:
            // echo '<script>window.location.href = "your_redirect_url_here";</script>';
        } else {
            echo "<script>alert('Error inserting data: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }

    $conn->close();
}
?>
