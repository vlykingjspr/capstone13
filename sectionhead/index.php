<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    
    <title>Dashboard</title>

    
</head>

<body>

<?php

    session_start();

    if(isset($_SESSION["user"]))
    {
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='Section Head'){
            header("location: ../index.php");
        }

    }else
    {
        header("location: ../index.php");
    }
    
    include("../conn.php");

    //fetch data based on logged user
    $userEmail = $_SESSION["user"];
    $query = "";
    if ($_SESSION['usertype']== 'Section Head') 
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

                <tr>
                    <td>
                        <div class="sechead-main-container space-top space-bot">
                            <div class="sechead-prof-container">
                                <img class="sechead-prof-img selector" src="../img/user.png"><!--replace this if there is an existing image file in database-->
                            </div>

                            <div class="sechead-prof-container">
                                <p class="profile-title"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                <p class="profile-subtitle"><?php echo $userData['urole'] ?></p>
                            </div>
                        </div>
                    </td>
                </tr>
                    
                    <tr class="menu-row" >
                        <td class="menu-btn menu-active" >
                            <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn">
                            <a href="dashboard.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn">
                            <a href="#" class="non-style-link-menu "><div><p class="menu-text">Settings</p></a></div>
                        </td>
                    </tr>
                    <tr class="menu-row">
                        <td class="menu-btn">
                            <a href="../logout.php" class="non-style-link-menu "><div><p class="menu-text">Logout</p></a></div>
                        </td>
                    </tr>
                    
            </table>
        </div>
                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "dash-body">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td>
                                <div class="style-inline" style="display: flex; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ HOME</p>
                                    </div>
                                </div> 
                            </td>
                        </tr>

                        <tr>
                            <td class="style-inline">
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search" list="doctors">
                            </td>
                        </tr>
<!-------------------------------------------------------------------------dashboard main contents------------------------------------------------------------------------------------->
                        <tr>
                        <td>
                                    <div class="main-dash-container animy">
                                        <div class="card-container"><!--card-->
                                            <div class="space cards color3">
                                                <p class="card-header">Fishworkers</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color1">
                                                <p class="card-header">Newly Registered</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color3">
                                                <p class="card-header">Non-Local Fishers</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color2">
                                                <p class="card-header">Non-Motorized Gear</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color2">
                                                <p class="card-header">Renewed</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color1">
                                                <p class="card-header">Motorized-Gear</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>

                                            <div class="space cards color3">
                                                <p class="card-header">Local-Fishers</p>
                                                <p class="card-count">0</p>
                                                <p class="card-txt">Total</p>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>
    <!--ionicons-script-->
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>

    <script>
        function toggle_visibility(id) 
        {
            var e = document.getElementById(id);
            if (e.style.display == 'block') e.style.display = 'none';
            else e.style.display = 'block';


        }
    </script>
</body>
</html>