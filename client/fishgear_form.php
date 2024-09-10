<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/prof-drp.js" defer></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    
    <title>Fishing Gears</title>

    
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
    $query = "SELECT u_profile, fc_fname AS fname, fc_mname AS mname, fc_lname AS lname, fc_appell as appell, fc_postal as postal, fc_prov AS prov, fc_municipal AS municipal, fc_brgy AS brgy, fc_street AS street, fc_contact AS contact, u_role, u_email as uemail, 
              FROM fishcage WHERE u_email = ?";
} elseif ($userType == 'Fishworker') {
    $query = "SELECT u_profile, fw_fname AS fname, fw_mname AS mname, fw_lname AS lname, fw_appell as appell, fw_postal as postal, fw_province AS prov, fw_municipal AS municipal, fw_barangay AS brgy, fw_street AS street, fw_gender as gender, fw_contact AS contact, u_email as uemail, fw_OR as ffor, u_role 
              FROM fishworkerlicense WHERE u_email = ?";
} elseif ($userType == 'Fisherfolks') {
    $query = "SELECT u_profile, ff_fname AS fname, ff_mname AS mname, ff_lname AS lname, ff_appell AS appell,ff_postall AS postal,ff_prov AS prov, ff_municipal AS municipal, ff_barangay AS brgy, ff_street AS street, ff_contact AS contact, ff_OR AS ffor, u_role , u_email as uemail
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

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            
        </div>
                
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
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ Fishing Gears Registration Form</p>
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

                            <form id="myForm" action="functions/fishgear_func.php" method="POST" enctype="multipart/form-data">

                                    <div class="fcon fcon-active">
                                       
                                        <div class ="fg-newreg-items">

                                            <div class="fgnew-card">        

                                                <div class="fg-header">
                                                    <p>PRESENT EMPLOYMENT</p>
                                                </div>
                                                
                                            
                                                <div class="fgnew-con">
                                                    <div class = "fgnew-ph">
                                                        <p>COMPLETE NAME OF LOCATOR</p>
                                                    </div>
                                                    
                                                    <div class="fg-fields">

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="salut">SALUTATION</label>
                                                        <select id="salut" class="input-drp">
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                            <option value="Ms.">Ms.</option>
                                                        </select>
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="firstn">FIRST NAME</label>
                                                        <input type="text" name="fg_fname" id="firstn" class="input-txt" value="<?php echo htmlspecialchars($userData['fname']); ?>" required>
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="midtn">MIDDLE NAME</label>
                                                        <input type="text" name="fg_mname" id="midtn" class="input-txt" value="<?php echo htmlspecialchars($userData['mname']); ?>">
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="lastn">LAST NAME</label>
                                                        <input type="text" name="fg_lname" id="lastn" class="input-txt" value="<?php echo htmlspecialchars($userData['lname']); ?>">
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="appell">APPELLATION</label>
                                                        <input type="text" name="fg_appell" id="appell" class="input-drp" value="<?php echo htmlspecialchars($userData['appell'] ?? ''); ?>">
                                                    </div>

                                                        <input type="hidden" name="u_email" value="<?php echo htmlspecialchars($userData['uemail'] ?? ''); ?>">
                                                    </div>
                                                    
                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS OF LOCATOR</p>
                                                    </div>

                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">POSTAL CODE</label>
                                                            <input type="number" id="postal" name="fgpostal" class="input-drp" value="<?php echo htmlspecialchars($userData['postal'] ?? ''); ?>">
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">PROVINCE</label>
                                                            <input type="text" name="fg_prov" id="prov" class="input-txt" value="<?php echo htmlspecialchars($userData['prov'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="citymuni">CITY/MUNICIPAL</label>
                                                            <input type="text" name="fg_city" id="citymuni" class="input-txt" value="<?php echo htmlspecialchars($userData['municipal'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="brgy">BARANGAY</label>
                                                            <input type="text" name="fg_brgy" id="brgy" class="input-txt" value="<?php echo htmlspecialchars($userData['brgy'] ?? ''); ?>">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="street">STREET</label>
                                                            <input type="text" name="fg_street" id="street" class="input-drp" value="<?php echo htmlspecialchars($userData['street'] ?? ''); ?>">
                                                        </div>

                                                        <div>
                                                            <input type="text" name="u_email" value="<?php echo htmlspecialchars($userData['uemail'] ?? ''); ?>" hidden>
                                                        </div>
                                                       
                                                    </div>

                                                    <div class="fg-fields-L">
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="cnumber">CONTACT NUMBER</label>
                                                            <input type="tel" id="cnumber" name="fg_contact" class="input-txt" placeholder="+63" value="<?php echo htmlspecialchars($userData['contact'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="or">OR NUMBER</label>
                                                            <input type="number" id="or" name="fg_OR" class="input-txt" value="<?php echo htmlspecialchars($userData['ffor'] ?? ''); ?>">
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="gender">GENDER</label>
                                                            <select id="gender" name="fg_gender" class="input-drp">
                                                                <option value="Male" <?php if (isset($userData['gender']) && $userData['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                                                <option value="Female" <?php if (isset($userData['gender']) && $userData['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    

                                                </div>

                                            
                                            </div>
                                        
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>ADMEASUREMENTS</p>
                                                </div>
    
                                                <div class="fgnew-con">
                                                    <div class = "fgnew-ph">
                                                        <p>TYPES OF GEAR APPLIED</p>
                                                    </div>
                                                    
                                                <div class="fgch">

                                                <div class="fg-fields-check">
                                                    <label for="buntol" class="check-box">MODIFIED FISH CORAL (BUNSOD WITH BINTOL)
                                                        <input type="radio" class="cbox" name="fg_type" id="buntol" value="MODIFIED FISH CORAL (BUNSOD WITH BINTOL)">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label for="fishcoral" class="check-box">FISH CORAL (BUNSOD)
                                                        <input type="radio" class="cbox" name="fg_type" id="fishcoral" value="FISH CORAL (BUNSOD)">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label for="pagumad" class="check-box">DEEP SEA FISH CORAL (PAGUMAD)
                                                        <input type="radio" class="cbox" name="fg_type" id="pagumad" value="DEEP SEA FISH CORAL (PAGUMAD)">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label for="bagnet" class="check-box">STATIONARY BAGNET (BINTOL, NEW LOOK)
                                                        <input type="radio" class="cbox" name="fg_type" id="bagnet" value="STATIONARY BAGNET (BINTOL, NEW LOOK)">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="fg-fields-check">
                                                    <label class="check-box">Others
                                                        <input type="radio" style="float: left; margin-top: 5px;" class="cbox" id="cb" name="fg_type" value="others" onchange="handleRadioChange()">
                                                        <span class="checkmark"></span>

                                                        <div style="margin-left: 1rem;" class="fg-fields-input">
                                                            <label class="lbl" for="spec">PLS. SPECIFY</label>
                                                            <input type="text" id="spec" class="input-txt" onchange="handleTextChange()" disabled>
                                                        </div>
                                                    </label>
                                                </div>

                                                </div>

                                                </div>

                                            </div>

                                            <div class="butt-con">
                                                <a href="#" class="btn nxt-butt">Next</a>
                                            </div>

                                        </div>
  
                                    </div>

<!------------------------------------------------------------------------------------Second--Tab------------------------------------------------------------------------------------------------------------------------------------------>
                                    
                                    <div class="fcon" style="padding-top: 4rem;">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>REGISTERED DIMENSIONS</p>
                                                </div>
    
                                                <div class="fgnew-con" style="padding-top: 2.5rem;">
                                                    
                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="wings">WINGS</label>
                                                        <input type="text" id="wings" class="input-txt1" name="fg_wing"  required>
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="center">CENTER LINE</label>
                                                        <input type="text" id="center" class="input-txt1" name="fg_center">
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="otherspec">OTHER SPECIFICATION</label>
                                                        <input type="text" id="otherspec" class="input-txt1" name="fg_other">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="butt-con">
                                                <a href="#" class="btn prev-butt">Back</a>
                                                <button class="btn" type="submit" name="submit">SUBMIT</button>
                                            </div>

                                        </div>  
                                        
                                    </div>

                                </form>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                               
                            </td>
                        </tr>

                        

                </table>

           </div>

        </div>
    <!--ionicons-script-->
    <script>
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
  
    <script>
        $(document).ready(function() {
            // Prevent form submission on Enter key press
            $('#myForm').on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        });
    </script>

    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); 

            const form = document.getElementById("myForm");

            
            function checkRequiredFields() {
                const requiredFields = form.querySelectorAll("[required]");
                let allFieldsFilled = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        allFieldsFilled = false;
                        field.classList.add("error"); 
                    } else {
                        field.classList.remove("error");
                    }
                });

                return allFieldsFilled;
            }

            if (checkRequiredFields()) {
              
                const formData = new FormData(form);

                fetch('fg_func.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response.trim() === "success") {
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Registered',
                            confirmButtonText: 'OK',
                            customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            content: 'custom-swal-content',
                            confirmButton: 'custom-ok-button'
                        }
                        }).then(() => {
                            
                            window.location.href = '../index.php';
                        });
                    } else {
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Submission Error',
                            text: response,
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error',
                        text: 'There was an error connecting to the server. Please try again.',
                        confirmButtonText: 'OK'
                    });
                });
            } else {
              
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Form',
                    text: 'Please fill in all required fields before submitting.',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>

</body>
</html>