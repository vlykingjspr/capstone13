<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/client.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/client/client_statusUpdater.js" defer></script>
        
    <title>Dashboard</title>
</head>

<body>

<?php
session_start();
include("../conn.php");
include("functions/status_updater.php");

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
    exit();
}

//check usertype
$userType = $_SESSION['usertype'];
if ($userType != 'Fishworker' && $userType != 'Fisherfolks' && $userType != 'Fishcage Operator') {
    header("Location: ../index.php");
    exit();
}


$userEmail = $_SESSION["user"];
$query = "";

if ($userType == 'Fishcage Operator') {
    $query = "SELECT u_profile, fc_fname AS fname, fc_mname AS mname, fc_lname AS lname, fc_prov AS prov, fc_municipal AS municipal, fc_brgy AS brgy, fc_street AS street, fc_contact AS contact, u_role, u_status, issuance_date  
              FROM fishcage WHERE u_email = ?";
} elseif ($userType == 'Fishworker') {
    $query = "SELECT u_profile, fw_fname AS fname, fw_mname AS mname, fw_lname AS lname, fw_province AS prov, fw_municipal AS municipal, fw_barangay AS brgy, fw_street AS street, fw_contact AS contact, u_role, u_status, issuance_date  
              FROM fishworkerlicense WHERE u_email = ?";
} elseif ($userType == 'Fisherfolks') {
    $query = "SELECT u_profile, ff_fname AS fname, ff_mname AS mname, ff_lname AS lname, ff_prov AS prov, ff_municipal AS municipal, ff_barangay AS brgy, ff_street AS street, ff_contact AS contact, u_role, u_status, issuance_date 
              FROM fisherfolks WHERE u_email = ?";
}

$showFishingGearPermit = false;
$showFishingVesselPermit = false;
$gearStatus = null;
$boatStatus = null;
$hasFishingGear = false;
$expirationDate = null;
$daysRemaining = null;

if ($stmtFishingGears = $conn->prepare("SELECT u_email, u_status FROM fishinggears WHERE u_email = ?")) {
    $stmtFishingGears->bind_param("s", $userEmail);
    $stmtFishingGears->execute();
    $resultFishingGears = $stmtFishingGears->get_result();
    if ($resultFishingGears->num_rows > 0) {
        $showFishingGearPermit = true;
        $rowFishingGears = $resultFishingGears->fetch_assoc();
        $gearStatus = $rowFishingGears['u_status'];
    }
    $stmtFishingGears->close();
}

if ($stmtFishingBoats = $conn->prepare("SELECT u_email, u_status FROM fishingboats WHERE u_email = ?")) {
    $stmtFishingBoats->bind_param("s", $userEmail);
    $stmtFishingBoats->execute();
    $resultFishingBoats = $stmtFishingBoats->get_result();
    if ($resultFishingBoats->num_rows > 0) {
        $showFishingVesselPermit = true;
        $rowFishingBoats = $resultFishingBoats->fetch_assoc();
        $boatStatus = $rowFishingBoats['u_status']; 
    }
    $stmtFishingBoats->close();
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

//permit validity calculation
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $uStatus = $userData['u_status'];

    if ($uStatus == 4) {
        if (isset($userData['issuance_date'])) {
            $timestamp = $userData['issuance_date']; 
            $expirationTimestamp = strtotime($timestamp . ' + 30 days');
            $expirationDate = date('F d, Y', $expirationTimestamp);
            $currentTimestamp = time();
            $daysRemaining = ceil(($expirationTimestamp - $currentTimestamp) / (60 * 60 * 24)); 
        } else {
            $expirationDate = null;
        }
    } else {
        $expirationDate = null;
    }

} else {
    echo "No user data found."; 
    exit();
}

if ($uStatus == 4 && isset($daysRemaining) && $daysRemaining <= 7) {
    updateExpiryNotice($conn, $userEmail, 'Fishery License Permit');
}

if ($gearStatus == 4 && isset($daysRemaining) && $daysRemaining <= 7) {
    updateExpiryNotice($conn, $userEmail, 'Fishing Gear Permit');
}

$stmt->close();
$conn->close();
?>



<div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
<div class="menu">
    <table class="menu-container" border="0">
        <tr> <!--cagro logo-->
            <td>
                <div class="space-top">
                    <img src="../img/plmslog.jpg" class="selector menu-logo">
                </div>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn menu-active">
                <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                    <div><p class="menu-text">Profile</p></div>
                </a>
            </td>
        </tr>

        <tr class="menu-row">
           <td class="menu-btn">
                <div class="dropdown menu-text non-style-link-menu">
                    <p style="cursor:default;">Permit</p>
                    <div class="dropdown-content">
                        <a class="ref" href="fishgear_form.php">Fishing Gear</a>
                        <a class="ref" href="fishingboats_form.php">Fishing Vessel</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn">
                <a href="activity.php" class="non-style-link-menu"><div><p class="menu-text">Activity Log</p></div></a>
            </td>
        </tr>
        
    </table>
