<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Sign Up</title>
    <link rel="icon" href="img/PLMSlogo1.png">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel = "stylesheet" type="text/css" href="css/animation.css">
    <link rel = "stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">        
</head>

<body>

<?php

if(isset($_POST['submit'])) {
    // Get form data
    include("conn.php");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $roles = $_POST['roles'];

    // Database connection
    $valid_roles = ['CAGRO - Administrator', 'Section Head', 'Fisherfolks', 'Fishworker', 'Fishcage Operator'];
    if (!in_array($roles, $valid_roles)) {
        echo "Invalid role selected.";
        exit;
    }

    // Prepare the SQL query based on the selected role
    switch ($roles) {
        case 'CAGRO - Administrator':
        case 'Section Head':
            $sql = $conn->prepare("INSERT INTO users (u_fname, u_lname, u_pass, u_email, u_role) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("sssss", $fname, $lname, $pass, $email, $roles);
            $redirect_page = 'signup.php'; // Redirect to a success page or any other page you want
            break;
        case 'Fisherfolks':
            $sql = $conn->prepare("INSERT INTO fisherfolks (u_email, u_pass, u_role) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $email, $pass, $roles);
            $redirect_page = 'client/ff_lic_per.php';
            break;
        case 'Fishworker':
            $sql = $conn->prepare("INSERT INTO fishworkerlicense (u_email, u_pass, u_role) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $email, $pass, $roles);
            $redirect_page = 'client/fw_lic_per.php';
            break;
        case 'Fishcage Operator':
            $sql = $conn->prepare("INSERT INTO fishcages (u_email, u_pass, u_role) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $email, $pass, $roles);
            $redirect_page = 'client/fc_newreg.php';
            break;
    }

    // Execute the query
    if ($sql->execute()) {
        // Redirect to the appropriate page
        header("Location: $redirect_page");
        exit;
    } else {
        echo "Error: " . $sql->error;
    }

    // Close the prepared statement and connection
    $sql->close();
    $conn->close();
}
?>

<div class="wrapper">
    <div class="container main">
        <div class="row">

            <!----Logo-Container---->
            <div class="col-md-6 side-image">

            <!--input-field-container-->
            </div>
            <div class="col-md-6 right">
                
                <form action="" method="POST">
                    <h2 class="head">Create Your Account</h2>
                <div class="input-box">
                    <div class="input-field" id="fname-field">
                        <input type="text" class="input" name="fname" id="fname" autocomplete="off"><!---hide this if I selected Fisherfolks, Fishworker and Fishcage Operator--->
                        <label for="fname">First Name</label> 
                    </div>

                    <div class="input-field" id="lname-field">
                        <input type="text" class="input" name="lname" id="lname" autocomplete="off"><!---hide this if I selected Fisherfolks, Fishworker and Fishcage Operator--->
                        <label for="lname">Last Name</label> 
                    </div>

                   <div class="input-field">
                        <input type="email" class="input" name="email" id="email" required autocomplete="off">
                        <label for="email">Email</label> 
                    </div>

                   <div class="input-field">
                        <input type="password" name="pass" class="input" id="pass" required>
                        <label for="pass">Password</label>
                    </div>

                    <div class="input-field">
                        <input type="password" class="input" id="cpass" required="">
                        <label for="cpass">Confirm Password</label>
                    </div>
  
                    <div class="input-field">
                       <select name="roles" class="input-drp" id="roles">
                            <option style="display: none;">Roles</option>
                            <option style="color: #025193; font-weight:600;">CAGRO - Administrator</option>
                            <option style="color: #025193; font-weight:600;">Fisherfolks</option><!--if i choose this it will automatically redirect to the fisherfolks page and fillup an emptyinput field based on this option-->
                            <option style="color: #025193; font-weight:600;">Fishworker</option><!--if i choose this it will automatically redirect to the fisherfolks page and fillup an emptyinput field based on this option-->
                            <option style="color: #025193; font-weight:600;">Fishcage Operator</option><!--if i choose this it will automatically redirect to the fisherfolks page and fillup an emptyinput field based on this option-->
                            <option style="color: #025193; font-weight:600;">Section Head</option>
                       </select>
                    </div>
                    
                    <div class="input-field">
                        <input type="submit" name ="submit" id="submit-btn" class="submit" value="Sign Up">
                    </div>
                    
                </div>
                
               <div class="signin">
                <span>Already have an account? <a href="login.php">Log In here</a></span>
               </div>

            </form>  
            </div>
        </div>
    </div>
</div>

    <script>
        if ( window.history.replaceState ) 
        {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        document.getElementById('roles').addEventListener('change', function() {
            var selectedRole = this.value;
            var fnameField = document.getElementById('fname-field');
            var lnameField = document.getElementById('lname-field');
            var submitbtn = document.getElementById('submit-btn');

            if (selectedRole === 'Fisherfolks' || selectedRole === 'Fishworker' || selectedRole === 'Fishcage Operator') {
                fnameField.classList.add('hidden');
                lnameField.classList.add('hidden');
                submitbtn.classList.add('hidden');
            } else {
                fnameField.classList.remove('hidden' );
                lnameField.classList.remove('hidden');
                submitbtn.classList.remove('hidden' );
            }
        });
    </script>
</body>
</html>