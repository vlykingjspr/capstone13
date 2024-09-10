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
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    
    
    <title>Fishworker</title>

    
</head>

<body>

<?php

    // Retrieve the role from the URL parameter
    $role1 = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';

?>    

<div class = "container">
                
<!-------------------------------------------------------------------------------------------Dashboard-Contents----------------------------------------------------------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex;">

                                    <div style="display: flex; float:left">
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <a href="../signup.php"><img src="../img/icons/back-butt.png" class="back-img selector" ></a>
                                        </div>
                                        
                                        <div class="animx" style="margin: auto; padding-inline: 0.5rem">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ Application for Fish Workers License Permit</p>
                                        </div>
                                    </div>

                                </div> 
                            </td>
                        </tr>
<!---------------------------------------------------------------------------------------------Fields--------------------------------------------------------------------------------------------------------------------------------->
                        <tr>
                            <td>
      
                                <form id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data">

                                    <div class="fcon fcon-active">
                                       
                                       <div class ="fg-newreg-items">

                                           <div class="fgnew-card">        

                                               <div class="fg-header">
                                                   <p>PERSONAL INFORMATION</p>
                                               </div>
                                               
                                           
                                               <div class="fgnew-con space-bot">
                                                   <div class = "fgnew-ph">
                                                       <p>COMPLETE NAME</p>
                                                   </div>
                                                   
                                                   <div class="fg-fields">
                                                    <!--form-type-handler-for-inserting-->
                                                    <input type="hidden" name="form_type" value="fishworker">

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="salut">SALUTATION</label>
                                                           <select id="salut" name="fwsalute" class="input-drp">
                                                               <option value="Mr.">Mr.</option>
                                                               <option value="Mrs.">Mrs.</option>
                                                               <option value="Ms.">Ms.</option>
                                                           </select>
                                                       </div>
                                                       

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="firstn">FIRST NAME</label>
                                                           <input type="text" name="fwFname" id="firstn" class="input-txt" required>
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="midn">MIDDLE NAME</label>
                                                           <input type="text"  name="fwMname" id="midtn" class="input-txt">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="lastn">LAST NAME</label>
                                                           <input type="text" name="fwLname" id="lastn" class="input-txt" >
                                                       </div>
                                                       
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="appel">APPELLATION</label>
                                                           <input type="text" name="fwappel" id="appel" class="input-drp">
                                                       </div>
                                                       
                                                   </div>
                                                   
                                                   <div class = "fgnew-ph">
                                                       <p>ADDRESS</p>
                                                   </div>

                                                   <div class="fg-fields">

                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="postal">POSTAL CODE</label>
                                                           <input type="text" name="fwpost" id="postal" class="input-drp" >
                                                       </div>
                                                       

                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="prov">PROVINCE</label>
                                                           <input type="text" name="fwprov" id="prov" class="input-txt" >
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="midn">CITY/MUNICIPAL</label>
                                                           <input type="text"  name="fwcity" id="midtn" class="input-txt" >
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="lastn">BARANGAY</label>
                                                           <input type="text" name="fwbrgy" id="lastn" class="input-txt">
                                                       </div>
                                                       
                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="street">STREET</label>
                                                           <input type="text" name="fwstreet" id="street" class="input-drp" >
                                                       </div>
                                                       
                                                   </div>

                                                   <div class="fg-fields">

                                                       <div class="fg-fields-input">
                                                           <label class="lbl"  for="age">Age</label>
                                                           <input type="tel" name="fwage" id="age" class="input-drp">
                                                       </div>
                                                       
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="dob">DATE OF BIRTH(MM/DD/YYYY)</label>
                                                           <input type="date" name="fwdob" id="dob" class="input-txt">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="pob">PLACE OF BIRTH</label>
                                                           <input type="text" name="fwpob" id="pob" class="input-txt2">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="civil">CIVIL STATUS</label>
                                                           <select id="civil" name="fwcivil" class="input-drp" >
                                                               <option value="Single">Single</option>
                                                               <option value="Married">Married</option>
                                                               <option value="Legally Serparated">Legally Separated</option>
                                                               <option value="Widowed">Widowed</option>
                                                           </select>
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="gender">GENDER</label>
                                                           <select id="gender" name="fwgender" class="input-drp" >
                                                               <option value="Male">Male</option>
                                                               <option value="Female">Female</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="fg-fields">

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="fweduc">EDUCATIONAL BACKGROUND</label>
                                                           <select id="fweduc" name="fweduc" class="input-txt" >
                                                               <option value="Elementary">Elementary</option>
                                                               <option value="Highschool">Highschool</option>
                                                               <option value="Vocational">Vocational</option>
                                                               <option value="College">College</option>
                                                               <option value="Post-Graduate">Post-Graduate</option>
                                                           </select>
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="noc">NO. OF CHILDREN</label>
                                                           <input type="number" name="fwchildren" id="noc" class="input-drp">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="connum">CONTACT NUMBER</label>
                                                           <input type="tel" name="fwcontact" id="connum" class="input-txt" placeholder="+63">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="weight">WEIGHT (kg)</label>
                                                           <input type="number" name="fwweight" id="weight" class="input-txt1">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="height">HEIGHT (ft-in)</label>
                                                           <input type="text" name="fwheight" id="height" class="input-txt1">
                                                       </div>


                                                   </div>

                                                   <div class ="fg-fields">
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="pob">NATIONALITY</label>
                                                           <input type="text"  name="fwnationality" id="pob" class="input-txt1">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="complexion">SKIN COMPLEXION</label>
                                                           <select id="complexion"  name="fwskincomp" class="input-txt" >
                                                               <option value="Brown">Brown</option>
                                                               <option value="Fair">Fair</option>
                                                               <option value="Dark">Dark</option>
                                                               <option>Others</option>
                                                           </select>
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="pob">OR NUMBER</label>
                                                           <input type="number"  name="fwOR" id="pob" class="input-txt">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="pob">DATE ISSUED</label>
                                                           <input type="date" name="fwdateissued" id="pob" class="input-txt">
                                                       </div>


                                                   </div>

                                                   <div class = "fgnew-ph2">
                                                       <p>CONTACT PERSON INCASE OF EMERGENCY</p>
                                                   </div>

                                                   <div class = "fgnew-ph">
                                                       <p>COMPLETE NAME</p>
                                                   </div>

                                                   <div class="fg-fields">
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="salutC">SALUTATION</label>
                                                           <select id="salutC"  name="ecsalute" class="input-drp">
                                                               <option value="Mr.">Mr.</option>
                                                               <option value="Mrs.">Mrs.</option>
                                                               <option value="Ms.">Ms.</option>
                                                           </select>
                                                       </div>
                                                       

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="firstnC">FIRST NAME</label>
                                                           <input type="text" name="ecname" id="firstnC" class="input-txt">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="midnC">MIDDLE NAME</label>
                                                           <input type="text" name="ecmiddle" id="midnC" class="input-txt">
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="lastnC">LAST NAME</label>
                                                           <input type="text" name="eclast" id="lastnC" class="input-txt">
                                                       </div>
                                                       
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="salutC">APPELLATION</label>
                                                           <input type="text" name="ecappel" id="salutC" class="input-drp">
                                                       </div>
                                                   </div> 

                                                   <div class = "fgnew-ph">
                                                       <p>ADDRESS</p>
                                                   </div>

                                                   <div class="fg-fields">

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="postal1C">POSTAL CODE</label>
                                                           <input type="number" name="ecpostal" id="postal1C" class="input-drp" >
                                                       </div>
                                                       

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="prov1C">PROVINCE</label>
                                                           <input type="text" name="ecprov" id="prov1C" class="input-txt" >
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="cm1C">CITY/MUNICIPAL</label>
                                                           <input type="text" name="eccity" id="cm1C" class="input-txt" >
                                                       </div>

                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="brgy1C">BARANGAY</label>
                                                           <input type="text" name="ecbrgy" id="brgy1C" class="input-txt">
                                                       </div>
                                                       
                                                       <div class="fg-fields-input">
                                                           <label class="lbl" for="street1C">STREET</label>
                                                           <input type="text" name="ecstreet" id="street1C" class="input-drp" >
                                                       </div>
                                                   </div>

                                                   <div class="fg-fields-L">
                                                       <div class="fg-fields-input-1">
                                                           <label class="lbl" for="connumC">CONTACT NUMBER</label>
                                                           <input type="tel" name="eccontact" id="connumC" class="input-txt" placeholder="+63">
                                                       </div>

                                                       <div class="fg-fields-input-1">
                                                           <label class="lbl" for="relationshipC">RELATIONSHIP</label>
                                                           <input type="text" name="ecrelationship" id="relationshipC" class="input-txt">
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

