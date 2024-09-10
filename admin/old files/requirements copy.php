<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../css/req_table.css">
    <script src="../js/prof-drp.js" defer></script>
    
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
            <td class="menu-btn">
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
        
        <tr class="menu-row">
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
        
        <tr class="menu-row">
            <td class="menu-btn">
                <a href="Activity.php" class="non-style-link-menu"><div><p class="menu-text">Activity Log</p></div></a>
            </td>
        </tr>
        <tr class="menu-row  menu-active">
            <td class="menu-btn">
                <a href="requirements.php" class="non-style-link-menu"><div><p class="menu-text">Requirements & Fees</p></div></a>
            </td>
        </tr>
    </table>
</div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <div class="dash-con">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ REQUIREMENTS</p>
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
                        </>

                        <tr>
                            <td class="style-inline">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search" list="doctors">
                            </td>
                        </tr>

              
<!----------------------------------------------------table-------------------------------------------------------------------------->
                        <tr>
                            <td>
                         
                               <div class="fg-newreg-items" style="margin: top 1rem;">
                                        <div class="fgnew-card-slim">
                                                    <div class="fg-header-slim">
                                                        <p>REQUIREMENT CHECKLIST</p>
                                                    </div>

                                                    <div class="fg-fields-check-slim">

                                                    
                                                    <label class="check-box">BRGY. CLEARANCE/CERTIFICATION
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">CEDULA
                                                        <input type="checkbox" class="cbox"> 
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">FARMC CERTIFICATION
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">2x2 I.D. PICTURE (2PCS)
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">PNP MARITIME CLEARANCE
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">ADMEASUREMENTS
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">FISHERY LICENSE I.D
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">OLD BOAT PERMIT (FOR RENEWAL)
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">OLD PERMIT (RENEWAL)
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="check-box">FISHERY LICENSE I.D
                                                        <input type="checkbox" class="cbox">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    </div>

                                            </div>

                                            <div class="fgnew-card-slim1"><!--card-container-->
                                                <div class="fg-header-slim"><!--card-header-->

                                                <div style="justify-content: space-between; display:flex;">
                                                    <div>
                                                        <p>PAYMENT SECTION</p>
                                                    </div>

                                                    <div style="display: flex; align-items: center;">
                                                        <button onclick="addRow()">Add Payment</butto>
                                                    </div>
                                                </div>
                                                    
                                                </div>

                                                <div class="fgnew-con1">
                                                    <div class="fg-fields-slim"><!--card-contents-->
                                                        <table class="req-table" style="border-spacing: 0; margin: 0; padding: 0;" id="paymentTable">
                                                            <thead>
                                                                <tr>
                                                                    <th class="req-border" width="30%">List of Payments</th>
                                                                    <th class="req-border"  width="20%">Amount</th>
                                                                    <th class="req-border" width="20%">QTY</th>
                                                                    <th class="req-border" width="20%">Sub-Total</th>
                                                                    <th width="15%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>      
                                                    </div>
                                                </div>

                                                <div class="style-inline space-top space-bot" style="border-top: 1px solid black">
                                                    <div style="float: right">
                                                        <label id="total-lbl" style="color: black; margin: auto">Total:</label>
                                                        <input type="number" for="total-lbl" style=" margin: auto" readonly class="input-drp">
                                                    </div>
                                                </div>

                                                
                                            </div>
                                            
                                    </div>
                                    

                              
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="justify-content:center; display: flex">
                                    <button style>Generate List</button>
                                </div>
                                
                            </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>
    <!--ionicons-script-->
    <script>
        function addRow() {
            var table = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            for (var i = 0; i < 4; i++) {
                var newCell = newRow.insertCell(i);
                if (i == 0) {
                    newCell.innerHTML = '<input type="text" style="outline:none; width:100%; height: 30px; text-align: center"/>';
                } else {
                    newCell.innerHTML = '<input type="number" style="width:100%; outline:none; height: 30px;" />';
                }
            }
            var actionCell = newRow.insertCell(4);
            actionCell.innerHTML = '<button onclick="deleteRow(this)">Delete</button>';
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
        
</body>
</html>