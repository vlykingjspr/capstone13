<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>

    <title>Fish Cage Operator</title>


</head>

<body>

    <?php

    $role1 = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
    ?>

    <div class="container">

        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

        <div class="dash-body">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                <tr>
                    <td>
                        <div class="style-inline" style="display: flex;">

                            <div style="display: flex; float:left">
                                <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                    <a href="../signup.php"><img src="../img/icons/back-butt.png" class="back-img selector"></a>
                                </div>

                                <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                    <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ Fish Cage Registration Form</p>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                <!---------------------------------------------------------------------------------------------Fields--------------------------------------------------------------------------------------------------------------------------------->
                <tr class="bgtable">
                    <td>

                        <form id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data">

                            <div class="fcon fcon-active">

                                <div class="fg-newreg-items">

                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>PERSONAL INFORMATION</p>
                                        </div>

                                        <div class="fgnew-con">
                                            <div class="fgnew-ph">
                                                <p>COMPLETE NAME OF OPERATOR</p>
                                            </div>

                                            <div class="fg-fields">

                                                <!--form-type-handler-for-inserting-->
                                                <input type="hidden" name="form_type" value="fishcage">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="salut">SALUTATION</label>
                                                    <select id="salut" class="input-drp">
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Mr.">Mrs.</option>
                                                        <option value="Mr.">Ms.</option>
                                                    </select>
                                                </div>


                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="firstn">FIRST NAME</label>
                                                    <input type="text" name="fcfname" id="firstn" class="input-txt" required>
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="midn">MIDDLE NAME</label>
                                                    <input type="text" name="fcmname" id="midtn" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="lastn">LAST NAME</label>
                                                    <input type="text" name="fclname" id="lastn" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="app">APPELLATION</label>
                                                    <input type="text" name="fcapp" id="app" class="input-drp">
                                                </div>

                                            </div>

                                            <div class="fgnew-ph">
                                                <p>ADDRESS</p>
                                            </div>

                                            <div class="fg-fields">
                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="postal">POSTAL CODE</label>
                                                    <input type="number" id="postal" class="input-drp" name="fpostal">
                                                </div>


                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="prov">PROVINCE</label>
                                                    <input type="text" id="prov" name="fcprov" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="cimu">CITY/MUNICIPAL</label>
                                                    <input type="text" id="cimu" name="fccity" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="brngy">BARANGAY</label>
                                                    <input type="text" id="brngy" name="fcbrgy" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="strt">STREET</label>
                                                    <input type="text" id="strt" name="fcstrt" class="input-drp">
                                                </div>
                                            </div>

                                            <div class="fg-fields-L">
                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="cnumber">CONTACT NUMBER</label>
                                                    <input type="tel" id="cnumber" name="fccon" class="input-txt" placeholder="+63">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="citizenship">CITIZENSHIP</label>
                                                    <input type="text" id="citizenship" class="input-txt">
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>INVESTMENT CATEGORY</p>
                                        </div>

                                        <div class="fgnew-con">

                                            <div class="fg-fields4 space-top space-bot">

                                                <div class="fg-fields-input-2">
                                                    <div class="fgnew-ph5">
                                                        <p>ZONE A</p>
                                                    </div>

                                                    <label class="check-box">(MARGINAZED SECTORS (1 UNIT))
                                                        <input type="radio" class="cbox" name="fccat" value="(MARGINAZED SECTORS (1 UNIT))">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>



                                                <div class="fg-fields-input-2">
                                                    <div class="fgnew-ph5">
                                                        <p>ZONE B</p>
                                                    </div>

                                                    <div class="cc" style="display:block">
                                                        <label class="check-box">(SMALL LOCATORS INVESTOR (2-8 UNITS - INDIVIDUAL/FAMILY))
                                                            <input type="radio" class="cbox" name="fccat" value="(SMALL LOCATORS INVESTOR (2-8 UNITS - INDIVIDUAL/FAMILY))">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="check-box">(SMALL LOCATORS INVESTOR (2-12 UNITS - COOPERATIVES/ASSOCIATION))
                                                            <input type="radio" class="cbox" name="fccat" value="(SMALL LOCATORS INVESTOR (2-12 UNITS - COOPERATIVES/ASSOCIATION))">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                </div>



                                                <div class="fg-fields-input-2">
                                                    <div class="fgnew-ph5">
                                                        <p>ZONE C</p>
                                                    </div>

                                                    <div class="cc" style="display:block">
                                                        <label class="check-box">(BIG LOCATORS INVESTOR (9-20 UNITS - INDIVIDUAL/FAMILY))
                                                            <input type="radio" class="cbox" name="fccat" value="(BIG LOCATORS INVESTOR (9-20 UNITS - INDIVIDUAL/FAMILY))">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="check-box">(BIG LOCAL INVESTOR (13-20 UNITS - COOPERATIVES/ORGANIZATION))
                                                            <input type="radio" class="cbox" name="fccat" value="(BIG LOCAL INVESTOR (13-20 UNITS - COOPERATIVES/ORGANIZATION))">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                </div>



                                            </div>

                                        </div>

                                    </div>

                                    <div class="butt-con" style="float:right">
                                        <a href="#" class="btn prev-butt">Back</a>
                                        <a href="#" class="btn nxt-butt">Next</a>
                                    </div>

                                </div>


                            </div>

                            <!-------------------------------------------------------------------------------------Second-Tab------------------------------------------------------------------------------------------------------------------------>

                            <div class="fcon">
                                <div class="fg-newreg-items">
                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>TECHNICAL/PROJECT DESCRIPTION</p>
                                        </div>

                                        <div class="fgnew-con">

                                            <div class="fg-fields6" style="margin-top: 1rem;">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="businessaddress">TYPE OF MARINE FISHCAGE</label>

                                                    <div style="display:flex">
                                                        <div class="cc" style="display:flex">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccage" value="BAMBOO">BAMBOO
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccage" value="GI PIPE">GI PIPE
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccage" value="ANAHAW">ANAHAW
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box" style="display:block">Others
                                                                <input type="checkbox" style="float: left; margin-top: 5px;" class="cbox" id="cb">
                                                                <span class="checkmark"></span>

                                                                <div class="fg-fields-input">
                                                                    <label class="lbl" for="lastn">PLS. SPECIFY</label>
                                                                    <input for="cb" type="text" id="lastn" class="input-drp">
                                                                </div>
                                                            </label>


                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="businessaddress">KINDS OF SPECIES TO BE CULTURED</label>

                                                    <div style="display:flex">
                                                        <div class="cc" style="display:flex">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccul" value="BAMBOO">BAMBOO
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccul" value="GI PIPE">GI PIPE
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fccul" value="ANAHAW">ANAHAW
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box" style="display:block">Others
                                                                <input type="checkbox" style="float: left; margin-top: 5px;" class="cbox" id="cb">
                                                                <span class="checkmark"></span>

                                                                <div class="fg-fields-input">
                                                                    <label class="lbl" for="lastn">PLS. SPECIFY</label>
                                                                    <input for="cb" type="text" id="lastn" class="input-drp">
                                                                </div>
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="fg-fields4">

                                                <div class="fg-fields-input-2" style="align-items: center; display:block;">

                                                    <label class="lbl">CAGE DIMENSION/SIZE</label>

                                                    <div class="cc" style="display:flex">
                                                        <div class="fgnew-ph5">
                                                            <p>SQUARE</p>
                                                        </div>
                                                        <label class="check-box">4x4x4m
                                                            <input type="radio" class="cbox" name="fcdem" value="4x4x4m (Square)">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="check-box">6x6x4m
                                                            <input type="radio" class="cbox" name="fcdem" value="4x4x4m (Square)">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="check-box">10x10x4m
                                                            <input type="radio" class="cbox" name="fcdem" value="4x4x4m (Square)">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="fg-fields-input-2" style="align-items: center">

                                                    <div class="cc" style="display:flex">
                                                        <div class="fgnew-ph5">
                                                            <p>CIRCULAR</p>
                                                        </div>
                                                        <label class="check-box">10x20m
                                                            <input type="radio" class="cbox" name="fcdem" value="10x20m (Circular)">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="check-box">21-40m
                                                            <input type="radio" class="cbox" name="fcdem" value="21x40m (Circular)">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="fg-fields6">
                                                <div class="fg-fields-input" style="margin-top: 1.5rem;">
                                                    <label class="lbl">FISH CAGE INTENDED FOR</label>

                                                    <div style="display:flex">
                                                        <div class="cc" style="display:flex">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcint" value="GROWOUT">GROWOUT
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcint" value="CONDITIONING CAGE">CONDITIONING CAGE
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcint" value="RESEARCH">RESEARCH
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>


                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>CLASSIFICATION OF FISHING GEAR</p>
                                        </div>

                                        <div class="fgnew-con" style="padding-top: 1.5rem;">
                                            <div class="fg-fields6">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="businessname">BUSINESS NAME</label>
                                                    <input type="text" name="fcbname" id="businessname" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="businessaddress">BUSINESS ADDRESS</label>
                                                    <input type="text" name="fcbadd" id="businessaddress" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl">BUSINESS REGISTRATION</label>

                                                    <div style="display:flex">
                                                        <div class="cc" style="display:block">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcbreg" value="DTI">DTI
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcbreg" value="SEC">SEC
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        <div class="cc" style="display:block">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcbreg" value="CDA">CDA
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcbreg" value="LGU">LGU
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        <div class="cc" style="display:block">
                                                            <label class="check-box" style="display:block">Others
                                                                <input type="checkbox" style="float: left; margin-top: 5px;" class="cbox" id="cb">
                                                                <span class="checkmark"></span>

                                                                <div class="fg-fields-input">
                                                                    <label class="lbl" for="lastn">PLS. SPECIFY</label>
                                                                    <input for="cb" type="text" id="lastn" class="input-drp">
                                                                </div>
                                                            </label>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="butt-con" style="float:right">
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
                                            <p>FINANCIAL ASPECT</p>
                                        </div>

                                        <div class="fgnew-con">
                                            <div class="fg-fields6 space-top">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="capitalinv">CAPITAL INVESTMENT AMOUNT: (PHP)</label>
                                                    <input type="text" name="fccap" id="capitalinv" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="businessaddress">SOURCE OF CAPITALIZATION/WORKING CAPITAL/INVESTMENT:</label>

                                                    <div style="display:flex">
                                                        <div class="cc" style="display:flex">
                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcsrc" value="SAVINGS">SAVINGS
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box">
                                                                <input type="radio" class="cbox" name="fcsrc" value="LOAN">LOAN
                                                                <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check-box" style="display:flex;">Others
                                                                <input name="source" type="radio" style="float: left; margin-top: 5px;" class="cbox" id="cb">
                                                                <span class="checkmark"></span>

                                                                <div class="fg-fields-input" style="margin-left:1rem;">
                                                                    <label class="lbl" for="othersource">PLS. SPECIFY</label>
                                                                    <input for="cb" type="text" id="othersource" class="input-txt">
                                                                </div>
                                                            </label>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>ENVIRONMENTAL ASPECT</p>
                                        </div>

                                        <div class="fgnew-con space-top">

                                            <div class="fg-fields-input-2">

                                                <div class="cc" style="display:block">
                                                    <label class="check-box">I agreed to follow proper garbage disposal/ waste management and other Aquaculture Practices and Code of Conduct for<BR>
                                                        Responsible Aquaculture/ Marine Fish Cage operation to safeguard the Marine environment for<BR>
                                                        sustainable and other operation of the project.
                                                        <input type="checkbox" class="cbox" name="environmentalasp">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <br>
                                                    <label class="check-box">I have personally reviewed the information on this application and I certify under penalty of perjury that to the best of my<br>
                                                        knowledge and belief the information on this application is true and correct, and that I understand this information is subject to<br>
                                                        public disclosure
                                                        <input type="checkbox" class="cbox" name="environmentalasp">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="butt-con" style="float:right">
                                        <a href="#" class="btn prev-butt">Back</a>
                                        <a href="#" class="btn nxt-butt">Next</a>
                                    </div>

                                </div>

                            </div>


                            <!----------------------------------------------------------------------------------Fourth-Tab------------------------------------------------------------------------------------------------------------------------>

                            <div class="fcon">

                                <div class="fg-newreg-items">

                                    <div class="fgnew-card-slim-s">

                                        <div class="fg-header">
                                            <p>User Credentials</p>
                                        </div>

                                        <div style="margin: auto;" class="space-top space-bot">

                                            <div class="space-bot" style="display:flex; border-bottom: 0.7px groove gray">
                                                <div class="style-inline1">
                                                    <input id="input-file" name="fcpics" type="file" accept="image/*" hidden>
                                                    <img src="../img/user.png" id="img-prev1">
                                                </div>

                                                <div class="style-inline " style="display:block; justify-content:center; align-items:center; margin:auto; text-align:center;">
                                                    <div>
                                                        <a href="#" class="btn" onclick="document.getElementById('input-file').click();">Browse Files</a>
                                                    </div>
                                                    <h2 style="color:black">or</h2>
                                                    <div>
                                                        <a href="#" class="btn">Take Photo</a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="style-inline space-top">
                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="email">Email *</label>
                                                    <input type="email" name="email" id="email" class="input-txt-L" required>
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="p">Password *</label>
                                                    <input type="password" name="pass" id="p" class="input-txt-L">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="cpass">Confirm Password *</label>
                                                    <input type="password" id="cpass" class="input-txt-L">
                                                </div>

                                                <div class="fg-fields-input" style="display:none;">
                                                    <label class="lbl" for="roles">Roles</label>
                                                    <input type="text" name="roles" id="roles" class="input-txt-L" value="<?php echo $role1; ?>" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="butt-con">
                                        <a href="#" class="btn prev-butt">Back</a>
                                        <button type="submit" name="submit" class="btn">SAVE AND CONTINUE</button>
                                    </div>

                                </div>

                            </div>


                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                        </form>

                        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    </td>
                </tr>



            </table>

        </div>

    </div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
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

                fetch('functions/insert.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(response => {
                        if (response.trim() === "success") {

                            Swal.fire({
                                icon: 'success',
                                title: 'Registered',
                                text: 'Your can now Login to your Fisherfolk Account.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    content: 'custom-swal-content',
                                    confirmButton: 'custom-ok-button'
                                }
                            }).then(() => {

                                window.location.href = '../login.php';
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
                // If required fields are not filled, show an error alert
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