<!------------------------------------------------------------------------------------Third--Page------------------------------------------------------------------------------------------------------------------------------------------>
                                    
                                   <div class="fcon">

                                        <div class="fg-newreg-items">
                                        
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>ROLE IN ACQUACULTURE/MARICULTURE</p>
                                                </div>
    
                                                <div class="fgnew-con" style="padding-top:1.5REM">
                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="crtk">CARETAKER OF:</label>
                                                            <select id="crtk" name="fwcrtkof" class="input-txt" >
                                                                    <option value="Grow-out">Grow-out</option>
                                                                    <option value="Hatchery">Hatchery</option>
                                                                    <option value="Nursery">Nursery</option>
                                                                    <option>Others</option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="crtk(yr)">CARETAKER SINCE(YEAR)</label>
                                                            <input type="number" name="fwcrtksince" id="crtk(yr)" class="input-txt1" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="loc(brgy)">LOCATION(BARANGAY)</label>
                                                            <input type="text" name="fwcrtkloc" id="loc(brgy)" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="AQCU(SGM)">ACQUACULTURE STRUCTURE/</label>
                                                            <select id="AQCU(SGM)" name="fwaqua"  class="input-txt1" >
                                                                    <option value="Fish Cage">Fish Cage</option>
                                                                    <option value="Fishpond">Fishpond</option>
                                                            </select>
                                                        </div>

                                                         <div class="fg-fields-input">
                                                            <label class="lbl" for="AQCU(SGM)">GEARS/MARICULTURE</label>
                                                            <select id="AQCU(SGM)" name="fwaqua2" class="input-txt1" >
                                                                    <option value="FLA">FLA</option>
                                                                    <option value="Private">Private</option>
                                                            </select>
                                                        </div>
  
                                                    </div>

                                                    <div class="fg-fields-L">

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="totalunits">TOTAL UNITS MANAGE</label>
                                                            <input type="number" name="fwunits" id="totalunits" class="input-txt1" >
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="area-dimensions">AREA/DIMENSION PER UNIT</label>
                                                            <input type="text" name="fwunitsdim" id="area-dimensions" class="input-txt1" >
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                            </div>

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
                                                            <select id="salut" name="locsalute" class="input-drp">
                                                                <option>Mr.</option>
                                                                <option>Mrs.</option>
                                                                <option>Ms.</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="firstnL">FIRST NAME</label>
                                                            <input type="text" name="locfname" id="firstnL" class="input-txt">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midnL">MIDDLE NAME</label>
                                                            <input type="text" name="locmiddle" id="midtnL" class="input-txt">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastnL">LAST NAME</label>
                                                            <input type="text" name="loclast" id="lastnL" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="salutL">APPELLATION</label>
                                                            <input type="text" name="locappel" id="salutL" class="input-drp">
                                                        </div>

                                                    </div>

                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS OF LOCATOR</p>
                                                    </div>

                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postalL">POSTAL CODE</label>
                                                            <input type="number" name="locpostal" id="postalL" class="input-drp" >
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="provL">PROVINCE</label>
                                                            <input type="text" name="locprov" id="provL" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midnL">CITY/MUNICIPAL</label>
                                                            <input type="text" name="loccity" id="midtnL" class="input-txt">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastnL">BARANGAY</label>
                                                            <input type="text" name="locbrgy" id="lastnL" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postalL">STREET</label>
                                                            <input type="text" name="locstreet" id="postalL" class="input-drp">
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="fg-fields">
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="unitsownedL">NO. OF UNITS OWNED</label>
                                                            <input type="number" name="locunits" id="unitsownedL" class="input-drp">
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

