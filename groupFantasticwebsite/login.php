<?php

//load and connect to MySQL database stuff
require("config.inc.php");

if (!empty($_POST)) {
    //gets user's info based off of a username.
    $query = " 
            SELECT 
                CPersonID,
                CustomerId, 
                Username,
                Password
            FROM customer 
            WHERE 
                Username = :Username
        ";
    
    $query_params = array(
        ':Username' => $_POST['Username']
    );
    
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one to product JSON data:
        $response["success"] = 0;
        $response["message"] = "Database Error1. Please Try Again!";
        die(json_encode($response));
        
    }
    
    //This will be the variable to determine whether or not the user's information is correct.
    //we initialize it as false.
    $validated_info = false;
    
    //fetching all the rows from the query
    $row = $stmt->fetch();
    if ($row) {
        //if we encrypted the password, we would unencrypt it here, but in our case we just
        //compare the two passwords
        if ($_POST['Password'] === $row['Password']) {
            $login_ok = true;
        }
    }
    
    // If the user logged in successfully, then we send them to the private members-only page 
    // Otherwise, we display a login failed message and show the login form again 
    if ($login_ok) {
        $response["success"] = 1;
        $response["message"] = "Login successful!";
        $_SESSION["PersonID"] = $row['CPersonID'];
        $_SESSION["Username"] = $row['Username'];
        $_SESSION["CustomerId"] = $row['CustomerId'];
        
        header("Location:customer/Cdashboard.php");
        exit();
        die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Credentials!";
        header("Location:login.php?message=invalid");
        exit();
        die(json_encode($response));
    }
} else {
?>
  
  <html >
  <head>
    <meta charset="UTF-8">
    <title>Login_Splash</title>
    
    
    
    
        <link rel="stylesheet" href="css/style_login.css">

<body>

    <html>

<head>
  <title>Base</title>
</head>

<body>
  
  <img src="http://i67.tinypic.com/x58nr7.png">

  <button type="button" class="buttonLayoutLogin" onclick="revealLogin()"
  id=login> <small>Login</small></button>

  <h5 id="alertLine">Registration successful! Please log in!</h5>
  
  <form action = "login.php" method = "post">
  <div class="form-group">
    <input type="text" name="Username" class="form-control" placeholder="Username" id="username" autocomplete:"off">
  </div>
  <div class="form-group">
    <input type="password" name="Password" id="pwd" class="form-control"
    placeholder="Password" autocomplete:"off";>
  </div>
    <button type="submit" class="buttonLayoutSubmit"
    id="submit"><small>Submit</small></button>
    
    <div class="register-line" id="reg-line">
    <h5 id="alertLine2">Invalid credentials</h5>
    <small id="donthaveline">Dont have an account?</small>
    <a href="register.php">Register</a>
    </div>
</form>
  
  <div class="line-separator"></div>
  
  <div id="link-group" class="link-group">
  <a href="login_admin_employee.php">Employee Login</a>
  <a href="login_admin_employee.php" >Admin Login</a>
  <a href="tportal.html" >About</a>
  </div>
  

</body>
    
        <script src="js/index.js"></script>


    <?php
}

if($_GET['message'] == "success") {
    echo "<script> alertLine(); </script>";
}
if($_GET['message'] == "invalid") {
    echo "<script> alertLine2();
    revealLogin(); </script>";
}

?> 
