<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
     <title>Kinangop Pride Academy</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db_connect.php');
    // When the form is submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($conn, $name);
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $type = stripslashes($_REQUEST['type']);
        $type = mysqli_real_escape_string($conn, $type);
        $query    = "INSERT into `users` (name, username, email, password, type)
                     VALUES ('$name', '$username', '$email', '" . md5($password) . "', '$type')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <br>
    <center>
    <img src="./logo.jpg" alt="logo" height="130" width="130">
    </center>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name"/>
        <input type="text" class="login-input" name="username" placeholder="Username"/>
        <input type="email" class="login-input" name="email" placeholder="Email"/>
        <input type="password" class="login-input" name="password" placeholder="Password">
        <select name="type" id="type">
            <option value="">----- Please Choose A User Account Type -----</option>
            <option value="1">Admin</option>
            <option value="2">Staff</option>
        </select>
        <br>
        <br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>