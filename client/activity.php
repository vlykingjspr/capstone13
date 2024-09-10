<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/client.css">
    <script src="../js/global/prof-drp.js" defer></script>
    
    <title>Activity Log</title>

    
</head>

<body>

<?php
session_start();
include("../conn.php");

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

// Check if the user type is valid
$userType = $_SESSION['usertype'];
if ($userType != 'Fishworker' && $userType != 'Fisherfolks' && $userType != 'Fishcage Operator') {
    header("Location: ../login.php");
    exit();
}

$userEmail = $_SESSION["user"];
$userData = null;

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

$hasFishingGearPermit = false;
$hasFishingBoatPermit = false;

$queryFishingGears = "SELECT 1 FROM fishinggears WHERE u_email = ?";
$stmtFishingGears = $conn->prepare($queryFishingGears);
$stmtFishingGears->bind_param("s", $userEmail);
$stmtFishingGears->execute();
$resultFishingGears = $stmtFishingGears->get_result();
if ($resultFishingGears->num_rows > 0) {
    $hasFishingGearPermit = true;
}

$queryFishingBoats = "SELECT 1 FROM fishingboats WHERE u_email = ?";
$stmtFishingBoats = $conn->prepare($queryFishingBoats);
$stmtFishingBoats->bind_param("s", $userEmail);
$stmtFishingBoats->execute();
$resultFishingBoats = $stmtFishingBoats->get_result();
if ($resultFishingBoats->num_rows > 0) {
    $hasFishingBoatPermit = true;
}

$query = "SELECT *, DATE_FORMAT(timestamp, '%M %d, %Y %h:%i %p') as formatted_datetime FROM activity_logs WHERE user_email = ? ORDER BY timestamp DESC";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $activityLogsResult = $stmt->get_result();
}

$stmtFishingGears->close();
$stmtFishingBoats->close();
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
            <td class="menu-btn">
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
                        <?php if (!$hasFishingGearPermit): ?>
                            <a class="ref" href="fishgear_form.php">Fishing Gear</a>
                        <?php endif; ?>
                        <?php if (!$hasFishingBoatPermit): ?>
                            <a class="ref" href="fishingboats_form.php">Fishing Vessel</a>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn menu-active">
                <a href="activity.php" class="non-style-link-menu"><div><p class="menu-text">Activity Log</p></div></a>
            </td>
        </tr>
        
    </table>
</div>

                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td colspan="3" class="nav">
                            <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ ACTIVITY LOG</p>
                                    </div>
                                    

                                    <div class="profile-menu">

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
                                        
                                        <a href="#profile">My Profile</a>
                                        <a href="#settings">Settings</a>
                                        <a href="../logout.php">Logout</a>
                                    </div>

                                </div> 
                            </td>

                        </tr>

                        <tr >
                            <td colspan="2" style="padding-left: 2%;">
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search">
                            </td>                         
                        </tr>

                        <!---------------------------------------------------tabs--------------------------------------------->
                        <tr>
                            <td colspan="2">
                                <button class="sort-butt"><a>SORT</a></button>
                            </td>
                        
                        </tr>

                        <tr>
                            <td colspan="4">
                                <center>
                                    <div class="abc scroll">
                                        <table width="100%" class="sub-table scrolldown animy" cellspacing="0">
                                            <thead class="headert">
                                                <tr>
                                                    <th class="table-headin">ID</th>
                                                    <th class="table-headin">USERNAME</th>
                                                    <th class="table-headin">ACTION</th>
                                                    <th class="table-headin">DATE</th>
                                                </tr>
                                            </thead>

                                            <tbody class="table-con">
                                                <?php 
                                                if ($activityLogsResult->num_rows > 0) {
                                                    while ($row = $activityLogsResult->fetch_assoc()) {
                                                        echo "<tr>
                                                                <td>" . htmlspecialchars($row['id']) . "</td>
                                                                <td>" . htmlspecialchars($row['user_email']) . "</td>
                                                                <td>" . htmlspecialchars($row['action']) . "</td>
                                                                <td>" . htmlspecialchars($row['formatted_datetime']) . "</td>
                                                            </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No activity logs found.</td></tr>";
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </center>
                            </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>

</body>
</html>