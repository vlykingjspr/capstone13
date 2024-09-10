<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <script src="../js/prof-drp.js" defer></script>

    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    
    <title>Fishing Gears</title>

    
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

?>

    <div class = "container">

<!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div style="display: flex; float:left">
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <a href="index.php"><img src="../img/icons/back-butt.png" class="back-img selector" ></a>
                                        </div>
                                        
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ My Profile</p>
                                        </div>
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
                                            
                                            <a href="index.php">Dashboard</a>
                                            <a href="#settings">Settings</a>
                                            <a href="../logout.php">Logout</a>
                                        </div>

                                </div> 
                            </td>

                        </tr>

                        <tr>
                            <td>

                            <iframe name="frame" style="display:none;"></iframe>
                                <form id="registrationForm" action="#" method="POST" target="frame" enctype="multipart/form-data">

                                        <div style="display:flex; justify-content:center; max-width: 2500px;">
                                            <div style="width:40rem; height: auto; background-color: white; border-radius: 15px" class="style-inline">
                                                <div>
                                                    <div>
                                                        <h3>Personal Information</h3>
                                                    </div>
                                                </div>

                                                <div style="display:flex; justify-content: space-between">
                                                    <div style="display:flex; flex-direction:column">
                                                        <label>First Name</label>
                                                        <input type="text" class="" value="<?php echo htmlspecialchars($userData['fname']); ?>" readonly>
                                                    </div>

                                                    <div style="display:flex; flex-direction:column">
                                                        <label>Last Name</label>
                                                        <input type="text" class="" value="<?php echo htmlspecialchars($userData['lname']); ?>" readonly>
                                                    </div>

                                                    <div style="display:flex; flex-direction:column">
                                                        <label>Email</label>
                                                        <input type="text" class="" value="<?php echo htmlspecialchars($userData['uemail']); ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            
    
                                        </div>
                                                                            
                                </form>
                                                        
                            </td>
                        </tr>

                        

                </table>

           </div>

        </div>
    <!--ionicons-script-->

    <script src="js/payment.js"></script>

</body>
</html>