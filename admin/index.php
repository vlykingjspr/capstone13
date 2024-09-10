<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_dash.css">
    <script src="../js/admin/admin_dash.js" defer></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/global/menu-dropdown.js" defer></script>

    <title>Dashboard</title>
</head>

<body>

<?php
session_start();

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"] == "" || $_SESSION['usertype'] != 'CAGRO - Administrator') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

include("../conn.php");

$userEmail = $_SESSION["user"];
$query = "";
if ($_SESSION['usertype']== 'CAGRO - Administrator') 
    {
    $query = "SELECT u_prof, u_fname AS fname, u_lname AS lname, u_role AS urole, u_email AS uemail  
              FROM users WHERE u_email = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "No user data found.";
        exit();
    }

$currentDateTime = date('m-d-Y H:i:s A');

$query = "SELECT COUNT(*) as row_count FROM fishworkerlicense";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishworkerCount = 0; 
if ($result->num_rows > 0) {
    $fishworkerCount = $result->fetch_assoc()['row_count'];
}

$query = "SELECT COUNT(*) as row_count FROM fishingboats WHERE fb_vesseltype = 'motorized'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$motorizedBoatCount = 0; 
if ($result->num_rows > 0) {
    $motorizedBoatCount = $result->fetch_assoc()['row_count'];
}

$query = "SELECT COUNT(*) as row_count FROM fishingboats WHERE fb_vesseltype = 'non-motorized'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$notmotorizedBoatCount = 0; 
if ($result->num_rows > 0) {
    $notmotorizedBoatCount = $result->fetch_assoc()['row_count'];
}

$query = "SELECT COUNT(*) as row_count FROM fisherfolks";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fisherfolksCount = 0; 
if ($result->num_rows > 0) {
    $fisherfolksCount = $result->fetch_assoc()['row_count'];
}


//select query php
$query = "SELECT fw_id, fw_fname AS fname, fw_mname AS mname, fw_lname AS lname, fw_province AS prov, fw_municipal AS municipal, fw_barangay AS brgy, fw_street AS street, fw_OR FROM fishworkerlicense";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>





<div class = "container">
<!------------------------------------------------------------------------------------------side-nav---------------------------------------------------------------------------->
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
                    <div><p class="menu-text">Dashboard</p></div>
                </a>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn">
                <div class="dropdown menu-text non-style-link-menu">
                    <p>Clients</p>
                    <div class="dropdown-content">
                        <a class="ref" href="fisherfolks.php">Fisherfolks</a>
                        <a class="ref" href="fishworkers.php">Fishworkers</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="menu-row">
           <td class="menu-btn">
                <div class="dropdown menu-text non-style-link-menu">
                    <p>Permit</p>
                    <div class="dropdown-content">
                        <a class="ref" href="fishinggears.php">Fishing Gear</a>
                        <a class="ref" href="fishingboats.php">Fishing Vessel</a>
                        <a class="ref" href="fishingcages.php">Fish Cages</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="menu-row">
           <td class="menu-btn">
                <a href="licensing.php" class="non-style-link-menu"><div><p class="menu-text">Licensing</p></div></a>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn">
                <a href="Activity.php" class="non-style-link-menu"><div><p class="menu-text">Activity Log</p></div></a>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn">
                <a href="requirements.php" class="non-style-link-menu"><div><p class="menu-text">Requirements & Fees</p></div></a>
            </td>
        </tr>
        
    </table>
</div>
                
<!---------------------------------------------------------------------------------------------------Dashboard-Contents----------------------------------------------------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ DASHBOARD</p>
                                    </div>
                                    

                                    <div class="profile-menu">
                                        <div class="profile-menu-items"><!--notification-->
                                            <img src="../img/icons/notif.svg" class="space img-notif selector">
                                        </div>

                                        <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                            <?php 
                                                if (!empty($userData['u_prof']))
                                                {
                                                    echo '<img class="space sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
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
                                            <img src="../img/user.png" class="space img-profile selector">
                                            <div style="display: block; margin: auto">
                                                <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                            </div>
                                        </div>
                                        
                                        <a href="profile.php">My Profile</a>
                                        <a href="../logout.php">Logout</a>
                                    </div>

                                </div>      
                            </td>  
                        </tr>

<!------------------------------------------------------------------------------------------------------dashboard main contents------------------------------------------------------------------------------------------------------->
                        <tr>
                            
                            <td>
                                    <div class="main-dash-container animy">
                                        <div class="card-container"><!--card-->
                                            <div class="space cards color3">
                                                <p class="card-header"><a class="href_nodesign" href="fishworkers.php">Fishworkers</a></p>
                                                <p class="card-count"><?php echo $fishworkerCount; ?></p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color3">
                                                <p class="card-header"><a class="href_nodesign" href="fisherfolks.php">Fisherfolks</a></p>
                                                <p class="card-count"><?php echo $fisherfolksCount; ?></p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color1">
                                                <p class="card-header">Newly Registered</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color2">
                                                <p class="card-header">Renewed</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color3">
                                                <p class="card-header">Non-Local Fishers</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color3">
                                                <p class="card-header">Local-Fishers</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color2">
                                                <p class="card-header">Non-Motorized Gear</p>
                                                <p class="card-count"><?php echo $notmotorizedBoatCount; ?></p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color1">
                                                <p class="card-header">Motorized-Gear</p>
                                                <p class="card-count"><?php echo $motorizedBoatCount; ?></p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                        </div>
                                        
                                    </div>
                    
                            </td>      
                        </tr>
                </table>

           </div>

        </div>
    </div>

</body>
</html>