<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    
    
    <title>Fisherfolks</title>

    
</head>

<body>

<?php
// Retrieve the role from the URL parameter
$role3 = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
?>
    
    <div class = "container">
  
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex;">

                                    <div style="display: flex; float:left">
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <a href=""><img src="../img/icons/back-butt.png" class="back-image selector" ></a>
                                        </div>
                                        
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ DASHBOARD</p>
                                        </div>
                                    </div>

                                </div> 
                            </td>
                        </tr>

                        <tr>
                            <td>

                            <table class="fg-newreg">
                                
                            <thead>
                                <iframe name="frame" style="display:none;"></iframe>
                                <form action="fisherfolk-func.php" method="POST" target="frame" enctype="multipart/form-data">

                                <div class="fcon fcon-active">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card-slim-s">

                                                <div class="fg-header">
                                                    <p>User Credentials</p>
                                                </div>

                                                <div style="display: flex; flex-direction:column; justify-content: center; align-items: left; margin-top: 2.5rem; padding-inline: 1rem">
                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="email">Email *</label>
                                                        <input type="email" name="email2" id="email" class="input-txt-L" required>
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl"  for="p">Password *</label>
                                                        <input type="password"  name="pass2" id="p" class="input-txt-L">
                                                    </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="cpass">Confirm Password *</label>
                                                           <input type="password" id="cpass" class="input-txt-L" >
                                                       </div>

                                                       <div class="fg-fields-input" style="display:none;">
                                                           <label class="lbl" for="roles">Roles</label >
                                                           <input type="text" name="roles2" id="roles" class="input-txt-L"  value="<?php echo $role3; ?>" readonly>
                                                       </div>
                                                </div>

                                                <div class="butt-con" style="padding-top: 5rem;">
                                                    
                                                    <a href="#" class="btn nxt-butt">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!------------------------------------------------------------------------------------Second--Tab------------------------------------------------------------------------------------------------------------------------------------------>
                                    <div class="fcon">
                                       
                                        <div class ="fg-newreg-items">

                                            <div class="fgnew-card-L">        

                                                <div class="fg-header">
                                                    <p>PERSONAL INFORMATON 1.1</p>
                                                </div>
                                                
                                            
                                                <div class="fgnew-con">
                                                    <div class = "fgnew-ph">
                                                        <p>COMPLETE NAME OF LOCATOR</p>
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
                                                            <input type="text" name="fffname" id="firstn" class="input-txt" required>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midn">MIDDLE NAME</label>
                                                            <input type="text"  name="ffmname" id="midtn" class="input-txt">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastn">LAST NAME</label>
                                                            <input type="text"  name="fflname" id="lastn" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="apel">APPELLATION</label>
                                                            <input type="text"  name="ffappell" id="apel" class="input-drp">
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS</p>
                                                    </div>

                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">POSTAL CODE</label>
                                                            <input type="number" id="postal" class="input-drp" >
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">PROVINCE</label>
                                                            <input type="text" name="ffprov" id="prov" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cty">CITY/MUNICIPAL</label>
                                                            <input type="text" name="ffcity" id="cty" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="brgy">BARANGAY</label>
                                                            <input type="text" name="ffbrgy" id="brgy" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="street">STREET</label>
                                                            <input type="text" name="ffstreet" id="street" class="input-drp" >
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
                                                            <select id="civil"  class="input-txt" >
                                                                <option>Single</option>
                                                                <option>Married</option>
                                                                <option>Divorced</option>
                                                                <option>Widowed</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="gender">GENDER</label>
                                                            <select id="gender"  name="ffgender" class="input-txtM" >
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

                                                    <div class = "fgnew-ph2">
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

                                                    <div class = "fgnew-ph">
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
                                                <div class="butt-con" style="margin-top:2rem;">
                                                    <a href="#" class="btn prev-butt">Back</a>
                                                    <a href="#" class="btn nxt-butt">Next</a>
                                                </div>
                                            
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

                                                    <div class = "fgnew-ph2">
                                                        <p>CONTACT PERSON INCASE OF EMERGENCY</p>
                                                    </div>

                                                    <div class = "fgnew-ph">
                                                        <p>COMPLETE NAME</p>
                                                    </div>
                                                    
                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="salutC">SALUTATION</label>
                                                            <select id="salutC"  class="input-drp">
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

                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS</p>
                                                    </div>

                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal1C">POSTAL CODE</label>
                                                            <input type="number" id="postal1C" class="input-drp" >
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov1C">PROVINCE</label>
                                                            <input type="text" id="prov1C" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cm1C">CITY/MUNICIPAL</label>
                                                            <input type="text" id="cm1C" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="brgy1C">BARANGAY</label>
                                                            <input type="text" id="brgy1C" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="street1C">STREET</label>
                                                            <input type="text" id="street1C" class="input-drp" >
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields-L">
                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="connumC">CONTACT NUMBER</label>
                                                            <input type="tel" id="connumC" class="input-txt" placeholder="+63">
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="relationshipC">RELATIONSHIP</label>
                                                            <input type="txt" id="relationshipC" class="input-txt">
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

                                                <div class="butt-con" style="padding-top: 3rem;">
                                                    <a href="#" class="btn prev-butt">Back</a>
                                                    <a href="#" class="btn nxt-butt">Next</a>
                                                </div>

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

                                            <div class="fgnew-card-es"><!--card-->
                                                <div class="fgnew-con">
                                                    <div class="fg-header">
                                                            <p>ORGANIZATION</p>
                                                        </div>

                                                        <div class="fgnew-con" style="margin-top:3.5rem;">
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
                                               
                                                
                                                <div class="butt-con" style="padding-top: 7rem;">
                                                    <a href="#" class="btn prev-butt">Back</a>
                                                    <a href="#" class="btn nxt-butt">Next</a>
                                                </div>

                                            </div>
                                            
                                        </div>

                                        
                                    </div>

