<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/edit.js" defer></script>
    <script src="../js/admin/view.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    <script src="../js/admin/button-disabler.js" defer></script>
    <script src="../js/admin/permit_status.js" defer></script>

    <title>Fishworkers</title>
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

    $sql = "SELECT
        fishworkerlicense.fw_id,
        fishworkerlicense.fw_gender, fishworkerlicense.fw_fname,fishworkerlicense.fw_mname,fishworkerlicense.fw_lname,
        fishworkerlicense.fw_street, fishworkerlicense.fw_barangay, fishworkerlicense.fw_municipal, fishworkerlicense.fw_province,
        fishworkerlicense.fw_postal, fishworkerlicense.fw_contact, fishworkerlicense.u_status, fishworkerlicense.approval_type,
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
                    <td class="menu-btn">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text">Dashboard</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-active">
                        <div class="dropdown menu-text non-style-link-menu">
                            <p>Clients</p>
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
                            <p>Permit</p>
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
                        <a href="licensing.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Licensing</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
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
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                <tr>
                    <td>
                        <div class="style-inline" style="display: flex; justify-content: space-between">
                            <div class="animx">
                                <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHWORKERS</p>
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
                                    <img src="../img/user.png" class="space img-profile selector">
                                    <div style="display: block; margin: auto">
                                        <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                    </div>
                                </div>

                                <a href="profile.php">My Profile</a>
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

                <!---------------------------------------------------------------------------------------table-------------------------------------------------------------------------->
                <tr>
                    <td>
                        <center>
                            <div style="margin:auto; float: right" class="space-top">
                                <!-- <button><a>sort</a></button> -->
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
                                                OR NUMBER
                                            </th>
                                            <th class="table-headin">
                                                LOCATOR/INVESTOR
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
                                        if ($result->num_rows > 0) {


                                            while ($row = $result->fetch_assoc()) {
                                                $fwid = $row["fw_id"];
                                                $status = $row['u_status'];

                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($row['fw_id']) . '</td>';
                                                echo '<td class="gentd">' . htmlspecialchars($row['fw_gender']) . '</td>';
                                                echo '<td class="nametd">' . htmlspecialchars($row['name']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fw_dob']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fw_OR']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['locator']) . '</td>';
                                                echo '<td><!-- Add your actions here -->
                                                <div style="display:flex;justify-content: center;">

                                                    <i class="bi bi-pencil-square edit-icon icon-size icon-edit" 
                                                    data-id="' . htmlspecialchars($row['fw_id']) .
                                                    '"data-id-type="fw_id"
                                                     data-gender="' . htmlspecialchars($row['fw_gender']) .
                                                    '" data-fname="' . htmlspecialchars($row['fw_fname']) .
                                                    '" data-mname="' . htmlspecialchars($row['fw_mname']) .
                                                    '" data-lname="' . htmlspecialchars($row['fw_lname']) .
                                                    '" data-dob="' . htmlspecialchars($row['fw_dob']) .
                                                    '" data-contact="' . htmlspecialchars($row['fw_contact']) .
                                                    '" data-postal="' . htmlspecialchars($row['fw_postal']) .
                                                    '" data-province="' . htmlspecialchars($row['fw_province']) .
                                                    '" data-municipal="' . htmlspecialchars($row['fw_municipal']) .
                                                    '" data-barangay="' . htmlspecialchars($row['fw_barangay']) .
                                                    '" data-street="' . htmlspecialchars($row['fw_street']) .
                                                    '" data-or="' . htmlspecialchars($row['fw_OR']) .
                                                    '" data-locator="' . htmlspecialchars($row['locator']) .
                                                    '" data-status="' . htmlspecialchars($row['u_status'])
                                                    . '" style="vertical-align: middle; cursor: pointer;"></i>

                                                    <i class="bi bi-eye view-icon icon-size icon-view"
                                                    data-id="' . htmlspecialchars($row['fw_id']) .
                                                    '" data-gender="' . htmlspecialchars($row['fw_gender']) .
                                                    '" data-fname="' . htmlspecialchars($row['fw_fname']) .
                                                    '" data-mname="' . htmlspecialchars($row['fw_mname']) .
                                                    '" data-lname="' . htmlspecialchars($row['fw_lname']) .
                                                    '" data-dob="' . htmlspecialchars($row['fw_dob']) .
                                                    '" data-contact="' . htmlspecialchars($row['fw_contact']) .
                                                    '" data-postal="' . htmlspecialchars($row['fw_postal']) .
                                                    '" data-province="' . htmlspecialchars($row['fw_province']) .
                                                    '" data-municipal="' . htmlspecialchars($row['fw_municipal']) .
                                                    '" data-barangay="' . htmlspecialchars($row['fw_barangay']) .
                                                    '" data-street="' . htmlspecialchars($row['fw_street']) .
                                                    '" data-or="' . htmlspecialchars($row['fw_OR']) .
                                                    '" data-locator="' . htmlspecialchars($row['locator']) .
                                                    '" data-status="' . htmlspecialchars($row['u_status'])
                                                    . '" style="vertical-align: middle; cursor: pointer;"></i>

                                                    <!-- Delete Button -->
                                                    <i class="bi bi-trash delete-icon icon-size icon-delete" 
                                                    style="cursor: pointer;" 
                                                    onclick="confirmDelete(' . htmlspecialchars($row['fw_id']) . ', \'fishworker\')"></i>
<!-- Add Generate Button -->
    <form action="generate_fw_application/generate_app_fw.php" method="POST" style="display:inline-block;">
        <input type="hidden" name="fw_id" value="' . htmlspecialchars($row['fw_id']) . '">
        <button type="submit" class="btn btn-primary">Generate</button>
    </form>
                                                </div>
                                                </td>';
                                                echo '<td>';
                                                if ($status >= 1 && $status <= 3) {
                                                    echo '<span class="stats-pending">Pending</span>';
                                                } elseif ($status == 4) {
                                                    echo '<span class="stats-complete">Complete</span>';
                                                } elseif ($status == 5) {
                                                    echo '<span class="stats-expiry">Expiry Notice</span>';
                                                }
                                                echo '</td>';

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
                <!------------------------------------------------------------------------edit-modal--------------------------------------------------------------->
                <div id="editModal" class="modal animy">
                    <div class="modal-content">
                        <div>
                            <span class="close">&times;</span>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">Edit Fishworker Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span class=""></span><!--change the span class--></div>
                        </div>

                        <form id="editForm" action="functions/update.php" method="post">
                            <div>
                                <div style="display:flex;" class="space-top">

                                    <div style="margin-inline:10px">
                                        <input type="hidden" name="id" id="edit-id">

                                        <div style="margin:auto" class="spacing">
                                            <label class="modal-label" for="gender">Gender:</label>
                                            <input class="input-xx" type="text" name="gender" id="edit-gender">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fname">First Name:</label>
                                            <input class="input-xx" type="text" name="fname" id="edit-fname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="mname">Middle Name:</label>
                                            <input class="input-xx" type="text" name="mname" id="edit-mname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="lname">Last Name:</label>
                                            <input class="input-xx" type="text" name="lname" id="edit-lname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="dob">Date Of Birth:</label>
                                            <input class="input-xx" type="date" name="dob" id="edit-dob">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="contact">Contact No.:</label>
                                            <input class="input-xx" type="text" name="contact" id="edit-contact">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="AT">Approval Type:</label>
                                            <input class="input-xx" type="text" name="AT" value="Fishery License Permit">
                                        </div>

                                    </div>

                                    <div style="margin-inline:10px">

                                        <div class="spacing">
                                            <label class="modal-label" for="postal">Postal Code:</label>
                                            <input class="input-xx" type="text" name="postal" id="edit-postal">
                                        </div>

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
                                        <div class="spacing">
                                            <label class="modal-label" for="locator">Locator:</label>
                                            <input class="input-xx" type="text" name="locator" id="edit-locator">
                                        </div>
                                    </div>
                                    <input type="hidden" name="form_type" value="fishworker">
                                </div>
                            </div>

                            <div style="display:flex; float:right; padding-top: 1rem">
                                <div class="spacing">
                                    <a class="href_nodesign" href="requirements.php"><button button type="submit" name="action" class="btn" id="reqButton" value="issue_requirements">Issue Requirements</button></a>
                                </div>

                                <div class="spacing">
                                    <button type="submit" name="action" class="btn" value="update">Update</button>
                                </div>

                                <div class="spacing">
                                    <button type="submit" name="action" class="btn" id="insertButton" value="send_for_approval">For Approval</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!------------------------------------------------------------------------view-modal--------------------------------------------------------------->
                <div id="viewModal" class="modal animy">
                    <div class="modal-content">
                        <div style="float:right">
                            <div>
                                <span class="viewclose">&times;</span>
                            </div>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">View Fishworker Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span class=""></span><!--change the span class--></div>
                        </div>

                        <div style="display:flex;" class="space-top">
                            <div style="margin-inline:10px">
                                <input type="hidden" name="id" id="view-id">

                                <div style="margin:auto" class="spacing">
                                    <label class="modal-label" for="view-gender">Gender:</label>
                                    <input class="input-xx" type="text" id="view-gender" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-fname">First Name:</label>
                                    <input class="input-xx" type="text" id="view-fname" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-mname">Middle Name:</label>
                                    <input class="input-xx" type="text" id="view-mname" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-lname">Last Name:</label>
                                    <input class="input-xx" type="text" id="view-lname" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-dob">Date Of Birth:</label>
                                    <input class="input-xx" type="date" name="dob" id="view-dob" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-contact">Contact No.:</label>
                                    <input class="input-xx" type="text" id="view-contact" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="AT">Approval Type:</label>
                                    <input class="input-xx" type="text" name="AT" value="Fishery License Permit" readonly>
                                </div>
                            </div>

                            <div style="margin-inline:10px">
                                <div class="spacing">
                                    <label class="modal-label" for="view-postal">Postal Code:</label>
                                    <input class="input-xx" type="text" id="view-postal" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-province">Province:</label>
                                    <input class="input-xx" type="text" id="view-province" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-municipal">Municipal:</label>
                                    <input class="input-xx" type="text" id="view-municipal" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="barangay">Barangay:</label>
                                    <input class="input-xx" type="text" name="barangay" id="view-barangay" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-street">Street:</label>
                                    <input class="input-xx" type="text" id="view-street" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="view-or">OR Number:</label>
                                    <input class="input-xx" type="text" id="view-or" readonly>
                                </div>

                                <div class="spacing">
                                    <label class="modal-label" for="locator">Locator:</label>
                                    <input class="input-xx" type="text" name="locator" id="edit-locator">
                                </div>

                            </div>
                        </div>

                        <div style="display:flex; float:right; padding-top: 1rem">
                            <div class="spacing">
                                <a class="href_nodesign" href="requirements.php"><button type="button" class="btn">Issue Requirements</button></a>
                            </div>

                        </div>
                    </div>
                </div>

            </table>
        </div>

    </div>

    <script>
        <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $message_type = $_SESSION['message_type'];

            echo "Swal.fire({
                    title: 'Success',
                    text: '$message',
                    icon: '$message_type',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        content: 'custom-swal-content',
                        confirmButton: 'custom-ok-button'
                    }
                });";

            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
    </script>

    <script>
        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fishworker Record?',
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
                    xhr.onload = function() {
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