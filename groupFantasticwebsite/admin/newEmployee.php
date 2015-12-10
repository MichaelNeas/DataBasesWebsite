<?php 
	include('includes/header.php');
	?>

<h3 id="title"> New Employee Registration </h3>

  <h5 id="alertLine">Invalid credentials</h5>
  <h5 id="alertLine2">Username is unavailable!</h5>

  <form action="newEmployee.php" method="post">
    <div class="form-group">
      <label for="">First name</label>
      <input type="text" name="FirstName" required class="form-control" id="FirstName" autocomplete: "off">
      <label for="">Last name</label>
      <input type="text" name="LastName" required class="form-control" id="LastName" autocomplete: "off";>
      <label for="">Email</label>
      <input type="text" name="Email" required class="form-control" id="em" autocomplete: "off">
      <label for="">Company</label>
      <input type="text" name="Company" class="form-control" id="Company" autocomplete: "off";>
      <label for="">Username</label>
      <input type="text" name="Username" required class="form-control" id="Username" autocomplete: "off">
      <label for="">Password</label>
      <input type="password" name="Password" required class="form-control" id="Password" autocomplete: "off">
      <label for="">Address</label>
      <input type="text" name="Address" required class="form-control" id="Address" autocomplete: "off">
      <label for="">City</label>
      <input type="text" name="City" required class="form-control" id="City" autocomplete: "off">
      <label for="">State</label>
      <input type="text" name="State" required class="form-control" id="State" autocomplete: "off">
      <label for="">Country</label>
      <input type="text" name="Country" required class="form-control" id="Country" autocomplete: "off">
      <label for="">Postal code</label>
      <input type="text" name="PostalCode" required class="form-control" id="PostalCode" autocomplete: "off">
      <label for="">Phone</label>
      <input type="text" name="Phone" required class="form-control" id="Phone" autocomplete: "off">
      <label for="">Fax</label>
      <input type="text" name="Fax" class="form-control" id="Fax" autocomplete: "off">
      <label for="">Admin</label>
      <input type="text" name="Admin" class="form-control" id="Admin" autocomplete: "off">
      <label for="">BirthDate</label>
      <input type="text" name="BirthDate" class="form-control" id="BirthDate" autocomplete: "off">
      <label for="">HireDate</label>
      <input type="text" name="HireDate" class="form-control" id="HireDate" autocomplete: "off">
      <label for="">ReportsTo</label>
      <input type="text" name="ReportsTo" class="form-control" id="ReportsTo" autocomplete: "off">
      <label for="">Reputation</label>
      <input type="text" name="Reputation" class="form-control" id="Reputation" autocomplete: "off">
      <label for="">Title</label>
      <input type="text" name="Title" class="form-control" id="Title" autocomplete: "off">

      <button type="submit" class="buttonLayoutSubmit" id="submit"><small>Submit</small></button>

    </div>
  </form>


  <script src="../js/index.js"></script>


	
<?php
if($_GET['message'] == "invalid") {
    echo "<script> alertLine(); </script>";
}
if($_GET['message'] == "unavail") {
    echo "<script> alertLine2(); </script>";
}
if($_GET['message'] == "success") {
  echo '<script language="javascript">';
  echo 'alert("Employee successfully added")';
  echo '</script>';
}

	include('../globalIncludes/footer.php');
	?>