<!----------------------------------------------------------------------------------Third-Tab------------------------------------------------------------------------------------------------------------------------>                                    
                                    
                                    <div class="fcon"><!--inactive-container--->

                                        <div class="fg-newreg-items"><!--items-container-->

                                            <div class="fgnew-card-prof"><!--card-->

                                                <div class="fg-header">
                                                    <p>Profile</p>
                                                </div>

                                                <div class="fgnew-con" style="padding: 2rem 0  2rem;">
                                                    <div class="pcon">

                                                        <div class="pcon-items">
                                                            <div class="img-view" id="drop-area">
                                                                <img src="../img/icons/upload2.svg" id="img-prev"><br>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="pcon-items">
                                                            <input id="input-file" name="ffprofile" type="file" accept="image/*" hidden>
                                                            <button type="button" class="pcon-butt" onclick="document.getElementById('input-file').click();">BROWSE FILES</button>

                                                            <h3 style="color: black;">OR</h3>
                                                            <button type="button" class="pcon-butt">TAKE A PHOTO</button>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="butt-con" style="padding-top: 1.5rem;">
                                                    <a href="#" class="btn prev-butt">Back</a>
                                                    <a href="#" class="btn nxt-butt">Next</a>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>

<!-----------------------------------------------------------------------------------Fourth-Tab------------------------------------------------------------------------------------------------------------------------->

                                    <div class="fcon" style="padding-top: 1.5rem;"><!--inactive-container--->

                                        <div class="fg-newreg-items"><!--items-container-->

                                            <div class="fgnew-card-prof"><!--card-->

                                                <div class="fg-header">
                                                    <p>Profile</p>
                                                </div>

                                                <div class="fgnew-con" style="padding: 1.07rem 0 1.07rem 0;">
                                                    <div class="pcon1">

                                                        <div class="pcon-items1">
                                                            <img src="../img/icons/upload2.svg" id="img-prev">
                                                        </div>

                                                        
                                                        <div class="pcon-items1">
                                                            <button type="button" class="pcon-butt1 prev-butt">TAKE ANOTHER PHOTO</button>
                                                            <button type="submit" type="button" name="submit" class="pcon-butt1" onclick="submitForm()">SAVE AND CONTINUE</button>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </form>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                   
                                    <div id="myModal" class="modal">
                                        <div class="modal-content">
                                            <div style="display:flex; flex-direction:column;">
                                                <img class="center" src="../img/icons/check.png">
                                                <h3 class="center" style="color: #3E897B;">Registered</h3>                          
                                            </div>
                                        </div>
                                    </div>      
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                           
                    </thead>

                        </table>
                           
                                

                            </td>
                        </tr>

                        

                </table>

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
        $("form").submit(function() { return false; });;
    </script>

<!--<script>
        function submitForm() {
            // Display the modal
            var modal = document.getElementById("myModal");
            modal.style.display = "block";

            // Redirect after 3 seconds
            setTimeout(function() {
                window.location.href = "../login.php";
            }, 3000);
        }
    </script>-->

    <script src="js/payment.js"></script>

</body>
</html>