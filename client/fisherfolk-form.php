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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>


    <title>Fisherfolks</title>


</head>

<body>

    <?php
    // Retrieve the role from the URL parameter
    $role3 = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
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
                                    <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ Application for Fishery License Permit</p>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>

                <tr class="bgtable">
                    <td>

                        <form id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data">

                            <div class="fcon fcon-active">

                                <div class="fg-newreg-items">

                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>PERSONAL INFORMATON 1.1</p>
                                        </div>


                                        <div class="fgnew-con">
                                            <div class="fgnew-ph">
                                                <p>COMPLETE NAME OF LOCATOR</p>
                                            </div>

                                            <div class="fg-fields">

                                                <!--form-type-handler-for-inserting-->
                                                <input type="hidden" name="form_type" value="fisherfolk">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="salut">SALUTATION</label>
                                                    <select id="salut" name="fsalute" class="input-drp">
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                        <option value="Ms.">Ms.</option>
                                                    </select>
                                                </div>


                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="firstn">FIRST NAME</label>
                                                    <input type="text" name="fffname" id="firstn" class="input-txt" required>
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="midn">MIDDLE NAME</label>
                                                    <input type="text" name="ffmname" id="midn" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="lastn">LAST NAME</label>
                                                    <input type="text" name="fflname" id="lastn" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="apel">APPELLATION</label>
                                                    <input type="text" name="ffappell" id="apel" class="input-drp">
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
                                                    <input type="text" name="ffprov" id="prov" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="cty">CITY/MUNICIPAL</label>
                                                    <input type="text" name="ffcity" id="cty" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="brgy">BARANGAY</label>
                                                    <input type="text" name="ffbrgy" id="brgy" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="street">STREET</label>
                                                    <input type="text" name="ffstreet" id="street" class="input-drp">
                                                </div>
                                            </div>

                                            <div class="fg-fields">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="age">AGE</label>
                                                    <input type="number" name="ffage" id="age" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="DOB">DATE OF BIRTH (MM/DD/YYYY)</label>
                                                    <input type="date" name="ffdob" id="DOB" class="input-txtM">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="POB">PLACE OF BIRTH (MUNICIPALITY/CITY, PROVINCE)</label>
                                                    <input type="text" id="POB" class="input-txt2">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="residence">RESIDENT OF MUNICIPALITY SINCE (INDICATE YEAR)</label>
                                                    <input type="text" name="ffresidence" id="residence" class="input-txt">
                                                </div>

                                            </div>

                                            <div class="fg-fields">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="civil">CIVIL STATUS</label>
                                                    <select id="civil" class="input-txt">
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Divorced</option>
                                                        <option>Widowed</option>
                                                    </select>
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="gender">GENDER</label>
                                                    <select id="gender" name="ffgender" class="input-txtM">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="educback">EDUCATIONAL BACKGROUND</label>
                                                    <input type="text" id="educback" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="connum">CONTACT NUMBER</label>
                                                    <input type="tel" name="ffcontact" id="connum" class="input-txt" placeholder="+63">
                                                </div>

                                            </div>

                                            <div class="fg-fields">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="nat">NATIONALITY</label>
                                                    <input type="text" id="nat" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="rel">RELIGION</label>
                                                    <input type="text" id="rel" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="OR">OR NUMBER</label>
                                                    <input type="number" name="ffOR" id="OR" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="issued">DATE ISSUED</label>
                                                    <input type="date" id="issued" class="input-txtM">
                                                </div>

                                            </div>

                                            <div class="fgnew-ph2">
                                                <p>OR NUMBER OF HOUSEHOLD MEMBERS</p>
                                            </div>

                                            <div class="fg-fields-L">
                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.child">NO. OF CHILDREN</label>
                                                    <input type="text" id="no.child" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.male">NO. OF MALE</label>
                                                    <input type="text" id="no.male" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.female">NO. OF FEMALE</label>
                                                    <input type="text" id="no.female" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.inschool">NO. OF IN-SCHOOL</label>
                                                    <input type="text" id="no.inschool" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.outschool">NO. OF OUT-SCHOOL</label>
                                                    <input type="text" id="no.outschool" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.employed">NO. OF EMPLOYED</label>
                                                    <input type="text" id="no.employed" class="input-drp">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.unemployed">NO. OF UNEMPLOYED</label>
                                                    <input type="text" id="no.unemployed" class="input-drp">
                                                </div>
                                            </div>

                                            <div class="fgnew-ph">
                                                <p>INCOME</p>
                                            </div>

                                            <div class="fg-fields-L">
                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.child">HOUSEHOLD MONTHLY INCOME</label>
                                                    <input type="text" id="no.child" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.child">INCOME VALUE</label>
                                                    <input type="text" id="no.child" class="input-txt">
                                                </div>


                                            </div>

                                            <div class="fg-fields-L">
                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="no.child">OTHER SOURCES OF INCOME</label>
                                                    <input type="text" id="no.child" class="input-txt">
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

                            <div class="fcon">
                                <div class="fg-newreg-items">

                                    <div class="fgnew-card">

                                        <div class="fg-header">
                                            <p>PERSONAL INFORMATION 1.2</p>
                                        </div>

                                        <div class="fgnew-con">

                                            <div class="fgnew-ph2">
                                                <p>CONTACT PERSON INCASE OF EMERGENCY</p>
                                            </div>

                                            <div class="fgnew-ph">
                                                <p>COMPLETE NAME</p>
                                            </div>

                                            <div class="fg-fields">
                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="salutC">SALUTATION</label>
                                                    <select id="salutC" class="input-drp">
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Mr.">Mrs.</option>
                                                        <option value="Mr.">Ms.</option>
                                                    </select>
                                                </div>


                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="firstnC">FIRST NAME</label>
                                                    <input type="text" id="firstnC" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="midnC">MIDDLE NAME</label>
                                                    <input type="text" id="midnC" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="lastnC">LAST NAME</label>
                                                    <input type="text" id="lastnC" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="salutC">APPELLATION</label>
                                                    <input type="text" id="salutC" class="input-drp">
                                                </div>
                                            </div>

                                            <div class="fgnew-ph">
                                                <p>ADDRESS</p>
                                            </div>

                                            <div class="fg-fields">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="postal1C">POSTAL CODE</label>
                                                    <input type="number" id="postal1C" class="input-drp">
                                                </div>


                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="prov1C">PROVINCE</label>
                                                    <input type="text" id="prov1C" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="cm1C">CITY/MUNICIPAL</label>
                                                    <input type="text" id="cm1C" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="brgy1C">BARANGAY</label>
                                                    <input type="text" id="brgy1C" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="street1C">STREET</label>
                                                    <input type="text" id="street1C" class="input-drp">
                                                </div>
                                            </div>

                                            <div class="fg-fields-L">
                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="connumC">CONTACT NUMBER</label>
                                                    <input type="text" id="connumC" class="input-txt" placeholder="+63">
                                                </div>

                                                <div class="fg-fields-input-1">
                                                    <label class="lbl" for="relationshipC">RELATIONSHIP</label>
                                                    <input type="text" id="relationshipC" class="input-txt">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="fgnew-card">
                                        <div class="fg-header">
                                            <p>INCLUSION</p>
                                        </div>

                                        <div class="fgnew-con">

                                            <div class="fgcon-for-chkbx">

                                                <div class="fg-fields2">

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph3">
                                                            <p>WITH VOTER'S ID?</p>
                                                        </div>

                                                        <label class="check-box">YES
                                                            <input type="radio" class="cbox" name="voters" id="cb" value="YES">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">NO
                                                            <input type="radio" class="cbox" name="voters" value="NO">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <div style="margin-left: 1rem;" class="fg-fields-input">
                                                            <label class="lbl" for="lastn">ID NO.</label>
                                                            <input for="cb" type="text" id="lastn" class="input-txt1">
                                                        </div>
                                                    </div>

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph3">
                                                            <p>CCT/4PS BENEFICIARY?</p>
                                                        </div>

                                                        <label class="check-box">YES
                                                            <input type="radio" class="cbox" name="4PS" value="YES">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">NO
                                                            <input type="radio" class="cbox" name="4PS" value="NO">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="fg-fields2">

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph3">
                                                            <p>INDIGENOUS CULTURAL COMMUNITY(IP)?</p>
                                                        </div>

                                                        <label class="check-box">YES
                                                            <input type="radio" class="cbox" name="IP" id="cb" value="YES">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">NO
                                                            <input type="radio" class="cbox" name="IP" value="NO">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                    </div>

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph3">
                                                            <p>SAAD AREA?</p>
                                                        </div>

                                                        <label class="check-box">YES
                                                            <input type="radio" class="cbox" name="SAAD" VALUE="YES">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">NO
                                                            <input type="radio" class="cbox" name="SAAD" value="NO">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
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

                            <!----------------------------------------------------------------------------------Third-Tab------------------------------------------------------------------------------------------------------------------------>

                            <div class="fcon">
                                <div class="fg-newreg-items">

                                    <div class="fgnew-card"><!--card-->

                                        <div class="fg-header">
                                            <p>LIVELIHOOD</p>
                                        </div>

                                        <div class="fgnew-con">
                                            <div class="fgcon-for-chkbx">

                                                <div class="fg-fields2">

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph4">
                                                            <p>MAIN SOURCE OF INCOME</p>
                                                        </div>

                                                        <label class="check-box">CAPTURE FISHING
                                                            <input type="checkbox" class="cbox" id="cb" value="CAPTURE FISHING">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 1rem;" class="fg-fields-input">
                                                                <label class="lbl" for="caps">SPECIFY GEAR USED</label>
                                                                <input for="cb" type="text" id="caps" class="input-txtS">
                                                            </div>
                                                        </label>

                                                        <label class="check-box">AQUACULTURE
                                                            <input type="checkbox" class="cbox" value="AQUACULTURE">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 1rem;" class="fg-fields-input">
                                                                <label class="lbl" for="aquac">SPECIFY CULTURE METHOD USED</label>
                                                                <input for="cb" type="text" id="aquac" class="input-txtS">
                                                            </div>
                                                        </label>

                                                        <label class="check-box">FISH VENDING
                                                            <input type="checkbox" class="cbox" value="FISH VENDING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">GLEANING
                                                            <input type="checkbox" class="cbox" value="GLEANING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">FISHING PROCESSING
                                                            <input type="checkbox" class="cbox" value="FISHING PROCESSING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">OTHERS
                                                            <input type="checkbox" class="cbox">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 4rem;" class="fg-fields-input">
                                                                <label class="lbl" for="otmi">SPECIFY</label>
                                                                <input for="cb" type="text" id="otmi" class="input-txtS">
                                                            </div>
                                                        </label>


                                                    </div>

                                                </div>

                                                <div class="fg-fields2">

                                                    <div class="fg-con-chck">
                                                        <div class="fgnew-ph4">
                                                            <p>OTHER SOURCES OF INCOME</p>
                                                        </div>

                                                        <label class="check-box">CAPTURE FISHING
                                                            <input type="checkbox" class="cbox" id="cb" value="CAPTURE FISHING">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 1rem;" class="fg-fields-input">
                                                                <label class="lbl" for="lastn">SPECIFY GEAR USED</label>
                                                                <input for="cb" type="text" id="lastn" class="input-txtS">
                                                            </div>
                                                        </label>

                                                        <label class="check-box">AQUACULTURE
                                                            <input type="checkbox" class="cbox" value="AQUACULTURE">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 1rem;" class="fg-fields-input">
                                                                <label class="lbl" for="specifymethod">SPECIFY CULTURE METHOD USED</label>
                                                                <input for="cb" type="text" id="specifymethod" class="input-txtS">
                                                            </div>
                                                        </label>

                                                        <label class="check-box">FISH VENDING
                                                            <input type="checkbox" class="cbox" value="FISH VENDING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">GLEANING
                                                            <input type="checkbox" class="cbox" value="GLEANING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">FISHING PROCESSING
                                                            <input type="checkbox" class="cbox" value="FISHING PROCESSING">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">OTHERS
                                                            <input type="checkbox" class="cbox">
                                                            <span class="checkmark"></span>

                                                            <div style="margin-left: 4rem;" class="fg-fields-input">
                                                                <label class="lbl" for="specifymethod2">SPECIFY</label>
                                                                <input for="cb" type="text" id="specifymethod2" class="input-txtS">
                                                            </div>
                                                        </label>


                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="fgnew-card"><!--card-->

                                        <div class="fg-header">
                                            <p>ORGANIZATION</p>
                                        </div>

                                        <div class="fgnew-con space-top">
                                            <div class="fg-fields">

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="orgn">NAME OF ORGANIZATION</label>
                                                    <input type="text" name="fforg" id="orgn" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="membersince">MEMBER SINCE</label>
                                                    <input type="text" name="ffmemberyear" id="membersincee" class="input-txt">
                                                </div>

                                                <div class="fg-fields-input">
                                                    <label class="lbl" for="position">POSITION / OFFICIAL DESIGNATION</label>
                                                    <input type="text" name="fforgpos" id="position" class="input-txt2">
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

                            <!----------------------------------------------------------------------------------Third-Tab------------------------------------------------------------------------------------------------------------------------>
                            <div class="fcon">

                                <div class="fg-newreg-items">

                                    <div class="fgnew-card-slim-s">

                                        <div class="fg-header">
                                            <p>User Credentials</p>
                                        </div>

                                        <div style="margin: auto;" class="space-top space-bot">

                                            <div class="space-bot" style="display:flex; border-bottom: 0.7px groove gray">
                                                <div class="style-inline1">
                                                    <input id="input-file" name="ffprofile" type="file" accept="image/*" hidden>
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
                                                    <input type="text" name="roles" id="roles" class="input-txt-L" value="<?php echo $role3; ?>" readonly>
                                                </div>

                                                <input type="text" name="status" hidden value="1">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="butt-con">
                                        <a href="#" class="btn prev-butt">Back</a>
                                        <button type="submit" name="submit" class="btn">SAVE AND CONTINUE</button>
                                    </div>

                                </div>

                            </div>

                        </form>

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




    <script src="js/payment.js"></script>

</body>

</html>