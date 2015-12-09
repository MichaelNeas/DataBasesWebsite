<?php

/*
Our "config.inc.php" file connects to database every time we include or require
it within a php script.  Since we want this script to add a new user to our db,
we will be talking with our database, and therefore,
let's require the connection to happen:
*/
require("config.inc.php");

//if posted data is not empty
if (!empty($_POST)) {
    //If the username or password is empty when the user submits
    //the form, the page will die.
    //Using die isn't a very good practice, you may want to look into
    //displaying an error message within the form instead.  
    //We could also do front-end form validation from within our Android App,
    //but it is good to have a have the back-end code do a double check.

    if (empty($_POST['Username']) || empty($_POST['Password'])) {
        
        
        // Create some data that will be the JSON response 
        $response["success"] = 0;
        $response["message"] = "Please Enter Both a Username and Password.";
        
        //die will kill the page and not execute any code below, it will also
        //display the parameter... in this case the JSON data our Android
        //app will parse
        die(json_encode($response));
    }
    
    //if the page hasn't died, we will check with our database to see if there is
    //already a user with the username specificed in the form.  ":user" is just
    //a blank variable that we will change before we execute the query.  We
    //do it this way to increase security, and defend against sql injections
    $query        = " SELECT 1 FROM customer WHERE Username = :Username ";
    //now lets update what :user should be
    $query_params = array(
        ':Username' => $_POST['Username']
    );
    
    //Now let's make run the query:
    try {
        // These two statements run the query against your database table. 
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
    
    //fetch is an array of returned data.  If any data is returned,
    //we know that the username is already in use, so we murder our
    //page
    $row = $stmt->fetch();
    if ($row) {
        // For testing, you could use a die and message. 
        //die("This username is already in use");
        
        //You could comment out the above die and use this one:
        $response["success"] = 0;
        $response["message"] = "I'm sorry, this username is already in use";
        die(json_encode($response));
    }

    $query = "INSERT INTO person ( FirstName, LastName, Address, City, State, Country, PostalCode, Phone, Fax, Email ) VALUES ( :FirstName, :LastName, :Address, :City, :State, :Country, :PostalCode, :Phone, :Fax, :Email ) ";
    
    $query_params = array(
        ':FirstName' => $_POST['FirstName'],
        ':LastName' => $_POST['LastName'],
        ':Address' => $_POST['Address'],
        ':City' => $_POST['City'],
        ':State' => $_POST['State'],
        ':Country' => $_POST['Country'],
        ':PostalCode' => $_POST['Phone'],
        ':Phone' => $_POST['Address'],
        ':Fax' => $_POST['Fax'],
        ':Email' => $_POST['Email']
    );

    try {

        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);

        //$conn->close();
        //$stmt   = $db->prepare($query);
        //$result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error2.5 Please Try Again!";
        die(json_encode($response));
    }
    
    //If we have made it this far without dying, we have successfully added
    //a new user to our database.  We could do a few things here, such as 
    //redirect to the login page.  Instead we are going to echo out some
    //json data that will be read by the Android application, which will login
    //the user (or redirect to a different activity, I'm not sure yet..)

    $response["success"] = 1;
    $response["message"] = "User added to person table!";
    echo json_encode($response);
    
    //for a php webservice you could do a simple redirect and die.
    //header("Location: login.php"); 
    //die("Redirecting to login.php");
    
    //If we have made it here without dying, then we are in the clear to 
    //create a new user.  Let's setup our new query to create a user.  
    //Again, to protect against sql injects, user tokens such as :user and :pass
    $query = "INSERT INTO customer ( CPersonID, Username, Password, Company ) VALUES ( (SELECT PersonID FROM person WHERE FirstName = :FirstName AND LastName = :LastName), :Username, :Password, :Company )";
    
    //Again, we need to update our tokens with the actual data:
    $query_params = array(
        ':FirstName' => $_POST['FirstName'],
        ':LastName' => $_POST['LastName'],
        ':Username' => $_POST['Username'],
        ':Password' => $_POST['Password'],
        ':Company' => $_POST['Company']
    );

    //time to run our query, and create the user
    try {

        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        die(json_encode($response));
    }
    
    //If we have made it this far without dying, we have successfully added
    //a new user to our database.  We could do a few things here, such as 
    //redirect to the login page.  Instead we are going to echo out some
    //json data that will be read by the Android application, which will login
    //the user (or redirect to a different activity, I'm not sure yet..)
    $response["success"] = 1;
    $response["message"] = "User added to customer table!";
    echo json_encode($response);
    
    //for a php webservice you could do a simple redirect and die.
    //header("Location: login.php"); 
    //die("Redirecting to login.php");
    
    
} else {
?>

<link rel="stylesheet" href="css/style_register.css">

  <div id="header">
    <img src="http://i67.tinypic.com/x58nr7.png" id="logo">
    <img src="http://i63.tinypic.com/2lxxith.png" id="chinook">
  </div>
  
  <a href = "login.php"> 
  <img src="http://mixvassallo.com/website/frontend/css/images/back-button.png" 
  back
  id = "backbutton" >
  </a>
  
  <h3 id=title> Customer Registration </h3>
  <div class="line-separator"></div>

  <form action="register.php" method="post">
    <div class="form-group">
      <label for="">First name</label>
      <input type="text" name="FirstName" class="form-control" id="FirstName" autocomplete: "off">
      <label for="">Last name</label>
      <input type="text" name="LastName" class="form-control" id="LastName" autocomplete: "off";>
      <label for="">Email</label>
      <input type="text" name="Email" class="form-control" id="Email" autocomplete: "off">
      <label for="">Company</label>
      <input type="text" name="Company" class="form-control" id="Company" autocomplete: "off";>
      <label for="">Username</label>
      <input type="text" name="Username" class="form-control" id="Username" autocomplete: "off">
      <label for="">Password</label>
      <input type="password" name="Password" class="form-control" id="Password" autocomplete: "off">
      <label for="">Address</label>
      <input type="text" name="Address" class="form-control" id="Address" autocomplete: "off">
      <label for="">City</label>
      <input type="text" name="City" class="form-control" id="City" autocomplete: "off">
      <label for="">State</label>
      <input type="text" name="State" class="form-control" id="State" autocomplete: "off">
      <label for="">Country</label>
      <input type="text" name="Country" class="form-control" id="Country" autocomplete: "off">
      <label for="">Postal code</label>
      <input type="text" name="PostalCode" class="form-control" id="PostalCode" autocomplete: "off">
      <label for="">Phone</label>
      <input type="text" name="Phone" class="form-control" id="Phone" autocomplete: "off">
      <label for="">Fax</label>
      <input type="text" name="Fax" class="form-control" id="Fax" autocomplete: "off">
      <button type="submit" class="buttonLayoutSubmit" id="submit"><small>Submit</small></button>
    </div>
  </form>

<?php

}

?>
