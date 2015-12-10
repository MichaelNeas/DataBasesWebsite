<?php 
    include('includes/header.php');
?>

  <h1 style="text-align:center;">Modify Customers And Self Information</h1>
  
<form action="#">
  <div id="edit">
  
       <select name="select_name"> 
        <option value="Not Pulling DB">Place Holder Fill Customers</option>
    <!--<?php /*
      foreach($employees as $employee) 
    { 
      echo '<option value="'.$employee->first_name .'">'.$employee->first_name .'</option>'; 
    } 
    */?> -->
      </select>
      <br><br>


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