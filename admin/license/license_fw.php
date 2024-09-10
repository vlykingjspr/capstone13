<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../../css/licenseformat.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="../../js/prof-drp.js" defer></script>
    <script src="../../js/nxt.js" defer></script>
    <script src="../../js/img.js" defer></script>
    
    
    <title>Fishworkers License</title>

    
</head>

<body>

<?php

session_start();

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"] == "" || $_SESSION['usertype'] != 'CAGRO - Administrator') {
        header("location: ../../index.php");
    }
} else {
    header("location: ../../index.php");
}

include("../../conn.php");

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID and selected restrictions from the form
    $userId = $_POST['user_id'];
    $restrictions = isset($_POST['restrictions']) ? $_POST['restrictions'] : [];
    $restrictionsString = implode(', ', $restrictions);

    // Fetch user information from the database using the user ID
    $sql = "SELECT
                fw_gender,
                CONCAT(fw_fname, ' ', fw_mname, ' ', fw_lname) AS name,
                CONCAT(fw_street, ', ', fw_barangay, ', ', fw_municipal, ', ', fw_province) AS address,
                fw_OR,
                u_profile as clientprof
            FROM fishworkerlicense
            WHERE fw_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($gender, $name, $address, $orNumber, $clientprof);
        $stmt->fetch();
        $stmt->close();
    }

?>   

    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            
            
        </div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div style="display: flex; float:left">
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <a href="../licensing(fishworkers).php"><img src="../../img/icons/back-butt.png" class="back-img selector" ></a>
                                        </div>
                                        
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ LICENSING</p>
                                        </div>
                                    </div>
                                        

                                    <div class="profile-menu">
                                        <div class="profile-menu-items"><!--notification-->
                                            <img src="../../img/icons/notif.svg" class="space img-notif selector">
                                        </div>

                                        <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                            <?php 
                                                if (!empty($userData['u_prof']))
                                                {
                                                    echo '<img class="sechead-prof-img selector" src="../../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
                                                }
                                                else
                                                {
                                                    echo '<img src="../../img/user.png" class="space img-profile selector">';
                                                }
                                            ?>
                                            <img src="../../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;" class="space selector">
                                        </div>
                                    </div>

                                    <div class="dropdown-content-prof" id="dropdown-prof">
                                        <div class="prof-divider">
                                            <img src="../../img/user.png" class="space img-profile selector">
                                            <div style="display: block; margin: auto">
                                                <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                            </div>
                                        </div>
                                        
                                        <a href="#profile">My Profile</a>
                                        <a href="#settings">Settings</a>
                                        <a href="../../logout.php">Logout</a>
                                    </div>

                                </div> 
                            </td>

                        </tr>

                        <tr>
                            <td>
                                 <div style="justify-content: center; display:flex">
                                    <a href="#" class="btn">FRONT</a>
                                    <a href="#" class="btn-inactive">BACK</a>
                                </div>
                            </td>
                        </tr>