<!----------------------------------------------------------------------------------Fourth-Page------------------------------------------------------------------------------------------------------------------------>                                    
                                    
                                    <div class="fcon">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card">

                                                <div class="fg-header">
                                                    <p>OTHER INFORMATION</p>
                                                </div>

                                                <div class="fgnew-con">
                                                    <div class="qcon">
                                                        <p style="color: black">I. Have you ever been dismissed from the military/civil service for cause, or found guilty of crime involving moral 
                                                            turpitude, or of infamous, disgraceful or immoral conduct, drunkenness or addiction to drugs, or of offense relative to 
                                                            or in connection with the conduct of a civil right?
                                                        </p>

                                                    <div class="qcon-items">
                                                        <label class="check-box">YES
                                                            <input type="radio"  class="cbox" name="other1" value="YES">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="check-box">NO
                                                            <input type="radio" class="cbox" name="other1" value="NO">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                        <p  style="color: black">II. Pursuant to (a) Indigenous People’s Act (RA 8371) and (b) Magna Carta for Disabled Persons (RA 7277), please answer the following items:
                                                        </p>
                                                            <div class="qcon-cbox">
                                                                <div class="qcon-items">
                                                                    
                                                                <p style="color: black">A.) Are you a member of any indigenous group?</p>
                                                                
                                                                    <label class="check-box">YES
                                                                        <input type="radio" class="cbox" name="other2" value="YES">
                                                                        <span class="checkmark"></span>
                                                                    </label>

                                                                    <label class="check-box">NO
                                                                        <input type="radio" class="cbox" name="other2" value="NO">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="qcon-items">
                                                                    <p  style="color: black">IF YES, please specify:</p>
                                                                    <input type="text" name="indigenousspecify" id="spcfy" class="qcon-input-text">
                                                                </div>
                                                                
                                                            </div> 

                                                            <div class="qcon-cbox">
                                                                <div class="qcon-items">
                                                                <p style="color: black">A.) Are you differently able or physically challenge?</p>
                                                            
                                                                    <label class="check-box">YES
                                                                        <input type="radio" class="cbox" name="other3" value="YES">
                                                                        <span class="checkmark"></span>
                                                                    </label>

                                                                    <label class="check-box">NO
                                                                        <input type="radio" class="cbox" name="other3" value="NO">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>

                                                                <div class="qcon-items">
                                                                    <p style="color: black">IF YES, please specify:</p>
                                                                    <input type="text" name="disabledspecify" id="spcfy" class="qcon-input-text">
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

