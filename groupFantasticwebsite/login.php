<?php

//load and connect to MySQL database stuff
require("config.inc.php");

if (!empty($_POST)) {
    //gets user's info based off of a username.
    $query = " 
            SELECT 
                PersonID, 
                Username, 
                Password
            FROM Customer 
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
        die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Credentials!";
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
  
  <form action = "login.php" method = "post">
  <div class="form-group">
    <input type="text" name="Username" class="form-control" id="username" placeholder="Username" autocomplete:"off">
  </div>
  <div class="form-group">
    <input type="password" name="Password" class="form-control" id="pwd"
    placeholder="Password" autocomplete:"off";>
  </div>
    <button type="submit" class="buttonLayoutSubmit"
    id="submit"><small>Submit</small></button>
    
    <div class="register-line" id="reg-line">
    <small id="donthaveline">Dont have an account?</small>
    <a href="register.php">Register</a>
    </div>
</form>
  
  <div class="line-separator"></div>
  
  <div id="link-group" class="link-group">
  <a href="login_employee.php">Employee Login</a>
  <a href="login_admin.php" >Admin Login</a>
  <a href="tportal.html" >About</a>
  </div>
  

</body>
    
        <script src="js/index.js"></script>

    
    
    
  </body>


    <?php
}

?> 
