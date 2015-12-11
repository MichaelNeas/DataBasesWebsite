<?php 
    include('includes/header.php');
?>

  <h1 style="text-align:center;">Modify Your Information</h1>
  <h5 style="text-align:center;">Any information you don't want changed just leave empty!</h5>
    <?php 
/* Connection Debugging 
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }*/
    //echo $_POST['personID'];
    if(!is_null($_SESSION['PersonID'])){
        $personID = $_SESSION['PersonID'];
        //echo $personID;
            $query = "SELECT person.*,`customer`.Username FROM (person,customer) WHERE PersonID = ? AND `customer`.CPersonID = `person`.PersonID";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $personID); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($PersonID, $FirstName, $LastName, $Address, $City, $State, $Country, $PostalCode, $Phone, $Fax, $Email, $Username);
            $stmt->fetch();
            ?>
            <form action="" method="post">
  <div id="edit">
      <label for="name">Username:</label>
      <input type="text" name="name" id="name" placeholder="<?php echo $Username;?>"/>
    <br>    

      <label for="pass">Password:</label>
      <input type="text" name="pass" id="pass" placeholder="**Change Pass**" />
    <br> 

      <label for="cpass">Confirm Password:</label>
      <input type="text" name="cpass" id="cpass" placeholder="Confirm New Password" />
    <br>   

       <label for="fname">First Name:</label>
      <input type="text" name="fname" id="fname" placeholder="<?php echo $FirstName;?>" />
    <br>   

      <label for="lname">Last Name:</label>
      <input type="text" name="lname" id="lname" placeholder="<?php echo $LastName;?>" />
    <br>   

      <label for="street">Street:</label>
      <input type="text" name="street" id="street" placeholder="<?php echo $Address;?>" />
        <br>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" placeholder="<?php echo $City;?>" />
    <br>

    <label for="zip">Zip:</label>
    <input type="text" name="zip" id="zip" placeholder="<?php echo $PostalCode;?>" />
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" placeholder="<?php echo $Email;?>" />
    <br>
      
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" placeholder="<?php echo $Phone;?>" />
    <br>
      
    <label for="fax">Fax:</label>
    <input type="text" name="fax" id="fax" placeholder="<?php echo $Fax;?>" />
    <br>

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" placeholder="<?php echo $Country;?>" />
    <br>   
        
        <div id="submit">
          <input type="submit" value="Change Records" />
        </div>
<?php

        }
        // Free result set
    //mysqli_free_result($result);

    $con -> close();
        /* Connection Debugging s
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        */
    }
    else{
      echo "Not Good";
    }
?>  
	</div>
</form>  

<?php
  include('../globalIncludes/footer.php');
  ?>