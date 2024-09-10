<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <script src="../js/prof-drp.js" defer></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    <script src="jquery-3.7.1.min.js"></script>
    
    <title>Fishing Boats</title>

    
</head>

<body>
    
<?php
session_start();
include("../conn.php");

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // If not logged in, redirect to login page
    header("Location: ../login.php");
    exit();
}

// Check if the user type is valid
$userType = $_SESSION['usertype'];
if ($userType != 'Fishworker' && $userType != 'Fisherfolks' && $userType != 'Fishcage Operator') {
    // If user type is not valid, redirect to login page
    header("Location: ../login.php");
    exit();
}

$userEmail = $_SESSION["user"];
$query = "";
if ($userType == 'Fishcage Operator') {
    $query = "SELECT u_profile, fc_fname AS fname, fc_mname AS mname, fc_lname AS lname, fc_appell as appell, fc_postal as postal, fc_prov AS prov, fc_municipal AS municipal, fc_brgy AS brgy, fc_street AS street, fc_contact AS contact, u_role, u_email as uemail
              FROM fishcage WHERE u_email = ?";
} elseif ($userType == 'Fishworker') {
    $query = "SELECT u_profile, fw_fname AS fname, fw_mname AS mname, fw_lname AS lname, fw_appell as appell, fw_postal as postal, fw_province AS prov, fw_municipal AS municipal, fw_barangay AS brgy, fw_street AS street, fw_gender as gender, fw_contact AS contact, fw_OR as ffor, u_role,u_email as uemail 
              FROM fishworkerlicense WHERE u_email = ?";
} elseif ($userType == 'Fisherfolks') {
    $query = "SELECT u_profile, ff_fname AS fname, ff_mname AS mname, ff_lname AS lname, ff_appell AS appell,ff_postall AS postal,ff_prov AS prov, ff_municipal AS municipal, ff_barangay AS brgy, ff_street AS street, ff_contact AS contact, ff_OR AS ffor, u_role, u_email as uemail
              FROM fisherfolks WHERE u_email = ?";
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

$stmt->close();
$conn->close();
?>

    <div class = "container">

                    
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div style="display: flex; float:left">
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <a href="index.php"><img src="../img/icons/back-butt.png" class="back-img selector" ></a>
                                        </div>
                                        
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ Fishing Boats Registration Form</p>
                                        </div>
                                    </div>
                                        

                                        <div class="profile-menu">
                                           
                                            <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                                <?php 
                                                    if (!empty($userData['u_profile']))
                                                    {
                                                        echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
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
                                                <?php 
                                                    if (!empty($userData['u_profile']))
                                                    {
                                                        echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                                    }
                                                    else
                                                    {
                                                        echo '<img src="../img/user.png" class="space img-profile selector">';
                                                    }
                                                ?>
                                                
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
                            <td>

                                <iframe name="frame" style="display:none;"></iframe>
                                <form id="registrationForm" action="functions/fishingboats_func.php" method="POST" target="frame" enctype="multipart/form-data">
                                    
                                    <div class="fcon fcon-active">
                                       
                                        <div class ="fg-newreg-items">

                                            <div class="fgnew-card">
                                                    <div class="fg-header">
                                                        <p>TYPE OF APPLICATION</p>
                                                    </div>

                                                    <div class="fgnew-con">

                                                        <div class="fg-fields3">

                                                            <label class="check-box">INITIAL REGISTRATION
                                                                <input type="radio" class="cbox" name="radio">
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">ISSUANCE OF NEW <BR>CERRIFICATE OF NUMBER (CN)ISSUANCE of<BR> NEW CERTIFICATE OF NUMBER (CN)
                                                                <input type="radio" class="cbox" name="radio">
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">Re-Issuance of New <br> Certificate of Number (CN)
                                                                <input type="radio" class="cbox" name="radio">
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        </div>
                                                    
                                                    </div>

                                                </div>

                                            <div class="fgnew-card">        

                                                <div class="fg-header">
                                                    <p>PRESENT EMPLOYMENT</p>
                                                </div>
                                                
                                            
                                                <div class="fgnew-con">
                                                    <div class = "fgnew-ph">
                                                        <p>NAME OF OWNER/OPERATOR</p>
                                                    </div>
                                                    
                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="salut">SALUTATION</label>
                                                            <select id="salut"  class="input-drp">
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Mr.">Mrs.</option>
                                                                <option value="Mr.">Ms.</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="firstn">FIRST NAME</label>
                                                            <input type="text" name="fbopfname" id="firstn" class="input-txt" value="<?php echo htmlspecialchars($userData['fname']); ?>" required>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midn">MIDDLE NAME</label>
                                                            <input type="text" name="fbopmname" id="midtn" class="input-txt" value="<?php echo htmlspecialchars($userData['mname']); ?>">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastn">LAST NAME</label>
                                                            <input type="text" name="fboplname" id="lastn" class="input-txt"value="<?php echo htmlspecialchars($userData['lname']); ?>">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="appl">APPELLATION</label>
                                                            <input type="text" name="fbopappel" id="appl" class="input-drp" value="<?php echo htmlspecialchars($userData['appell'] ?? ''); ?>">
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS</p>
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">POSTAL CODE</label>
                                                            <input type="number" name="fpostal" id="postal" class="input-drp" value="<?php echo htmlspecialchars($userData['postal'] ?? ''); ?>">
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">PROVINCE</label>
                                                            <input type="text"  name="fbopprov" id="prov" class="input-txt" class="input-txt" value="<?php echo htmlspecialchars($userData['prov'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cimu">CITY/MUNICIPAL</label>
                                                            <input type="text"  name="fbopcity" id="cimu" class="input-txt" value="<?php echo htmlspecialchars($userData['municipal'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="brngy">BARANGAY</label>
                                                            <input type="text"  name="fbopbrgy" id="brngy" class="input-txt" value="<?php echo htmlspecialchars($userData['brgy'] ?? ''); ?>">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="strt">STREET</label>
                                                            <input type="text"  name="fbopstreet" id="strt" class="input-drp" value="<?php echo htmlspecialchars($userData['street'] ?? ''); ?>">
                                                        </div>

                                                        <div>
                                                            <input type="text" name="u_email" value="<?php echo htmlspecialchars($userData['uemail'] ?? ''); ?>" hidden>
                                                        </div>
                                                    </div>


                                                    <div class="fg-fields-L">
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="hport">HOMEPORT</label>
                                                            <input type="text"  name="fbhport" id="hport" class="input-txt-L" >
                                                        </div>
                                                    
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="vesseln">NAME OF FISHING VESSEL</label>
                                                            <input type="text"  name="fbvesseln" id="vesseln" class="input-txt-L" >
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="vtype">VESSEL TYPE</label>
                                                            <select id="vtype"   name="fbvtype" class="input-drp-L" >
                                                                <option >Motorized</option>
                                                                <option >Non-Motorized</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="fg-fields-L">
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="pbuilt">PLACE BUILT</label>
                                                            <input type="text" name="fbvbuiltp" id="pbuilt" class="input-txt-L" >
                                                        </div>
                                                    
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="ybuilt">YEAR BUILT</label>
                                                            <input type="text" name="fbvbuilty" id="ybuilt" class="input-txt-L" >
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="mused">MATERIAL USED</label>
                                                            <select id="mused" name="fbvmaterial" class="input-drp-L" >
                                                                <option disabled></option>
                                                                <option >Wood</option>
                                                                <option >Fiber Glass</option>
                                                                <option >Composite</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                         
                                            </div>

                                            <div class="butt-con">
                                                <a href="#" class="btn nxt-butt">Next</a>
                                            </div>
    
                                        </div>

                                        
                                        
                                    </div>

<!-------------------------------------------------------------------------------------Second-Tab------------------------------------------------------------------------------------------------------------------------>
                                    <div class="fcon">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>FISHING DIMENSION AND TONNAGE (METERS)</p>
                                                </div>
    
                                                <div class="fgnew-con space-top" >
                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="RL">REGISTERED LENGTH</label>
                                                            <input type=number step=0.01 name="fbRL" id="RL" class="input-txt" required>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="RB">REGISTERED BREADTH</label>
                                                            <input type=number step=0.01 name="fbRB" id="RB" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="RD">REGISTERED DEPTH</label>
                                                            <input type=number step=0.01  name="fbRD" name="fbRL" id="RD" class="input-txt" >
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="TL">TONNAGE LENGTH</label>
                                                            <input type=number step=0.01  name="fbTL" id="TL" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="TB">TONNAGE BREADTH</label>
                                                            <input type=number step=0.01 name="fbTB" id="TB" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="TD">TONNAGE DEPTH</label>
                                                            <input type=number step=0.01 name="fbTD" id="TD" class="input-txt" >
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="GT">GROSS TONNAGE</label>
                                                            <input type=number step=0.01 name="fbGT" id="GT" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="NT">NET TONNAGE</label>
                                                            <input type=number step=0.01 name="fbNT" id="NT" class="input-txt" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>PARTICULARS OF PROPULSION SYSTEM</p>
                                                </div>
    
                                                <div class="fgnew-con space-top">
                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">ENGINE MAKE</label>
                                                            <input type="text" name="fbENGINE" id="postal" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">SERIAL NUMBER</label>
                                                            <input type="text" name="fbSERIAL" id="prov" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cimu">HORSEPOWER</label>
                                                            <input type=number step=0.01 name="fbHP" id="cimu" class="input-txt" >
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <div class="butt-con">
                                                <a href="#" class="btn prev-butt">Back</a>
                                                <a href="#" class="btn nxt-butt">Next</a>
                                            </div>

                                        </div>

                                        
                                    </div>
                                    

<!------------------------------------------------------------------------------------Third--Tab------------------------------------------------------------------------------------------------------------------------------------------>
                                    
                                    

                                    <div class="fcon">
                                        <div class="fg-newreg-items">

                                        
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>CLASSIFICATION OF FISHING GEAR</p>
                                                </div>
    
                                                <div class="fgnew-con" style="padding-top: 1.5rem;">
                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="hook">HOOK AND LINES</label>
                                                            <select id="hook" class="input-drp-L" >
                                                                <option>Simple-hand line</option>
                                                                <option>Multiple-hand line</option>
                                                                <option>Bottom set long line</option>
                                                                <option>Drift long line</option>
                                                                <option>Troll line</option>
                                                                <option>Jig</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="trap">POSTS AND TRAPS</label>
                                                            <select id="traps" class="input-drp-L" >
                                                                <option>Fish pots</option>
                                                                <option>Crabs Pots</option>
                                                                <option>Squid pots</option>
                                                                <option>Fyke nets/ Filter nets</option>
                                                                <option>Fish Corrals (Baklad)</option>
                                                                <option>Set Net (Lambaklad)</option>
                                                                <option>barrier Net (Likus)</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cimu">PUSH NETS</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option>Man push nets</option>
                                                                <option>Scoop nets</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">GILL NETS</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option>Surface set</option>
                                                                <option>Bottom set gill net</option>
                                                                <option>Mid water set net</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">LIFT NETS</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option>Crab Lift Nets</optio>
                                                                <option>Fish Lift (basnig)/BAgnet</option>
                                                                <option>"New Look" or "Bintol"</option>
                                                                <option>Shrimp Lift Nets</option>
                                                                <option>Lever nets</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cimu">SEINE NETS</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option>Beach Seine</option>
                                                                <option>Fry dozer or gatherer</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">FALLING GEAR</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option>Cast Net</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">MISCELLANEOUS FISHING GEARS</label>
                                                            <select id="mused" class="input-drp-L" >
                                                                <option value="Mr."></option>
                                                                <option value="Mr.">WIP</option>
                                                                <option value="Mr.">WIP</option>
                                                                <option value="Mr.">WIP</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">OTHERS</label>
                                                            <input type="number" id="prov" class="input-txt" >
                                                        </div>

                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <div class="butt-con">
                                                <a href="#" class="btn prev-butt">Back</a>
                                                <button class="btn" type="submit" type="button" name="submit" onclick="submitForm()">SUBMIT</button>
                                            </div>
                                            

                                        </div>
                                        
                                    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                   
                                             
                            </form>
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <div style="display:flex; flex-direction:column;">
                                            <img class="center" src="../img/icons/check.png">
                                            <h3 class="center" style="color: #3E897B;">Registered</h3>                          
                                        </div>
                                    </div>
                                </div>             

                            </td>
                            </tr>
                </table>

           </div>

        </div>
        </div>
    </div>
    <!--ionicons-script-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

<script>
        $(document).ready(function() {
            // Prevent form submission on Enter key press
            $('#registrationForm').on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        });
    </script>

    <script>
        function submitForm() {
            var form = document.getElementById('registrationForm');
            var modal = document.getElementById('myModal');

            if (form.checkValidity()) {
                // Create a FormData object
                var formData = new FormData(form);

                // Create an XMLHttpRequest object
                var xhr = new XMLHttpRequest();
                xhr.open('POST', form.action, true); // Use the form's action URL

                // Define the callback for when the request completes
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Successfully submitted
                        modal.style.display = "block"; // Show the modal
                        setTimeout(function() {
                            modal.style.display = "none"; // Hide the modal
                            window.location.href = 'index.php'; // Adjust URL if needed
                        }, 3000);
                    } else {
                        // Handle server errors
                        alert('An error occurred while submitting the form.');
                    }
                };

                // Send the form data
                xhr.send(formData);
            } else {
                // If the form is not valid, show an alert or handle the error
                alert('Please fill out all required fields.');
            }
        }

        // Close the modal when the user clicks outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="js/payment.js"></script>
</body>
</html>