<!--------------------------------------------------------------------------------------FRONT--Licensing----------------------------------------------------------------------------------------->                       
                        <tr>
                            <td>
                                <div style="justify-content: center; display:flex; margin:0">
                                    <div class="license-container space-top">
                                        <div style="display: flex; border-bottom: 1px solid black" class="style-inline">
                                            <div>
                                                <img src="../../img/lic-logo.png"class="license-logo">
                                            </div>

                                            <div>
                                                <p class="license-header">Republic of the Philippines</p>
                                                <p class="license-header">City Government of Panabo</p>
                                                <p class="license-header">Province of Davao del Norte</p>
                                                <h3 class="license-header-2">CITY AGRICULTURAL OFFICE</h3>
                                            </div>
                                        </div>

                                        <div style="display: flex; align-items: center;">
                                            <div style="text-align:center; margin:auto">
                                                <h2> APPLICATION FOR FISHER'S LICENSE</h2>
                                            </div>
                                        </div>
                                        <div>
                                            <div style="justify-content: space-between; display: flex" class="style-inline">
                                                <div>
                                                    <p style="color: black; margin:0;">Date Issued: <?php echo date("F j, Y"); ?></p>
                                                </div>
                                                <div>
                                                    <p style="color: black; margin:0; font-weight: bold">OFFICIAL PERMIT NO: PCDDN 2024-000684</p>
                                                </div>
                                            </div>
                                            <div style="display: flex; border-bottom: 1px solid black" class="style-inline space-bot">
                                                <div style="display: block">
                                                    <div>
                                                    <?php 
                                                        if (!empty(['clientprof']))
                                                        {
                                                            echo '<img style="height: 150px; width: 150px; margin: auto" src="../../uploads/' . htmlspecialchars($clientprof) . '" alt="Profile Image">';
                                                        }
                                                        else
                                                        {
                                                            echo '<img src="../../img/user.png" style="height: 150px; width: 150px; margin: auto">';
                                                        }
                                                    ?>
                                                        
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <div style="display: block; padding-inline:2rem;">
                                                    <div style="display: flex; margin-bottom: 5px">
                                                        <div>
                                                            <p class="license-labels"> FULL NAME</p>
                                                            <p style="color: black; margin:0; font-weight:bold"><?php echo htmlspecialchars($name); ?></p>
                                                        </div>
                                                    </div>

                                                    <div style="display: flex; margin-bottom: 5px">
                                                        <div>
                                                            <p class="license-labels">ADDRESS</p>
                                                            <p style="color: black; margin:0; font-weight:bold"><?php echo htmlspecialchars($address); ?></p>
                                                        </div>
                                                    </div>

                                                    <div style="display: flex;">
                                                        <div>
                                                            <p class="license-labels">OR NUMBER</p>
                                                            <p style="color: black; margin:0;"><?php echo htmlspecialchars($orNumber); ?></p>
                                                        </div>
                                                        <div style="margin-left: 10px">
                                                            <p class="license-labels">RESTRICTIONS</p>
                                                            <p style="color: black; margin:0;"><?php echo htmlspecialchars($restrictionsString); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display:flex !important;">
                                        
                                            <div style="border-right: 1px solid black; width: 50%;">
                                                <div class="style-inline" style="display:flex; margin:auto; border-bottom: 1px solid black">
                                                    <div>
                                                        <p class="license-entities">VALIDATED BY:</p>
                                                    </div>
                                                    <div class="style-inline" style="text-align: center">
                                                        <p style="color: black; margin:0; border-bottom: 1px solid black"><?php echo $userData['fname'] . ' ' . $userData['lname'] ?></p><!-- Use PHP to echo the current logged-in user name -->
                                                        <p class="license-titles">AGRICULTURIST I</p>
                                                    </div>
                                                </div>

                                                <div class="style-inline" style="display:flex; margin: auto;">
                                                    <div>
                                                        <p class="license-entities">RECOMMENDING APPROVED:</p>
                                                    </div>
                                                    <div class="style-inline"style="text-align: center">
                                                        <p style="color: black; margin:0; border-bottom: 1px solid black">Nick Gurr</p><!-- Use PHP to echo the current logged-in user name -->
                                                        <p class="license-titles">CITY AGRICULTURIST</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div style="width: 50%">
                                                <div class="style-inline" style="display:flex; margin:auto; padding-top: 1.5rem">
                                                    <div>
                                                        <p class="license-entities">APPROVED BY:</p>
                                                    </div>
                                                    <div class="style-inline" style="text-align: center">
                                                        <p style="color: black; margin:0; border-bottom: 1px solid black">Nick Gurr</p><!-- Use PHP to echo the current logged-in user name -->
                                                        <p style="color: black; margin:0">CITY MAYOR</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // Close the PHP tag
                                }
                                ?>
                            </td> 
                        </tr>

                        <tr>
                            <td>
                                <div style="justify-content: center; display:flex">
                                    <a href="#" style="text-align:center; padding: 10px; border-radius: 5px; border-style:none; cursor: pointer; background-color: #58A773; color: white; margin: 10px; text-decoration:none">SAVE AND PRINT</a>
                                </div>
                            </td>
                        </tr>
                </table>
            </div>
    </div>


        </div>
    </div>
    <!--ionicons-script-->
</body>
</html>