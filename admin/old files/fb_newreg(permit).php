<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <script src="js/nxt.js" defer></script>
    <script src="js/img.js" defer></script>
    
    <title>Fishing Boat Permit</title>

    
</head>

<body>
    <div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:3% 0 3% 0;" colspan="2">
                        <table border="0" class="profile-container" style="background-color: white; padding-left: 2%;">
                            <tr>
                                <td width="60%" >
                                    <img src="../img/plmslog.jpg" alt="" width="100%">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                    
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-doctor" >
                            <a href="index1.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-doctor">
                            <a href="fisherfolks.php" class="non-style-link-menu"><div><p class="menu-text">Fisherfolks</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                            <a href="fishinggears.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Fishing Gears</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn menu-icon-appoinment">
                            <a href="fishingboats.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Boats</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="fishingcages.php" class="non-style-link-menu"><div><p class="menu-text">Fishing Cages</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row" >
                        <td class="menu-btn menu-icon-patient">
                            <a href="#" class="non-style-link-menu"><div><p class="menu-text">Licensing</p></a></div>
                        </td>
                    </tr>
            </table>
        </div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td colspan="3" class="nav">
                                <table>
                                    <tr>
                                        <td width="1%">
                                            <button class="back-butt" style="padding-left: 25%;"><a href="fishingboats.php"><img class="back-img"src="../img/icons/back-butt.png"></a></button>
                                        </td>

                                        <td style="padding-left: 1%;font-size: 23px; width: 30%;">
                                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISH CAGE REGISTRATION FORM</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td width="7%">
                                <img src="../img/sus.jpg" width="45%" style="border-radius:50%">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <table class="fg-newreg">

                                
                            <tr>
                                <form action="#">
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
                                                            <select id="salut"  class="input-drp">
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Mr.">Mrs.</option>
                                                                <option value="Mr.">Ms.</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="firstn">FIRST NAME</label>
                                                            <input type="text" id="firstn" class="input-txt" required>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midn">MIDDLE NAME</label>
                                                            <input type="text" id="midtn" class="input-txt"  required>
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastn">LAST NAME</label>
                                                            <input type="text" id="lastn" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="salut">APPELLATION</label>
                                                            <select id="salut"  class="input-drp" >
                                                                <option value="Mr."></option>
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Mr.">Mrs.</option>
                                                                <option value="Mr.">Ms.</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class = "fgnew-ph">
                                                        <p>ADDRESS OF LOCATOR</p>
                                                    </div>

                                                    <div class="fg-fields">

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">POSTAL CODE</label>
                                                            <input type="number" id="postal" class="input-drp" >
                                                        </div>
                                                        

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="prov">PROVINCE</label>
                                                            <input type="text" id="firstn" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="midn">CITY/MUNICIPAL</label>
                                                            <input type="text" id="midtn" class="input-txt" >
                                                        </div>

                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="lastn">BARANGAY</label>
                                                            <input type="text" id="lastn" class="input-txt">
                                                        </div>
                                                        
                                                        <div class="fg-fields-input">
                                                            <label class="lbl" for="postal">STREET</label>
                                                            <input type="text" id="postal" class="input-drp" >
                                                        </div>
                                                    </div>

                                                    <div class="fg-fields-input">
                                                        <label class="lbl" for="cnumber">CONTACT NUMBER</label>
                                                        <input type="tel" id="cnumber" class="input-txt" placeholder="+63">
                                                    </div>

                                                </div>

                                            
                                            </div>

                                            <div class="fgnew-card-es">        

                                                <div class="fg-header">
                                                    <p>BOAT IDENTIFICATION</p>
                                                </div>
                                                
                                            
                                                <div class="fgnew-con">
                                                    <div class = "fgnew-ph">
                                                        <p>SERVICE TYPE</p>
                                                    </div>
                                                    
                                                    <div class="fg-fields-L">

                                                        <div class="fg-fields-input-1">
                                                            <select id="salut"  class="input-txt">
                                                                <option value></option>
                                                                <option value></option>
                                                                <option value></option>
                                                            </select>
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <select id="salut"  class="input-txt">
                                                                <option value></option>
                                                                <option value></option>
                                                                <option value></option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="fg-fields-L">

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="gearused">GEAR USED</label>
                                                            <input type="text" id="gearused" class="input-txt2">   
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="boatname">BOAT NAME</label>
                                                            <input type="text" id="boatname" class="input-txt">
                                                        </div>

                                                        <div class="fg-fields-input-1">
                                                            <label class="lbl" for="boatcolor">BOAT COLOR</label>
                                                            <input type="text" id="boatcolor" class="input-txt">
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            
                                            </div>
                                        
                                            

                                        </div>

                                        <div class="butt-con">
                                            <a href="#" class="btn nxt-butt"><img src="../img/icons/nxt.png"></a>
                                         </div>
                                        
                                    </div>

<!-------------------------------------------------------------------------------------Second-Tab------------------------------------------------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------------Third--Tab------------------------------------------------------------------------------------------------------------------------------------------>
    
<!----------------------------------------------------------------------------------Fourth-Tab------------------------------------------------------------------------------------------------------------------------>                                    
                                    
                                    <div class="fcon">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card-prof">

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
                                                            <input id="input-file" type="file" accept="image/*" hidden>
                                                            <button class="pcon-butt" onclick="document.getElementById('input-file').click();">BROWSE FILES</button>
                                                            <h3 style="color: black;">OR</h3>
                                                            <button class="pcon-butt">TAKE A PHOTO</button>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="butt-con">
                                            <a href="#" class="btn prev-butt"><img src="../img/icons/back-butt.png"></a>
                                            <a href="#" class="btn nxt-butt"><img src="../img/icons/nxt.png"></a>
                                        </div>
                                    </div>

<!-----------------------------------------------------------------------------------Fifth-Tab------------------------------------------------------------------------------------------------------------------------->

                                    <div class="fcon">
                                        <div class="fg-newreg-items">
                                            <div class="fgnew-card-prof">

                                                <div class="fg-header">
                                                    <p>Profile</p>
                                                </div>

                                                <div class="fgnew-con" style="padding: 1.07rem 0 1.07rem 0;">
                                                    <div class="pcon1">

                                                        <div class="pcon-items1">
                                                            <div class="img-view" id="drop-area">
                                                                <img src="../img/icons/upload2.svg" id="img-prev"><br>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="pcon-items1">
                                                            <button class="pcon-butt1 prev-butt">TAKE ANOTHER PHOTO</button>
                                                            <input type="submit" class="pcon-butt1 nxt-butt" value=" SAVE AND CONTINUE">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                   
                            <div class="fcon">
                                    <div class="sc-con">
                                        <div class="gen-con">
                                            <div class="gen-items">
                                                <img src="../img/icons/check.png">
                                            </div>

                                            <div class="gen-items">
                                                <h3>SAVED INFORMATION</h3>
                                            </div>

                                            <div class="gen-items">
                                                <button class="g-butt">GENERATE FORM</button>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                                </form>
                                        
                            </tr>

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
</body>
</html>