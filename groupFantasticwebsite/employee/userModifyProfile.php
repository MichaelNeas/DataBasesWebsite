<?php 
    include('includes/header.php');
?>
  <h1 style="text-align:center;">Modify Customers And Self Information</h1>


  <form method="post" action="" style="padding:10px; text-align:center;">     
    <select name="personID"> 
        <option value="">All Customers</option>

    <?php 
        $query = "SELECT PersonID,FirstName,LastName FROM person ORDER BY person.LastName ASC";
        if ($stmt = $con->prepare($query)) {
                $stmt->execute();
          $stmt->bind_result($PersonID, $FirstName, $LastName);
          while ($stmt->fetch()) {
              echo '<option value="'.$PersonID.'">' .$LastName. ",".$FirstName.'</option>';
          }
        }
        /*else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        $con->close();*/
    ?>

      </select>
      <input name="fillTableSubmit" type="submit" style:"padding-top: 0px;" value="Change me!">
      </form>

<?php   
/* Connection Debugging 
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }*/
    //echo $_POST['personID'];
    if(isset($_POST["fillTableSubmit"])){
        $personID = $_POST['personID'];
        //echo $personID;
            $query = "SELECT * FROM person WHERE PersonID = ?";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $personID); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($PersonID, $FirstName, $LastName, $Address, $City, $State, $Country, $PostalCode, $Phone, $Fax, $Email);
            $stmt->fetch();



        }
        // Free result set

    $con->close();
        /* Connection Debugging s
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        */
    }
    //else{
      //echo "No Button Registerd";
    //}
?>  

  
<form action="" method="post">
  <div id="edit">

      <label for="name">Username:</label>
      <input type="text" name="name" id="name" placeholder="Username" />
    <br>    

      <label for="pass">Password:</label>
      <input type="text" name="pass" id="pass" placeholder="Password" />
    <br> 

      <label for="cpass">Confirm Password:</label>
      <input type="text" name="cpass" id="cpass" placeholder="Confirm Password" />
    <br>   

       <label for="fname">First Name:</label>
      <input type="text" name="fname" id="fname" placeholder="Firstname" />
    <br>   

      <label for="lname">Last Name:</label>
      <input type="text" name="lname" id="lname" placeholder="Lastname" />
    <br>   

      <label for="street">Street:</label>
      <input type="text" name="street" id="street" placeholder="Street" />
        <br>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" placeholder="City" />
    <br>

    <label for="zip">Zip:</label>
    <input type="text" name="zip" id="zip" placeholder="Zip" />
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" placeholder="Email" />
    <br>
      
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" placeholder="Phone" />
    <br>
      
    <label for="fax">Fax:</label>
    <input type="text" name="fax" id="fax" placeholder="Fax" />
    <br>

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" placeholder="Country" />
    <br>   
        
        <div id="submit">
          <input type="submit" value="Submit" />
        </div>
  </div>
</form>  

<?php
  include('../globalIncludes/footer.php');
  ?>