<!-----------------------------------------------------------------------------------Fifth-Page------------------------------------------------------------------------------------------------------------------------->
                                    <div class="fcon">

                                        <div class="fg-newreg-items">

                                            <div class="fgnew-card-slim-s">

                                                <div class="fg-header">
                                                    <p>User Credentials</p>
                                                </div>

                                                <div style="margin: auto;" class ="space-top space-bot">

                                                    <div class="space-bot" style="display:flex; border-bottom: 0.7px groove gray">
                                                        <div class="style-inline1">
                                                            <input id="input-file" name="fwprofile" type="file" accept="image/*" hidden>
                                                            <img src="../img/user.png" id="img-prev1">
                                                        </div>

                                                        <div class="style-inline " style="display:block; justify-content:center; align-items:center; margin:auto; text-align:center;">
                                                            <div>
                                                                <a href="#" class="btn"  onclick="document.getElementById('input-file').click();" >Browse Files</a>
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
                                                            <label class="lbl"  for="p">Password *</label>
                                                            <input type="password"  name="pass" id="p" class="input-txt-L">
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="cpass">Confirm Password *</label>
                                                            <input type="password" id="cpass" class="input-txt-L" >
                                                        </div>

                                                        <div class="fg-fields-input" style="display:none;">
                                                            <label class="lbl" for="roles">Roles</label >
                                                            <input type="text" name="roles" id="roles" class="input-txt-L"  value="<?php echo $role1; ?>" readonly>
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
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                   
                        </td> 
                    </tr>
                </table>
            </div>
    </div>


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
                            text: 'Your can now Login to your Fishworker Account.',
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