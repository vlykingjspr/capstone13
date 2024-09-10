<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <script src="js/img.js" defer></script>
    
    <title>Users</title>

    
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

    //addusers

    $sql = "SELECT u_id, u_fname, u_lname, u_email, u_pass, u_role, u_prof FROM users";
    $result = $conn->query($sql);
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
                        <td class="menu-btn menu-icon-patient menu-active menu-icon-dashbord-active">
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
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING BOATS</p>
                                        </td>
                                    </tr>  
                                </table>
                            </td>

                            <td width="7%">
                                
                            </td>
                        </tr>

                        <tr >
                            <td colspan="2" style="padding-left: 2%;">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search">
                                <button class="add-btn" id="myBtn"><a href="#" style="text-decoration:none; color:white"><img src="../img/icons/add.svg" style="vertical-align: middle;"><span>ADD/REGISTER</span></a></button>
                            </td>
                            
                        </tr>

                        <!---------------------------------------------------tabs--------------------------------------------->
                        <tr>
                        
                            <td width="1%">
                                <button class="butt-active gen-butt1 animx" hidden><a href="fishingcages.php">Registered to Operate Marine Fish Cage</a></button>
                            </td>

                            <td colspan="2">
                                <button class="butt gen-butt" hidden><a href="fishingboats(motorized).php" >Motorized</a></button>
                            </td>

                            <td colspan="2">
                                <button class="sort-butt"><a>SORT</a></button>
                            </td>
                        
                        </tr>

                        
<!----------------------------------------------------------------------------------------------table-------------------------------------------------------------------------->
                        <tr>
                            <td colspan="4">
                               <center>
                                <div class="abc scroll">
                                    <table width="100%" class="sub-table scrolldown animy" cellspacing="0">
                                    <thead class="headert"><!--table header-->
                                        <tr>
                                            <th class="table-headin">
                                                ID
                                            </th>
                                            <th class="table-headin">
                                                USER FULLNAME
                                            </th>
                                            <th class="table-headin">                                               
                                                EMAIL
                                            </th>
                                            <th class="table-headin">
                                                ROLE
                                            </th>
                                            <th class="table-headin">
                                               ACTIONS
                                            </th>
                                            <th class="table-headin">
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-con"><!--table contents-->
                                    <?php 
                                        if ($result->num_rows > 0) 
                                        {
                                            while($row = $result->fetch_assoc()) 
                                            {
                                                $name = $row['u_fname'] . ' ' . $row['u_lname'];

                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($row['u_id']) . '</td>';
                                                echo '<td>' . htmlspecialchars($name) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['u_email']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['u_role']) . '</td>';
                                                echo '<td><!-- Add your actions here -->
                                                    <div style="display:flex;justify-content: center;">
                                                        <a href="?action=delete&id=' . htmlspecialchars($row['u_id']) . '" class="non-style-link">
                                                            <img src="../img/icons/delete-iceblue.svg" style="vertical-align: middle;">
                                                        </a>
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

<!--------------------------------------------------------------------------------------------------modals------------------------------------------------------------------------------------------------------->
                            <div id="myModal" class="modal">
                                <div class="modal-content" >
                                    <span class="close">&times;</span>
                                    <h2>Add User</h2>
                                    <form action="users.php" method="post">
                                        
                                        <div style="display:flex; flex-direction:column;">
                                            <img class="center" style="height:100px; width:100px; border-radius:50%; border-style:solid" src="../img/user.png" id="img-prev">
                                            <input class="cox" name="prof" id="input-file" type="file" accept="image/*" hidden>
                                            <button type="button" style="border-radius:10px; width: 12%; margin-top:12px;" class="center" onclick="document.getElementById('input-file').click();">Edit<img style="vertical-align: middle;" src="../img/icons/edit-iceblue.svg"></button>

                                            <input class="cox" type="text" name="fname" placeholder="First Name" required>
                                            <input class="cox" type="text" name="lname" placeholder="Last Name" required>
                                            <input class="cox" type="password" name="password" placeholder="Password" required>
                                            <input class="cox" type="email" name="email" placeholder="Email" required>
                                            <select class="cox" name="role" placeholder="Choose Role">
                                                <option selected="true" disabled="disabled">Role</option>
                                                <option>Admin</option>
                                                <option>Section Head</option>
                                            </select>
                                            <button style="margin-top:15px;" class="cox buttonskie" name ="submit" type="submit">Create Account</button>
                                        </div>                                      
                                    </form>
                                </div>
                            </div>
                                        
                     <?php 
                        if (isset($_POST['submit'])) {
                            include("../conn.php");
                        
                            // add users
                            $fn = $_POST['fname'];
                            $ln = $_POST['lname'];
                            $pw = $_POST['password'];
                            $em = $_POST['email'];
                            $r = $_POST['role'];
                            $pr = $_POST['prof'];
                        
                            $fb_sql = "INSERT INTO users (u_fname, u_lname, u_pass, u_email, u_role, u_prof) VALUES (?, ?, ?, ?, ?, ?)";
                        
                            if ($stmt = $conn->prepare($fb_sql)) {
                                $stmt->bind_param("ssssss", $fn, $ln, $pw, $em, $r, $pr);
                        
                                if ($stmt->execute()) {
                                    echo "<script>alert('User Account Created Successfully');</script>";
                                    echo "<script>window.location.href='users.php'</script>";

                                } else {
                                    echo "<script>alert('Error Creating User Account');</script>";
                                }
                        
                                $stmt->close();
                            } else {
                                echo "<script>alert('Error preparing statement');</script>";
                            }
                        
                            $conn->close();
                        }

                        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) 
                            {
                                $fg_id = intval($_GET['id']);
                            
                                // Start a transaction
                                $conn->begin_transaction();
                            
                                try {
                                    //delete from the parent table
                                    $sql = "DELETE FROM users WHERE u_id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $fg_id);
                                    $stmt->execute();
                                    $stmt->close();
                            
                                    // Commit the transaction
                                    $conn->commit();
                            
                                    // Redirect to avoid resubmission
                                    echo "<script>window.location.href='users.php'</script>"; // Replace 'your_page.php' with your actual page
                                    exit();
                                } catch (Exception $e) {
                                    // Rollback the transaction in case of error
                                    $conn->rollback();
                                    echo "Failed to delete record: " . $e->getMessage();
                                }
                            }
                                            
                     ?>

                            

                </table>

           </div>

        </div>
    </div>
    <!--ionicons-script-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<script>
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script type='text/javascript'>
    function refreshPage(){
    console.log("Refreshing page");
    location.reload ? location.reload() : location = location;
    }
</script>

</body>
</html>