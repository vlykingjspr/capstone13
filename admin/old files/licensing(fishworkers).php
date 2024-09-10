<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/modal_license.css">
    
    <script src="../js/prof-drp.js" defer></script>
    <script src="../js/search.js" defer></script>
    
    <title>Fishworkers</title>

    
</head>

<body>

<?php

session_start();

    if(isset($_SESSION["user"]))
    {
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='CAGRO - Administrator'){
            header("location: ../login.php");
        }

    }else
    {
        header("location: ../login.php");
        }
    
    include("../conn.php");

    //admin-profile
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
            $sql = "DELETE FROM fishworkerlicense WHERE fw_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $fw_id);
            $stmt->execute();
            $stmt->close();
    
            // Commit the transaction
            $conn->commit();
    
            // Redirect to avoid resubmission
            header("Location: fishworkers.php"); // Replace 'your_page.php' with your actual page
            exit();
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            $conn->rollback();
            echo "Failed to delete record: " . $e->getMessage();
        }
    }

    //update


    $sql = "SELECT
        fishworkerlicense.fw_id,
        fishworkerlicense.fw_gender,
        CONCAT(fishworkerlicense.fw_fname, ' ', fishworkerlicense.fw_mname, ' ', fishworkerlicense.fw_lname) AS name,
        fishworkerlicense.fw_dob,
        CONCAT(fishworkerlicense.fw_street, ', ', fishworkerlicense.fw_barangay, ', ', fishworkerlicense.fw_municipal, ', ', fishworkerlicense.fw_province) AS address,
        fishworkerlicense.fw_OR,
        CONCAT(locatorinvestor.loc_fname, ',', locatorinvestor.loc_mname, ',', locatorinvestor.loc_lname) AS locator
    FROM
        fishworkerlicense
    LEFT JOIN
        locatorinvestor ON fishworkerlicense.fw_id = locatorinvestor.fw_id";

    $result = $conn->query($sql);


?>

    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
    <table class="menu-container" border="0">

        <tr> <!--cagro logo-->
            <td>
                <div style="padding-top:1rem;">
                    <img src="../img/plmslog.jpg" class="selector menu-logo">
                </div>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn ">
                <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                    <div><p class="menu-text">Dashboard</p></div>
                </a>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn">
                <div class="dropdown menu-text non-style-link-menu">
                    <p style="cursor:default;">Clients</p>
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
                    <p style="cursor:default;">Permit</p>
                    <div class="dropdown-content">
                        <a class="ref" href="fishinggears.php">Fishing Gear</a>
                        <a class="ref" href="fishingboats.php">Fishing Vessel</a>
                        <a class="ref" href="fishingcages.php">Fish Cages</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="menu-row menu-active">
           <td class="menu-btn">
                <div class="dropdown menu-text non-style-link-menu">
                    <p style="cursor:default;">Licensing</p>
                    <div class="dropdown-content">
                        <a class="ref" href="licensing.php">Fisherfolks</a>
                        <a class="ref" href="licensing(fishworkers).php">Fishworkers</a>
                    </div>
                </div>
            </td>
        </tr>
        
        <tr class="menu-row ">
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
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHWORKER LICENSING</p>
                                    </div>
                                    

                                    <div class="profile-menu">
                                        <div class="profile-menu-items"><!--notification-->
                                            <img src="../img/icons/notif.svg" class="space img-notif selector">
                                        </div>

                                        <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                            <?php 
                                                if (!empty($userData['u_prof']))
                                                {
                                                    echo '<img class="sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
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
                                            <img src="../img/sus.jpg" class="space img-profile">
                                            <div style="display: block; margin: auto">
                                                <p style="color: black; font-size: 15px; font-weight: bold" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                            </div>
                                        </div>
                                        
                                        <a href="#profile">My Profile</a>
                                        <a href="#settings">Settings</a>
                                        <a href="../logout.php">Logout</a>
                                    </div>

                                </div>      
                            </td>  
                        </tr>

                        <tr>
                            <td class="style-inline">
                                <input type="search" name="search" id="searchInput" class="input-text header-searchbar" placeholder="Search" onkeyup="searchTable()">
                            </td>
                        </tr>

                        <!----------------------------------------------------table-------------------------------------------------------------------------->
                        <tr>
                            <td>
                               <center>
                               <div style="margin:auto; float: right" class="space-top">
                                    <button><a>sort</a></button>
                                </div>
                                <div class="abc">
                                    <table width="100%" class="sub-table scrolldown animy" cellspacing="0">
                                    <thead class="headert"><!--table-header-->
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
                                                RESTRICTIONS
                                            </th>
                                            <th class="table-headin">
                                                TYPE
                                            </th>
                                            <th class="table-headin">
                                               ACTIONS
                                            </th>
                                            <th class="table-headin">
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-con" id="dataTable"><!--table-body-->

                                    <?php 
                                       if ($result->num_rows > 0) 
                                       {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row['fw_id']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['fw_gender']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['fw_dob']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                                            echo '<td>' . htmlspecialchars('1') . '</td>';
                                            echo '<td>' . htmlspecialchars('Fishery License Permit') . '</td>';
                                            echo '<td><!-- Add your actions here -->
                                                <div style="display:flex;justify-content: center;">
                                                    <a href="?action=delete&id=' . htmlspecialchars($row['fw_id']) . '" class="non-style-link">
                                                        <img src="../img/icons/delete-iceblue.svg" style="vertical-align: middle;">
                                                    </a>
                                                </div>
                                            </td>';

                                            echo '<td><!-- status -->
                                            <div style="display:flex;justify-content: center;">
                                                <button class="gen-license-btn" data-id="' . htmlspecialchars($row['fw_id']) . '" style="text-align:center; padding: 5px; border-radius: 5px; border-style:none; cursor: pointer; background-color: #58A773; color: white;">Generate</button>
                                            </div>
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

                        <div id="bbmodal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2>RESTRICTIONS</h2>
                                    <form id="restrictionsForm" action="license/license_fw.php" method="POST">
                                        <div style="display:block;">
                                            <div class="fg-fields-check-slim">
                                                <label class="check-box">(1) SUBSISTENCE
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="1">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(2) FISHWORKER
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="2">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(3) COMMERCIAL
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="3">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(4) TRAPS AND WEIR
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="4">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(5) AQUACULTURE
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="5">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(6) MARICULTURE
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="6">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(7) RECREATIONAL/SPORTS FISHING
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="7">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label class="check-box">(8) EXPERIMENT AND RESEARCH
                                                    <input type="checkbox" class="cbox" name="restrictions[]" value="8">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <button type="submit" style="margin:auto; width:100%; cursor: pointer; background-color: #58A773;" class="cox buttonskie">
                                                CONTINUE TO GENERATE LICENSE
                                            </button>
                                        </div>
                                    </form>
                            </div>
                        </div>


                </table>

        </div>
    </div>
    <!--ionicons-script-->

    <script>
       document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("bbmodal");
        var closeButton = document.querySelector(".close");
        var form = document.getElementById("restrictionsForm");
        var hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "user_id";
        form.appendChild(hiddenInput);

        // Event listener for the "Generate" buttons
        var generateButtons = document.querySelectorAll(".gen-license-btn");
        generateButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var userId = this.getAttribute("data-id");
                hiddenInput.value = userId; // Set the user ID in the hidden input
                modal.style.display = "flex";
                modal.classList.add("active");
            });
        });

        closeButton.onclick = function() {
            modal.style.display = "none";
            modal.classList.remove("active");
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                modal.classList.remove("active");
            }
        }
    });
    </script>

</body>
</html>