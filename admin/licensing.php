<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/modal_license.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/search.js" defer></script>

    <title>Fisherfolks</title>


</head>

<body>

    <?php

    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'CAGRO - Administrator') {
            header("location: ../login.php");
        }
    } else {
        header("location: ../login.php");
    }
    include("../conn.php");

    //admin-profile
    $userEmail = $_SESSION["user"];
    $query = "";
    if ($_SESSION['usertype'] == 'CAGRO - Administrator') {
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

    $sqlgg = "SELECT client_id, client_gender,client_fname, client_mname, client_lname, client_dob,client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type FROM licensing";
    $result = $conn->query($sqlgg);
    ?>


    <div class="container">

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
                            <div>
                                <p class="menu-text">Dashboard</p>
                            </div>
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
                        <a href="licensing.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Licensing</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row ">
                    <td class="menu-btn">
                        <a href="Activity.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Activity Log</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="requirements.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Requirements & Fees</p>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

        <div class="dash-body">
            <div class="dash-con">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                    <tr>
                        <td>
                            <div class="style-inline" style="display: flex; justify-content: space-between">
                                <div class="animx">
                                    <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHERFOLK LICENSING</p>
                                </div>


                                <div class="profile-menu">
                                    <div class="profile-menu-items"><!--notification-->
                                        <img src="../img/icons/notif.svg" class="space img-notif selector">
                                    </div>

                                    <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                        <?php
                                        if (!empty($userData['u_prof'])) {
                                            echo '<img class="sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
                                        } else {
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
                                                    RESTRICTIONS
                                                </th>
                                                <th class="table-headin">
                                                    TYPE
                                                </th>
                                                <th class="table-headin">
                                                    ACTIONS
                                                </th>
                                                <th class="table-headin">
                                                    GENERATE
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="table-con" id="dataTable">

                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $ffid = $row["client_id"];
                                                    $name = $row['client_fname'] . ' ' . $row['client_mname'] . ' ' . $row['client_lname'];
                                                    $location = $row['client_street'] . ', ' . $row['client_brgy'] . ', ' . $row['client_municipal'] . ', ' . $row['client_municipal'];

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
                                                            <i class="bi bi-trash delete-icon icon-size icon-delete" 
                                                            style="cursor: pointer;" 
                                                            onclick="confirmDelete(' . htmlspecialchars($row['client_id']) . ', \'licensing\')"></i>
                                                        </div>
                                                    </td>';

                                                    echo '<td><!-- status -->
                                                            <span class="gen-license-btn stats-complete" data-id="' . htmlspecialchars($row['client_id']) . '">Generate</span>
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

                    <div id="bbmodal" class="modal">
                        <div class="modal-content">

                            <div>
                                <span class="close">&times;</span>
                            </div>

                            <h2 class="modal-heading">RESTRICTIONS</h2>
                            <!-- <form id="restrictionsForm" action="license/license_ff.php" method="POST"> -->
                            <form id="restrictionsForm" action="generate_license/generate_license_fw.php" method="POST">
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
    </div>
    <!--ionicons-script-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("bbmodal");
            var closeButton = document.querySelector(".close"); // Correctly selecting the close button
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

            // Fixing the close button event listener
            closeButton.onclick = function() {
                modal.style.display = "none";
                modal.classList.remove("active");
            };

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    modal.classList.remove("active");
                }
            };
        });
    </script>

</body>

</html>