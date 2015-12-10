<?php 
    include('includes/header.php');
?>

  <h1 style="text-align:center;">Modify Your Information</h1>
  <h3>The plan is to load the session id and have all the current data on the left and they can fill out the form and submit it on the right to update everything they want..Just need sessions</h3>
  
<form action="#">
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