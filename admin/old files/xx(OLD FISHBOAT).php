<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/fboats.css">
    
    
    <title>Fishing Gears</title>

    
</head>

<body>

<?php

    session_start();

    if(isset($_SESSION["user"]))
    {
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
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
                        <td class="menu-btn menu-icon-doctor" >
                            <a href="index1.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-doctor">
                            <a href="fisherfolks.php" class="non-style-link-menu"><div><p class="menu-text">Fisherfolks</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-dashbord">
                            <a href="fishinggears.php" class="non-style-link-menu "><div><p class="menu-text">Fishing Gears</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-appoinment menu-active menu-icon-dashbord-active">
                            <a href="fishingboats.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Fishing Boats</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="fishingcages.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Cages</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="#" class="non-style-link-menu"><div><p class="menu-text">Payments</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="#" class="non-style-link-menu"><div><p class="menu-text">Licensing</p></a></div>
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
                                        <td style="padding-left: 1%;font-size: 23px; width: 10%;">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING GEARS</p>
                                        </td>
                                    </tr>  
                                </table>
                            </td>

                            <td width="7%">
                                <img src="../img/sus.jpg" width="45%" style="border-radius:50%">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="padding-left: 2%;">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search">
                            </td>
                        </tr>

                        <tr >
                            <td colspan="6">
                             <table class="fboats-con">
                                 <tr>
                                     
                                     <div class ="fboats-con-items">
                                         <div class="fboats-card">
                                             <div class="fb-img">
                                                 <img src="../img/icons/reg.png" style="height: 100px;">
                                             </div>
 
                                             <div class="fb-text" style="padding-top: 2.5rem;">
                                                 <h2>INITIAL REGISTRATION</h2>
                                             </div>

                                             <div class="fb-butt" style="padding-top: 2rem">
                                                <button><A href="fb_newreg.php">SELECT</A></button>
                                            </div>
                                         </div>
                                     
                                         <div class="fboats-card">
                                             <div class="fb-img">
                                                 <img src="../img/icons/renew.png" style="height: 100px;">
                                             </div>
                                             
                                             <div class="fb-text">
                                                 <h2>ISSUANCE OF NEW <BR> CERTIFICATE OF <BR> NUMBER CN</h2>
                                             </div>

                                             <div class="fb-butt">
                                                <button><A href="#">SELECT</A></button>
                                            </div>
                                         </div>

                                         <div class="fboats-card">
                                            <div class="fb-img">
                                                <img src="../img/icons/renew.png" style="height: 100px;">
                                            </div>
                                            
                                            <div class="fb-text">
                                                <h2>RE-ISSUANCE OF <BR> NEW CERTIFICATE <BR> OF  NUMBER CN</h2>
                                            </div>

                                            <div class="fb-butt">
                                               <button><A href="#">SELECT</A></button>
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