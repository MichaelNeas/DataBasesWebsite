<?php

  ob_start();

	include('includes/header.php');

  if (!empty($_POST)) {

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $sql = "SELECT 1 FROM employee WHERE Username = ?";
    $stmt = $con->prepare($sql);
    $Username = $_POST["Username"];
    $stmt->bind_param('s', $Username);
    $stmt->execute();

    $row = $stmt->fetch();

    if($row) {
      header("Location:newEmployee.php?message=unavail");
      exit();
    }

    $sql = "INSERT INTO person (FirstName, LastName, Address, City, State, Country, PostalCode, Phone, Fax, Email) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);

    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Address = $_POST["Address"];
    $City = $_POST["City"];
    $State = $_POST["State"];
    $Country = $_POST["Country"];
    $PostalCode = $_POST["FirstName"];
    $Phone = $_POST["Phone"];
    $Fax = $_POST["Fax"];
    $Email = $_POST["Email"];

    $stmt->bind_param('ssssssssss', $FirstName, $LastName, $Address, $City, $State, $Country, $PostalCode, $Phone, $Fax, $Email);
    $stmt->execute();

    $sql = "INSERT INTO employee (PersonID, Title, ReportsTo, BirthDate, HireDate, Username, Password, Admin, Reputation) VALUES (@@identity,?,?,?,?,?,?,?,?)";

    $stmt = $con->prepare($sql);
    $Title = $_POST["Title"];
    $ReportsTo = $_POST["ReportsTo"];
    $BirthDate = $_POST["BirthDate"];
    $HireDate = $_POST["HireDate"];
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $Admin = $_POST["Admin"];
    $Reputation = $_POST["Reputation"];

    $stmt->bind_param('sissssii', $Title, $ReportsTo, $BirthDate, $HireDate, $Username, $Password, $Admin, $Reputation);
    $stmt->execute();

    header("Location:newEmployee.php?message=success");
    exit();

} else {

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
      <label for="">BirthDate</label>
      <input type="date" name="BirthDate" class="form-control" id="BirthDate" autocomplete: "off">
      <label for="">HireDate</label>
      <input type="date" name="HireDate" class="form-control" id="HireDate" autocomplete: "off">
      <label for="">ReportsTo</label>
      <input type="text" name="ReportsTo" class="form-control" id="ReportsTo" autocomplete: "off">
      <label for="">Reputation</label>
      <input type="text" name="Reputation" class="form-control" id="Reputation" autocomplete: "off">
      <label for="">Title</label>
      <input type="text" name="Title" class="form-control" id="Title" autocomplete: "off">
      <br>
      <div style="text-align:center;">
      <input type="radio" name="Admin" value="1"> Admin
      <input type="radio" name="Admin" checked="checked" value="0"> Employee
      <br><br>
      <button type="submit" class="buttonLayoutSubmit" name="submit"><small>Submit</small></button>
      </div>

    </div>
  </form>


  <script src="../js/index.js"></script>


	
<?php

}

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