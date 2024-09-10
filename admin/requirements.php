<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../css/req_table.css">
    <script src="../js/global/prof-drp.js" defer></script>
    
    <title>Requirements</title>

    
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
                        </>
              
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

                                            <div class="fgnew-card-slim1">
                                                <div class="fg-header-slim">
                                                    <div style="justify-content: space-between; display:flex;">
                                                        <div>
                                                            <p>PAYMENT SECTION</p>
                                                        </div>
                                                        <div style="display: flex; align-items: center;">
                                                            <button onclick="addRow()">Add Payment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fgnew-con1">
                                                    <div class="fg-fields-slim">
                                                        <table class="req-table" style="position:sticky;top:0;border-spacing: 0; margin: 0; padding: 0;" id="paymentTable">
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
                                                           
                                                            </tbody>
                                                        </table>      
                                                    </div>
                                                </div>
                                                <div class="style-inline space-top space-bot" style="border-top: 0.5px groove #025193">
                                                    <div style="float: right; display: flex; justify-content:center; align-items:center">
                                                        <label id="total-lbl" style="color: black; margin: auto">Total:</label>
                                                        <input type="number" id="total" style="color: black; margin: auto" readonly class="input-drp">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    

                              
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="justify-content:center; display: flex">
                                    <button class="btn">Generate List</button>
                                </div>
                                
                            </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>
    <!--table-autocalculate-script-->
    <script>
        function addRow() {
            var table = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();

            var paymentCell = newRow.insertCell(0);
            paymentCell.innerHTML = '<input type="text" style="outline:none; width:100%; height: 30px; text-align: center; background-color: #f9f9f9; border: 1px solid #ccc;" />';

            var amountCell = newRow.insertCell(1);
            amountCell.innerHTML = '<input type="number" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />';

            var qtyCell = newRow.insertCell(2);
            qtyCell.innerHTML = '<input type="number" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />';

            var subTotalCell = newRow.insertCell(3);
            subTotalCell.innerHTML = '<input type="number" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" readonly />';

            var actionCell = newRow.insertCell(4);
            actionCell.innerHTML = '<button style="background-color: red; color: white; border: none; padding: 5px 10px;" onclick="deleteRow(this)">Delete</button>';
        }

        function calculateSubTotal(element) {
            var row = element.parentNode.parentNode;
            var amount = parseFloat(row.cells[1].getElementsByTagName('input')[0].value) || 0;
            var qty = parseFloat(row.cells[2].getElementsByTagName('input')[0].value) || 0;
            var subTotalCell = row.cells[3].getElementsByTagName('input')[0];
            subTotalCell.value = (amount * qty).toFixed(2);
            console.log('Sub-Total Updated:', subTotalCell.value);
            calculateTotal();
        }

        function calculateTotal() {
            var table = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var total = 0;
            for (var i = 0; i < rows.length; i++) {
                var subTotal = parseFloat(rows[i].cells[3].getElementsByTagName('input')[0].value) || 0;
                total += subTotal;
            }
            console.log('Total Calculated:', total);
            document.getElementById("total").value = total.toFixed(2);
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            calculateTotal();
        }
    </script>
        
</body>
</html>