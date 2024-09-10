<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    
    <title>Dashboard</title>

    
</head>

<body>

<?php

    session_start();

    if(isset($_SESSION["user"]))
    {
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='Section Head'){
            header("location: ../login.php");
        }

    }else
    {
        header("location: ../login.php");
    }
    
    include("../conn.php");

    //fetch data based on logged user
    $userEmail = $_SESSION["user"];
    $query = "";
    if ($_SESSION['usertype']== 'Section Head') 
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

   //delete
   if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) 
   {
       $fw_id = intval($_GET['id']);
   
       // Start a transaction
       $conn->begin_transaction();
   
       try {
           // Delete from the child table first to avoid foreign key constraint violations
           $sql = "DELETE FROM locatorinvestor WHERE fw_id = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $fw_id);
           $stmt->execute();
           $stmt->close();
   
           // Then delete from the parent table
           $sql = "DELETE FROM licensing WHERE client_id = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $fw_id);
           $stmt->execute();
           $stmt->close();
   
           // Commit the transaction
           $conn->commit();
   
           // Redirect to avoid resubmission
           header("Location: dashboard(approved).php"); // Replace 'your_page.php' with your actual page
           exit();
       } catch (Exception $e) {
           // Rollback the transaction in case of error
           $conn->rollback();
           echo "Failed to delete record: " . $e->getMessage();
       }
   }

   //update



  

   $sqlgg = "SELECT client_id, client_gender,client_fname, client_mname, client_lname, client_dob,client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type FROM licensing";
   $result = $conn->query($sqlgg);

?>
    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            <table class="menu-container" border="0">
                    <tr>
                        <td>
                            <div class="sechead-main-container space-top space-bot">
                                <div class="sechead-prof-container">
                                    <img class="sechead-prof-img selector" src="../img/user.png"><!--replace this if there is an existing image file in database-->
                                </div>

                                <div class="sechead-prof-container">
                                    <p class="profile-title"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                    <p class="profile-subtitle"><?php echo $userData['urole'] ?></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="menu-row" >
                        <td class="menu-btn" >
                            <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-active">
                            <a href="fisherfolks.php" tabindex="-1" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn">
                            <a href="#" class="non-style-link-menu "><div><p class="menu-text">Settings</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn">
                            <a href="../logout.php" class="non-style-link-menu "><div><p class="menu-text">Logout</p></a></div>
                        </td>
                    </tr>
                    
            </table>
        </div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
<!--------------------------------------------------------------------Header------------------------------------------------------------------------------------------------------>

                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ DASHBOARD</p>
                                    </div>
                                </div> 
                            </td>
                        </tr>
<!--------------------------------------------------------------------searchbar------------------------------------------------------------------------------------------------------>  

                        <tr>
                            <td class="style-inline">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search" list="doctors">
                            </td>
                        </tr>

<!--------------------------------------------------------------------tabs------------------------------------------------------------------------------------------------------>

                        <tr>
                            <td>
                                <div class="space-top tab-container animx">
                                    <a href="dashboard.php">
                                        <div class="tab">
                                            <p class="tab-text">FOR APPROVAL</p>
                                        </div>
                                    </a>

                                    <a href="dashboard(approved).php">
                                        <div class="tab tab-active">
                                            <p class="tab-text">APPROVED</p>
                                        </div>
                                    </a>
                                        
                                </div>
                            </td>
                        </tr>

<!--------------------------------------------------------------------table------------------------------------------------------------------------------------------------------>
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
                                                GENDER
                                            </th>
                                            <th class="table-headin">                                               
                                                NAME
                                            </th>
                                            <th class="table-headin">
                                                BIRTHDAY
                                            </th>
                                            <th class="table-headin">
                                                ADDRESS
                                            </th>
                                            <th class="table-headin">
                                                OR NUMBER
                                            </th>
                                            <th class="table-headin">
                                                APPROVAL TYPE
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
                                                        $ffid = $row["client_id"];
                                                        $name = $row['client_fname'] . ' ' . $row['client_mname'] . ' ' . $row['client_lname'];
                                                        $location = $row['client_street'] . ', ' . $row['client_brgy']. ', ' .$row['client_municipal']. ', ' .$row['client_municipal'];

                                                        echo '<tr>';
                                                        echo '<td>' . htmlspecialchars($row['client_id']) . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['client_gender']) . '</td>';
                                                        echo '<td>' . htmlspecialchars($name) . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['client_dob']) . '</td>';
                                                        echo '<td>' . htmlspecialchars($location) . '</td>';
                                                        echo '<td>' . htmlspecialchars('') . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['approval_type']) . '</td>';
                                                        echo '<td><!-- Add your actions here -->
                                                            <div style="display:flex;justify-content: center;">
                                                                <a href="?action=delete&id=' . htmlspecialchars($row['client_id']) . '" class="non-style-link">
                                                                    <img src="../img/icons/delete-iceblue.svg" style="vertical-align: middle;">
                                                                </a>
                                                            </div>
                                                        </td>';

                                                        echo '<td><!-- status -->
                                                                <span class="stats-complete">Approved</span>
                                                            </td>';
                                                        echo '</tr>';
                                                    }
                                                } 
                                                else 
                                                {
                                                    echo '<tr><td colspan="9">No results found</td></tr>';
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
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>

    <script>
        function toggle_visibility(id) 
        {
            var e = document.getElementById(id);
            if (e.style.display == 'block') e.style.display = 'none';
            else e.style.display = 'block';


        }
    </script>
</body>
</html>