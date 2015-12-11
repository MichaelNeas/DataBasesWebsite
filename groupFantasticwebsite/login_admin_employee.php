<?php

//load and connect to MySQL database stuff
require("config.inc.php");

if (!empty($_POST)) {
    //gets user's info based off of a username.
    $query = " 
            SELECT 
                PersonID,
                EmployeeId, 
                Username, 
                Password,
                Admin
            FROM employee 
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
    if ($login_ok && $row['Admin'] == 1) {
        $response["success"] = 1;
        $response["message"] = "Login successful!";
        header("Location:admin/Adashboard.php");
        exit();
        die(json_encode($response)); 
    } elseif ($login_ok && $row['Admin'] !== 1) {
        $response["success"] = 1;
        $response["message"] = "Login successful!";
        $_SESSION["PersonID"] = $row['PersonID'];
        $_SESSION["Username"] = $row['Username'];
        $_SESSION["EmployeeId"] = $row['EmployeeId'];
        header("Location:employee/Edashboard.php");
        exit();
        die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Credentials!";

		header("Location:login_admin_employee.php?message=invalid");
    	exit();

        //echo '<script type="text/javascript">
       // document.getElementById("alertLine").style.display = "block";
       // window.location = "login_admin_employee.php";
    	//</script> ';
        //die(json_encode($response));
    }
} else {
?>
  
  <html >
  <head>
    <meta charset="UTF-8">
    <title>Login_Splash</title>
    
    
    
    
        <link rel="stylesheet" href="css/style_login_admin_employee.css">

<body>

    <html>

<head>
  <title>Base</title>
</head>

<body>
  
  <div id="header">
    <img src="http://i67.tinypic.com/x58nr7.png" id="logo">
    <img src="http://i63.tinypic.com/2lxxith.png" id="chinook">
  </div>
  
  <a href = "login.php"> 
  <img src="http://mixvassallo.com/website/frontend/css/images/back-button.png" back id = "backbutton" ></a>
  
  <h3 id=title>Admin / Employee Login</h3>
  <div class="line-separator"></div>

  <div id="centerbox">

  <form action="login_admin_employee.php" method="post">
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" name="Username" class="form-control" id="username" autocomplete: "off">
      <label for="">Password</label>
      <input type="password" name="Password" class="form-control" id="pwd" autocomplete: "off";>
      </div>
      <button type="submit" class="buttonLayoutSubmit"
    		id="submit"><small>Submit</small></button>
  </form>

  <h5 id=alertLine>Invalid credentials</h5>
    
  </div>

</body>
    
        <script src="js/index.js"></script>

    
  </body>


    <?php
}

if($_GET['message'] == "invalid") {
    echo "<script> alertLine(); </script>";
}

?> 