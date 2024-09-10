<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Sign Up</title>
    <link rel="icon" href="img/PLMSlogo1.png">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel = "stylesheet" type="text/css" href="css/animation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    $valid_roles = ['CAGRO - Administrator', 'Section Head'];
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
    }

    // Execute the query
    if ($sql->execute()) {
        echo "Registration successful!";

        // Redirect to the appropriate page after a delay
        header("refresh:3;url=$redirect_page");
    
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
                    <h2 class="head">Sign Up as</h2>
                <div class="input-box">
                    <div class="input-field" id="fname-field"  style="display:none">
                        <input type="text" class="input" name="fname" id="fname"  required="" autocomplete="off">
                        <label for="fname">First Name</label> 
                    </div>

                    <div class="input-field" id="lname-field"  style="display:none">
                        <input type="text" class="input" name="lname" id="lname"  required="" autocomplete="off">
                        <label for="lname">Last Name</label> 
                    </div>

                   <div class="input-field" id="email-field"  style="display:none">
                        <input type="email" class="input" name="email" id="email" required="" autocomplete="off">
                        <label for="email">Email</label> 
                    </div>

                   <div class="input-field" id="pass-field"  style="display:none">
                        <input type="password" name="pass" class="input" id="pass" required="" >
                        <label for="pass">Password</label>
                    </div>

                    <div class="input-field" id="pass2-field" style="display:none">
                        <input type="password" class="input" id="cpass" required="">
                        <label for="cpass">Confirm Password</label>
                    </div>
                    
                    <div class="input-field">
                       <select name="roles" class="input-drp" id="roles" onchange="handleRoleChange(); handleCock()">
                            <option style="display: none;">Select Roles</option>
                            <option style="color: #025193; font-weight:600;">Fisherfolks</option>
                            <option style="color: #025193; font-weight:600;">Fishworker</option>
                            <option style="color: #025193; font-weight:600;">Fishcage Operator</option>
                            <option style="color: #025193; font-weight:600;">CAGRO - Administrator</option>
                            <option style="color: #025193; font-weight:600;">Section Head</option>
                       </select>
                    </div>

                    <div class="input-field" id="sub-field" style="display:none"><!---I dont want to pre-display this unless I select section head or Cagro - Administrator--->
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
        function handleRoleChange() 
        {
            const roles = document.getElementById('roles').value;
      
                
                // Redirect to respective pages based on role selection
                if (roles === "Fisherfolks") {
                    window.location.href = 'client/fisherfolk-form.php?role=' + encodeURIComponent(roles);
                } else if (roles === "Fishworker") {
                    window.location.href = 'client/fishworker-form.php?role=' + encodeURIComponent(roles);
                } else if (roles === "Fishcage Operator") {
                    window.location.href = 'client/fishcage-op-form.php?role=' + encodeURIComponent(roles);
                } 
        }
    </script>
    
    <script>
        function handleCock() {
            const rolesDropdown = document.getElementById('roles');
            const selectedRole = rolesDropdown.value;

            const fieldsToToggle = ['fname-field', 'lname-field', 'email-field', 'pass-field', 'pass2-field', 'sub-field'];

            if (selectedRole === 'CAGRO - Administrator' || selectedRole === 'Section Head') {
                fieldsToToggle.forEach(field => {
                    document.getElementById(field).style.display = 'block';
                });
            } else {
                fieldsToToggle.forEach(field => {
                    document.getElementById(field).style.display = 'none';
                });
            }
        }
    </script>
</body>
</html>