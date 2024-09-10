<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/ffolksnewreg.css">
    
    <title>Document</title>

    
</head>

<body>

<?php

    session_start();

    if(isset($_SESSION["user"]))
    {
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='Admin'){
            header("location: ../login.php");
        }

    }else
    {
        header("location: ../login.php");
        }
    
    include("../conn.php");

?>

    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:3% 0 3% 0;" colspan="2">
                        <table border="0" class="profile-container" style="background-color: white; padding-left: 2%;">
                            <tr>
                                <td width="60%" >
                                    <img src="../img/plmslog.jpg" alt="" width="100%">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                    
                    <tr class="menu-row" >
                        <td class="menu-row" >
                            <a href="index1.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                            <a href="fisherfolks.php" class="non-style-link-menu"><div><p class="menu-text">Fisherfolks</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-row">
                            <a href="fishinggears.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Fishing Gears</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-appoinment">
                            <a href="fishingboats.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Boats</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="fishingcages.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Cages</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="#" class="non-style-link-menu"><div><p class="menu-text">Licensing</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="users.php" class="non-style-link-menu"><div><p class="menu-text">Users</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="../logout.php" class="non-style-link-menu"><div><p class="menu-text">Log Out (temp)</p></a></div>
                        </td>
                    </tr>
            </table>
        </div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td colspan="3" class="nav">

                                <table>

                                    <tr>
                                        <td width="1%">
                                            <button class="back-butt" style="padding-left: 25%;"><a href="fisherfolks.php"><img class="back-img" src="../img/icons/back-butt.png"></a></button>
                                        </td>

                                        <td style="font-size: 23px; width: 30%;">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHERFOLKS NEW REGISTRATION</p>
                                        </td>
                                    </tr>  
                                </table>

                            </td>

                            <td width="7%">
                                <img src="../img/sus.jpg" width="45%" style="border-radius:50%">
                            </td>
                        </tr>

                        <tr >
                           <td colspan="6">
                            <table class="newreg-con">
                                <tr>
                                    
                                    <div class ="newreg-con-items">
                                        <div class="newreg-card">
                                            <div class="n-img">
                                                <img src="../img/icons/fworker.png" style="height: 100px;">
                                            </div>

                                            <div class="n-text">
                                                <a href="fw_lic_per.php"><h2>APPLICATION FOR <br> FISH WORKERS LICENSE PERMIT</h2></a>
                                            </div>
                                        </div>
                                    
                                        <div class="newreg-card">
                                            <div class="n-img">
                                                <img src="../img/icons/fishery.png" style="height: 100px;">
                                            </div>
                                            
                                            <div class="n-text">
                                                <a href = "ff_lic_per.php"><h2>APPLICATION FOR <br> FISHERY LICENSE PERMIT</h2></a>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </tr>
                            
                            </table>

                           </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>
    <!--ionicons-script-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>