</div>

                
<!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

        <div class = "dash-body">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold; text-transform: uppercase;" class="dhead"><?php echo htmlspecialchars($userData['u_role']); ?> ◌ Profile</p>
                                    </div>
                                    

                                    <div class="profile-menu">
                                        <div class="profile-menu-items"><!--notification-->
                                            <img src="../img/icons/notif.svg" class="space img-notif selector">
                                        </div>

                                        <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                            <?php 
                                                if (!empty($userData['u_profile']))
                                                {
                                                    echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                                }
                                                else
                                                {
                                                    echo '<img src="../img/user.png" class="space img-profile selector">';
                                                }
                                            ?>
                                            <img src="../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;" class="space selector">
                                        </div>
                                    </div>

                                    <div class="dropdown-content-prof" id="dropdown-prof">
                                        <div class="prof-divider">
                                            <?php 
                                                if (!empty($userData['u_profile']))
                                                {
                                                    echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                                }
                                                else
                                                {
                                                    echo '<img src="../img/user.png" class="space img-profile selector">';
                                                }
                                            ?>

                                            <div style="display: block; margin: auto">
                                                <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                            </div>
                                        </div>
                                        
                                        <a href="#">My Profile</a>
                                        <a href="../logout.php">Logout</a>
                                    </div>
                                </div>      
                            </td>  
                        </tr>

        <tr>
            <td>
                <div class="style-inline">
                    <div class="client-cards space-top space-bot" style="float:left">
                        <div style="display:flex; padding-inline: 1rem;" class="animx">
                            <?php
                                if (!empty($userData['u_profile'])) {
                                    echo '<img class="selector client-profile"  src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                } else {
                                    echo '<img class="selector client-profile"  src="../img/user.png" alt="Default Profile Image">';
                                }
                            ?>

                            <div style="display:block;padding-inline: 1rem;">
                                <p class="client-name"><?php echo htmlspecialchars($userData['lname'] . ', ' . $userData['fname'] . ' ' . $userData['mname']); ?></p>
                                <p class="client-role"><?php echo htmlspecialchars($userData['u_role']); ?></p>
                                <p class="client-address"><?php echo htmlspecialchars($userData['street'] . ', ' . $userData['brgy'] . ', ' . $userData['municipal'] . ', ' . $userData['prov']); ?></p>
                                <p class="client-contact"><?php echo htmlspecialchars($userData['contact']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>  
            </td>
        </tr>
                
        <tr>
            <td>
            <div style="display:flex;" class="style-inline animx">

                <div class="client-cards space-bot">

                    <div style="display: block; border-bottom: 1px groove #c9cbce9f;" class="style-inline selector">
                        <div>
                            <p class="dash-title">Permits:</p>
                        </div>
                    </div>

                    <div class="style-inline div-client-status-spacing">
                        <?php if ($userType == 'Fisherfolks' || $userType == 'Fishworker' || $userType == 'Fishcage Operator'): ?>
                            <div>
                                <div>
                                    <p class="permit-title">
                                        <?php 
                                            if ($userType == 'Fisherfolks') {
                                                echo "Fishery License Permit";
                                            } elseif ($userType == 'Fishworker') {
                                                echo "Fishery License Permit";
                                            } elseif ($userType == 'Fishcage Operator') {
                                                echo "Fishcage Operator Permit";
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div>                     
                                <div>
                                    <p class="permits">Status: <span class="permit-status"><?php echo $uStatus; ?></span></p>

                                    <?php if ($uStatus == 4 && isset($expirationDate)): ?>
                                        <p class="permits">Valid Until: <span class="expiration-date"><?php echo $expirationDate; ?></span></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <?php if (($userType == 'Fisherfolks' || $userType == 'Fishworker' || $userType == 'Fishcage Operator') && $showFishingGearPermit): ?>
                        <div class="style-inline">
                            <div>
                                <div>
                                    <p class="permit-title">Fishing Gear Permit</p>
                                </div>
                            </div>
                            
                            <div>
                                <div>
                                    <p class="permits">Status: <span class="gear-status"><?php echo $gearStatus; ?></span></p>
                                    <?php if ($gearStatus == 4 && $expirationDate): ?>
                                        <p class="permits">Valid Until: <span class="expiration-date"><?php echo $expirationDate; ?></span></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (($userType == 'Fisherfolks' || $userType == 'Fishworker' || $userType == 'Fishcage Operator') && $showFishingVesselPermit): ?>
                        <div class="style-inline">
                            <div>
                                <div>
                                    <p class="permit-title">Fishing Vessel Permit</p>
                                </div>
                            </div>
                            
                            <div>                     
                                <div>
                                    <p class="permits">Status: <span class="boat-status"></span></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
            </td>
        </tr> 
            
                
                </div>

            </table>

           </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdown = document.querySelector('.dropdown');
            dropdown.addEventListener('mouseover', function() {
                var content = this.querySelector('.dropdown-content');
                content.style.display = 'block';
            });

            dropdown.addEventListener('mouseout', function() {
                var content = this.querySelector('.dropdown-content');
                content.style.display = 'none';
            });
        });
    </script>

    <script>
        window.uStatus = <?php echo json_encode($uStatus); ?>;
        window.gearStatus = <?php echo json_encode($gearStatus); ?>;
        window.boatStatus = <?php echo json_encode($boatStatus); ?>;
        window.showFishingGearPermit = <?php echo json_encode($showFishingGearPermit); ?>;
        window.showFishingVesselPermit = <?php echo json_encode($showFishingVesselPermit); ?>;
    </script>


</body>
</html>