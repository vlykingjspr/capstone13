<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    
    <title>Fisherfolks</title>

    
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


    $sql4= "SELECT id, fc_fname, fc_mname, fc_lname, fc_appell, fc_brgy, fc_street FROM fishcage";
    $result = $conn->query($sql4);

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
           <td class="menu-btn menu-active">
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
                
<!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
              
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                    <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING CAGE</p>
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
                                            <img src="../img/user.png" class="space img-profile selector">
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

                        <tr>
                            <td class="style-inline">
                                <input type="search" name="search" id="searchInput" class="input-text header-searchbar" placeholder="Search" onkeyup="searchTable()">
                            </td>
                        </tr>
<!----------------------------------------------------table------------------------------------------------------------------------------------------------------------>
                        <tr>
                            <td>
                               <center>
                               <div style="margin:auto; float: right" class="space-top">
                                    <button><a>sort</a></button>
                                </div>
                                <div class="abc">
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
                                               ACTIONS
                                            </th>
                                            <th class="table-headin">
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-con" id="dataTable">
                                        
                                        <?php 
                                            if ($result->num_rows > 0) 
                                            {
                                                while($row = $result->fetch_assoc()) 
                                                {
                                                    $ffid = $row["id"];
                                                    $name = $row['fc_fname'] . ' ' . $row['fc_mname'] . ' ' . $row['fc_lname'] . ' ' . $row['fc_appell'];
                                                    $location = $row['fc_street'] . ', ' . $row['fc_brgy'];
                                                    

                                                    echo '<tr>';
                                                    echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                                    echo '<td>' . htmlspecialchars('') . '</td>';
                                                    echo '<td class="nametd">' . htmlspecialchars($name) . '</td>';
                                                    echo '<td>' . htmlspecialchars('') . '</td>';
                                                    echo '<td>' . htmlspecialchars($location) . '</td>';
                                                    echo '<td>' . htmlspecialchars('') . '</td>';
                                                    echo '<td><!-- Add your actions here -->
                                                        <div style="display:flex;justify-content: center;">

                                                        <i class="bi bi-trash delete-icon icon-size icon-delete" 
                                                        style="cursor: pointer;" 
                                                        onclick="confirmDelete(' . htmlspecialchars($row['id']) . ', \'fishcage\')"></i>

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

                </table>

           

        </div>
    </div>
    <!--ionicons-script-->
    <script>
        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fish Cage Record?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    htmlContainer: 'custom-swal-text',
                    content: 'custom-swal-content',
                    confirmButton: 'custom-swal-confirm-button',
                    cancelButton: 'custom-swal-cancel-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                 
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "functions/delete.php?action=delete&id=" + id + "&type=" + type, true);  
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the record.',
                                'error'
                            );
                        }
                    };
                    xhr.send();
                }
            });
        }
    </script>
</body>
</html>