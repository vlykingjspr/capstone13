<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Log In</title>
    <link rel="icon" href="img/PLMSlogo1.png">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel = "stylesheet" type="text/css" href="css/animation.css">
    <link rel = "stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">        
    </style>
    
</head>

<body class="back">

<?php
session_start();

include("conn.php");

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $error = '<label for="promter" class="form-label"></label>';
    $loggedIn = false;

    // List of tables and their corresponding roles
    $tables = [
        'users' => ['CAGRO - Administrator', 'Section Head'],
        'fishworkerlicense' => ['Fishworker'],
        'fisherfolks' => ['Fisherfolks'],
        'fishcage' => ['Fishcage Operator']
    ];

    foreach ($tables as $table => $roles) {
        
        $result = $conn->query("SELECT * FROM $table WHERE u_email='$email'");

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $utype = $user['u_role'];

            if (in_array($utype, $roles)) {
                
                $checker = $conn->query("SELECT * FROM $table WHERE u_email='$email' AND u_pass='$password'");
                if ($checker && $checker->num_rows == 1) {
                    
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = $utype;

                    // Redirect based on user role
                    switch ($utype) {
                        case 'CAGRO - Administrator':
                            header('Location: admin/index.php');
                            break;
                        case 'Section Head':
                            header('Location: sectionhead/index.php');
                            break;
                        case 'Fishworker':
                        case 'Fisherfolks':
                        case 'Fishcage Operator':
                            header('Location: client/index.php');
                            break;
                        default:
                            $error = '<label for="promter" class="f-pass" style="color: white;text-align:center; margin-bottom:25px">Invalid user role</label>';
                    }

                    $loggedIn = true;
                    break; // Break out of both loops
                } else {
                    $error = '<label for="promter" class="f-pass" style="color: white;text-align:center; margin-bottom:25px">Wrong credentials: Invalid email or password</label>';
                }
            }
        }
    }

    if (!$loggedIn) {
        $error = '<label for="promter" class="f-pass" style="color: white;text-align:center; margin-bottom:25px">We cannot find any account for this email</label>';
    }
} else {
    $error = '<label for="promter" class="f-pass">&nbsp;</label>';
}
?>

<center>
<div class="wrapper">
    <div class="container main">
        <div class="row">

            <!----Logo-Container---->
            <div class="col-md-6 side-image">
                
                <div class="text">
            </div>
                

            <!--input-field-container-->
            </div>
            <div class="col-md-6 right">
                <form action="" method="POST">
                    <?php echo $error ?>                    
                    <div class="input-box">   
                    <div class="input-field">
                            <input type="text" class="input" name="email" id="email" required="" autocomplete="off">
                            <label for="email">Email</label> 
                        </div> 
                    <div class="input-field">
                            <input type="password" name="pass" class="input" id="pass" required="">
                            <label for="pass">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="cpass" required="">
                            <label for="cpass">Confirm Password</label>
                            <span><a class="fpass" href="#">Forgot Password?</a></span>
                        </div>
                        
                    <div class="input-field">
                            <input type="submit" class="submit" value="Log In">
                    </div> 
                    
                    <div class="signin">
                        <span>Doesn't have an account? <a href="signup.php">Sign Up here</a></span>
                    </div>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
</center>



</body>

</html>