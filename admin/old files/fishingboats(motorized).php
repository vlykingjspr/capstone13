<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    
    <title>Fisherfolks</title>

    
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

    //delete
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) 
    {
        $fg_id = intval($_GET['id']);
    
        // Start a transaction
        $conn->begin_transaction();
    
        try {
            //delete from the parent table
            $sql = "DELETE FROM fishingboats WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $fg_id);
            $stmt->execute();
            $stmt->close();
    
            // Commit the transaction
            $conn->commit();
    
            // Redirect to avoid resubmission
            header("Location: fishingboats.php"); // Replace 'your_page.php' with your actual page
            exit();
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            $conn->rollback();
            echo "Failed to delete record: " . $e->getMessage();
        }
    }

    $sql1 = "SELECT id, fb_opfname, fb_opmname, fb_oplname, fb_opbarangay, fb_opstreet, fb_vesselname, fb_enginemake, fb_serial, fb_RL,fb_TL,fb_RB, fb_TB, fb_RD, fb_TD, fb_GT, fb_NT, fb_horsepower FROM fishingboats";
    $result = $conn->query($sql1);

?>


    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:3% 0 3% 0;" colspan="2">
                        <table border="0" class="profile-container" style="background-color: white; padding-left: 2%;">
                            <tr>
                                <td width="70%" >
                                    <img src="../img/plmslog.jpg" alt="" width="100%">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                    
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-doctor" >
                            <a href="index1.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-dashbord ">
                            <a href="fisherfolks.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Fisherfolks</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-schedule">
                            <a href="fishinggears.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Gears</p></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-appoinment  menu-active menu-icon-dashbord-active">
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
                            <a href="licensing.php" class="non-style-link-menu"><div><p class="menu-text">Licensing</p></a></div>
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
                <div class="dash-con">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td colspan="3" class="nav">
                                <table>
                                    <tr>
                                        <td style="padding-left: 1%; width: 10%;">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING BOATS MOTORIZED</p>
                                        </td>
                                    </tr>  
                                </table>
                            </td>

                            <td width="7%">
                                <img src="../img/sus.jpg" width="45%" style="border-radius:50%">
                            </td>
                        </tr>

                        <tr >
                            <td colspan="2" style="padding-left: 2%;">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search">
                                <button class="add-btn"><a href="fb_newreg.php" style="text-decoration:none; color:white"><img src="../img/icons/add.svg" style="vertical-align: middle;"><span>ADD/REGISTER</span></a></button>
                            </td>
                            
                        </tr>

                        <!---------------------------------------------------tabs--------------------------------------------->
                        <tr>
                        
                            <td width="1%">
                                <button class="butt gen-butt"><a href="fishingboats.php">Non-Motorized</a></button>
                            </td>

                            <td colspan="2">
                                <button class="butt-active gen-butt animx"><a href="fishingboats(motorized).php" >Motorized</a></button>
                            </td>

                            <td colspan="2">
                                <button class="sort-butt"><a>SORT</a></button>
                            </td>
                        
                        </tr>

                        
                        <!----------------------------------------------------table-------------------------------------------------------------------------->
                        <tr>
                            <td colspan="4">
                               <center>
                                <div class="abc scroll">
                                    <table width="100%" class="sub-table scrolldown animy" cellspacing="0">
                                    <thead class="headert">
                                        <tr>
                                            <th class="table-headin">
                                                ID
                                            </th>
                                            <th class="table-headin">
                                                BOAT NUMBER
                                            </th>
                                            <th class="table-headin">                                               
                                                NAME
                                            </th>
                                            
                                            <th class="table-headin">
                                                ADDRESS
                                            </th>
                                            <th class="table-headin">
                                                BOAT NAME
                                            </th>
                                            <th class="table-headin">
                                                BOAT COLOR
                                            </th>
                                            <th class="table-headin">
                                                ENGINE MAKE
                                            </th>
                                            <th class="table-headin">
                                                SERIAL NO.
                                            </th>
                                            <th class="table-headin">
                                                RL
                                            </th>
                                            <th class="table-headin">
                                                TL
                                            </th>
                                            <th class="table-headin">
                                                RB
                                            </th>
                                            <th class="table-headin">
                                                TB
                                            </th>
                                            <th class="table-headin">
                                                RD
                                            </th>
                                            <th class="table-headin">
                                                TD
                                            </th>
                                            <th class="table-headin">
                                                GT
                                            </th>
                                            <th class="table-headin">
                                                NT
                                            </th>
                                            <th class="table-headin">
                                                HP
                                            </th>
                                            <th class="table-headin">
                                                OR NUMBER
                                            </th>
                                            <th class="table-headin">
                                               ACTIONS
                                            </th>
                                            <th class="table-headin">
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-con">
                                        <?php 
                                        if ($result->num_rows > 0) 
                                        {
                                            while($row = $result->fetch_assoc()) 
                                            {
                                                $name = $row['fb_opfname'] . ' ' . $row['fb_opmname'] . ' ' . $row['fb_oplname'];
                                                $location = $row['fb_opstreet'] . ', ' . $row['fb_opbarangay'];

                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                                echo '<td>' . htmlspecialchars('') . '</td>';
                                                echo '<td>' . htmlspecialchars($name) . '</td>';
                                                echo '<td>' . htmlspecialchars($location) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_vesselname']) . '</td>';
                                                echo '<td>' . htmlspecialchars('') . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_enginemake']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_serial']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_RL']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_TL']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_RB']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_TB']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_RD']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_TD']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_GT']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_NT']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_horsepower']) . '</td>';
                                                echo '<td>' . htmlspecialchars('') . '</td>';

                                                echo '<td><!-- Add your actions here -->
                                                    <div style="display:flex;justify-content: center;">
                                                        <a href="?action=delete&id=' . htmlspecialchars($row['id']) . '" class="non-style-link">
                                                            <img src="../img/icons/delete-iceblue.svg" style="vertical-align: middle;">
                                                        </a>
                                                    </div>
                                                
                                                </td>';
                                                echo '</tr>';
                                            }
                                        } 
                                        else 
                                        {
                                            echo '<tr><td colspan="20">No results found</td></tr>';
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
    <!--ionicons-script-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>