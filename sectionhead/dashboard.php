<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <script src="../js/sectionhead/edit_approval.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
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


   $query1 = "SELECT client_id, client_fname AS fname, client_gender, client_mname AS mname, client_lname AS lname, client_prov AS prov, client_municipal AS municipal, client_brgy AS brgy, client_street AS street, client_dob, client_OR, approval_type, u_email FROM section_head";
   $stmt = $conn->prepare($query1);
   $stmt->execute();
   $result = $stmt->get_result();
   

?>
    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            <table class="menu-container" border="0">
                    <tr>
                        <td>
                            <div class="sechead-main-container space-top space-bot">
                                <div class="sechead-prof-container">
                                    <?php
                                        if (!empty($userData['u_prof'])) {
                                            echo '<img class="sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
                                        } else {
                                            echo '<img class="sechead-prof-img selector" src="../img/user.png" alt="Default Profile Image">';
                                        }
                                    ?>
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
                            <a href="dashboard.php" tabindex="-1" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div>
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
                
<!----------------------------------------------------------------Main-Contents--------------------------------------------------------------------------------------------------->

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
                                <input type="search" name="search" id="searchInput" class="input-text header-searchbar" placeholder="Search" onkeyup="searchTable()">
                            </td>
                        </tr>

<!--------------------------------------------------------------------tabs----------------------------------------------------------------------------------------------------------->

                        <tr>        
                            <td>
                                <div class="space-top tab-container animx">
                                    <a href="dashboard.php">
                                        <div class="tab tab-active">
                                            <p class="tab-text">FOR APPROVAL</p>
                                        </div>
                                    </a>

                                    <a href="dashboard(approved).php">
                                        <div class="tab">
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

                                    <tbody class="table-con"  id="dataTable">
                                    <?php 
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                // Ensure you are using the correct column names here
                                                $name = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
                                                $location = $row['street'] . ' ' . $row['brgy'] .', '.$row['municipal'].', '. $row['prov'];

                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($row['client_id']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['client_gender']) . '</td>';
                                                echo '<td>' . htmlspecialchars($name) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['client_dob']) . '</td>';
                                                echo '<td>' . htmlspecialchars($location) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['client_OR']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['approval_type']) . '</td>';
                                                echo '<td><!-- Add your actions here -->
                                                
                                                    <div style="display:flex;justify-content: center;">

                                                        <i class="bi bi-pencil-square edit-icon icon-size icon-edit"
                                                        data-id="' . htmlspecialchars($row['client_id']) . '" 
                                                        data-gender="' . htmlspecialchars($row['client_gender']) . '" 
                                                        data-fname="' . htmlspecialchars($row['fname']) . '" 
                                                        data-mname="' . htmlspecialchars($row['mname']) . '" 
                                                        data-lname="' . htmlspecialchars($row['lname']) . '" 
                                                        data-dob="' . htmlspecialchars($row['client_dob']) . '" 
                                                        data-province="' . htmlspecialchars($row['prov']) . '" 
                                                        data-municipal="' . htmlspecialchars($row['municipal']) . '"
                                                        data-street="' . htmlspecialchars($row['street']) . '" 
                                                        data-barangay="' . htmlspecialchars($row['brgy']) . '"
                                                        data-or="' . htmlspecialchars($row['client_OR']) . '"
                                                        data-type="' . htmlspecialchars($row['approval_type']) . '"
                                                        data-email="' . htmlspecialchars($row['u_email']) . '"  
                                                        style="vertical-align: middle; cursor: pointer;">
                                                        </i>
                                                 
                                                        <i class="bi bi-trash delete-icon icon-size icon-delete" 
                                                        style="cursor: pointer;" 
                                                        onclick="confirmDelete(' . htmlspecialchars($row['client_id']) . ' "></i>

                                                    </div>
                                                </td>';
                                                echo '<td><!-- status -->
                                            
                                                        <span class="stats-pending">For Approval</span>
                                               
                                                </td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="9">No results found</td></tr>';
                                        }
                                        ?>
                                        
                                    </tbody>

                                    </table>
                                </div>
                               </center>
                            </td>
                        </tr>

                                <div id="editModal" class="modal animy">
                                    <div class="modal-content">
                                            <form id="editForm" action="approve/approve.php" method="POST">
                                                <div style="float:right">
                                                    <div>
                                                        <span class="close">&times;</span>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div style="margin-inline:10px">
                                                        <h3 class="modal-head">Edit Details</h3>
                                                    </div>
                                                </div>

                                                <div style="display:flex;">
                                                    <div style="margin-inline:10px">

                                                        <input type="hidden" name="u_id" id="edit-id">

                                                        <div style="margin:auto" class="spacing">
                                                            <label class="modal-label" for="fw_gender">Gender:</label>
                                                            <input class="input-xx" type="text" name="gender" id="edit-gender">
                                                        </div>
                                                        
                                                        <div class="spacing">
                                                            <label class="modal-label" for="fw_fname">First Name:</label>
                                                            <input class="input-xx" type="text" name="fname" id="edit-fname">
                                                        </div>
                                                        
                                                        <div class="spacing">
                                                            <label class="modal-label" for="fw_mname">Middle Name:</label>
                                                            <input class="input-xx" type="text" name="mname" id="edit-mname">
                                                        </div>

                                                        <div class="spacing">
                                                            <label class="modal-label" for="fw_lname">Last Name:</label>
                                                            <input class="input-xx" type="text" name="lname" id="edit-lname">
                                                        </div>
                                                        
                                                        <div class="spacing">
                                                            <label class="modal-label" for="fw_dob">Date Of Birth:</label>
                                                            <input class="input-xx" type="date" name="dob" id="edit-dob">
                                                        </div>

                                                        <div class="spacing">
                                                            <label class="modal-label" for="AT">Approval Type:</label>
                                                            <input class="input-xx" type="text" name="AT" id="edit-type">
                                                        </div>
                                                    </div>

                                                    <div style="margin-inline:10px">
                                                    
                                                        <div class="spacing">
                                                            <label class="modal-label" for="province">Province:</label>
                                                            <input class="input-xx" type="text" name="province" id="edit-province">
                                                        </div>
                                                        
                                                        <div class="spacing">
                                                            <label class="modal-label" for="municipal">Municipal:</label>
                                                            <input class="input-xx" type="text" name="municipal" id="edit-municipal">
                                                        </div>

                                                        <div class="spacing">
                                                            <label class="modal-label" for="barangay">Barangay:</label>
                                                            <input class="input-xx" type="text" name="barangay" id="edit-barangay">
                                                        </div>

                                                        <div class="spacing">
                                                            <label class="modal-label" for="street">Street:</label>
                                                            <input class="input-xx" type="text" name="street" id="edit-street">
                                                        </div>
                                                        
                                                        <div class="spacing">
                                                            <label class="modal-label" for="fw_OR">OR Number:</label>
                                                            <input class="input-xx" type="text" name="OR" id="edit-or">
                                                        </div>

                                                        <input hidden type="text" name="u_email" id="edit-email">
                                                    </div>
                                                </div>
                                                
                                                <div style="display:flex; float:right; padding-top: 1rem">
                                                    <div class="spacing">
                                                        <button type="submit" name="action" class="btn" value="insert" id="insertButton">Approve</button>
                                                    </div>
                                                </div>
                                                
                                               
                                            </form>
                                    </div>
                                </div>

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