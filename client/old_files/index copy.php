<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/client.css">
    <script src="../js/prof-drp.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js">    
    
    <title>Dashboard</title>

    
</head>

<body>

<?php
session_start();
include("../conn.php");

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // If not logged in, redirect to login page
    header("Location: ../index.php");
    exit();
}

// Check if the user type is valid
$userType = $_SESSION['usertype'];
if ($userType != 'Fishworker' && $userType != 'Fisherfolks' && $userType != 'Fishcage Operator') {
    // If user type is not valid, redirect to login page
    header("Location: ../index.php");
    exit();
}

$userEmail = $_SESSION["user"];
$query = "";
if ($userType == 'Fishcage Operator') {
    $query = "SELECT u_profile, fc_fname AS fname, fc_mname AS mname, fc_lname AS lname, fc_prov AS prov, fc_municipal AS municipal, fc_brgy AS brgy, fc_street AS street, fc_contact AS contact, u_role, u_status  
              FROM fishcage WHERE u_email = ?";
} elseif ($userType == 'Fishworker') {
    $query = "SELECT u_profile, fw_fname AS fname, fw_mname AS mname, fw_lname AS lname, fw_province AS prov, fw_municipal AS municipal, fw_barangay AS brgy, fw_street AS street, fw_contact AS contact, u_role, u_status  
              FROM fishworkerlicense WHERE u_email = ?";
} elseif ($userType == 'Fisherfolks') {
    $query = "SELECT u_profile, ff_fname AS fname, ff_mname AS mname, ff_lname AS lname, ff_prov AS prov, ff_municipal AS municipal, ff_barangay AS brgy, ff_street AS street, ff_contact AS contact, u_role, u_status 
              FROM fisherfolks WHERE u_email = ?";
}


$showFishingGearPermit = false;
$showFishingVesselPermit = false;

if ($stmtFishingGears = $conn->prepare("SELECT u_email FROM fishinggears WHERE u_email = ?")) {
    $stmtFishingGears->bind_param("s", $userEmail);
    $stmtFishingGears->execute();
    $resultFishingGears = $stmtFishingGears->get_result();
    if ($resultFishingGears->num_rows > 0) {
        $showFishingGearPermit = true;
    }
    $stmtFishingGears->close();
}

if ($stmtFishingBoats = $conn->prepare("SELECT u_email FROM fishingboats WHERE u_email = ?")) {
    $stmtFishingBoats->bind_param("s", $userEmail);
    $stmtFishingBoats->execute();
    $resultFishingBoats = $stmtFishingBoats->get_result();
    if ($resultFishingBoats->num_rows > 0) {
        $showFishingVesselPermit = true;
    }
    $stmtFishingBoats->close();
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $uStatus = $userData['u_status'];
} else {
    echo "No user data found."; 
    exit();
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

        <tr class="menu-row">
            <td class="menu-btn menu-icon-patient">
                <a href="../logout.php" class="non-style-link-menu"><div><p class="menu-text">Log Out (temp)</p></div></a>
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

                    <div class="style-inline">
                        <?php if ($userType == 'Fisherfolks'): ?>
                            <div>
                                <div>
                                    <p class="permit-title">Fishery License Permit</p>
                                </div>
                            </div>

                            <div>                     
                                <div>
                                    <p class="permits">Status: <span class=""></span></p>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                    
                    <?php if ($userType == 'Fisherfolks' && $showFishingGearPermit): ?>
                        <div class="style-inline">
                            <div>
                                <div>
                                    <p class="permit-title">Fishing Gear Permit</p>
                                </div>
                            </div>
                            <div>                     
                                <div>
                                    <p class="permits">Status: <span class=""></span></p>
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
    <!--ionicons-script-->
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>

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
    var uStatus = <?php echo json_encode($uStatus); ?>;
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    
    var statusSpan = document.querySelector('.permits span');

    statusSpan.className = ''; 
 
    if (uStatus == 1) {
        statusSpan.textContent = 'Registered';
        statusSpan.classList.add('stats-pending');
    } else if (uStatus == 2) {
        statusSpan.textContent = 'Requirements Issued';
        statusSpan.classList.add('stats-pending');
    } 
    else if (uStatus == 3) {
        statusSpan.textContent = 'Sent for Approval';
        statusSpan.classList.add('stats-pending');
    }
    else if (uStatus == 4) {
        statusSpan.textContent = 'Complete';
        statusSpan.classList.add('stats-complete');
    }
    else if (uStatus == 5) {
        statusSpan.textContent = 'Expiry Notice';
        statusSpan.classList.add('stats-expiry');
    }  
    else {
        statusSpan.textContent = 'Pending';
        statusSpan.classList.add('stats-pending');
    }
});
</script>

    <script>
        var uStatus = <?php echo json_encode($uStatus); ?>;

        var gearStatus = <?php echo json_encode($gearStatus); ?>;

        var boatStatus = <?php echo json_encode($boatStatus); ?>;
    </script>

    <script>
        
    </script>

</body>
</html>