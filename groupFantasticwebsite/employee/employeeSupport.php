<?php 
ob_start();
	include('includes/header.php');
	?>

<h5 id="alertLine">Feedback sent!</h5>

<form id='feedback' name='feedback' method='post' action=''>

  <?php

        $sql = "SELECT CustomerId FROM customer ORDER BY CustomerId ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($CustomerId);

$menu="
  <p><label>Select Customer ID</label></p>
    <select name='filter' id='filter'>";

// Add options to the drop down
$menu .= "<option>--</option>";

while($row = $stmt->fetch())
{
  $menu .='<option value="'. $CustomerId .'">' . $CustomerId . '</option>';
}

// Close menu form
$menu .= "</select>";

// Output it
echo $menu;

?>

  <br>
  <br>
  <div>
    <label for="Employee">Customer Contact</label>
    <br>
    <textarea cols="80" rows="16" name="textarea" id="textarea"></textarea>
  </div>
  <br>
  <div>
    <input type="submit" value="Submit" />
  </div>
 
</form>

<?php

if (!empty($_POST)) {

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $sql = "INSERT INTO contact (Ccustomerid, Cemployeeid, Contact) VALUES (?,?,?)";
  $stmt = $con->prepare($sql);

    $Ccustomerid = $_POST["filter"];
    $Cemployeeid = $_SESSION["EmployeeId"];
    $Contact = $_POST["textarea"];

    $stmt->bind_param('iis', $Ccustomerid, $Cemployeeid, $Contact);
    $stmt->execute();

    header("Location:employeeSupport.php?message=sent");
    exit();

  }


?>


      <div class = "customerMessages">
        <h1>Your messages from the customers</h1>
    <table class="rwd-table">
      <tr>
        <th>Customer</th>
        <th>Message</th>
      </tr>

<?php

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "SELECT Fcustomerid, feedback FROM feedback WHERE Femployeeid = ? ORDER BY feedbackid ASC";
            $stmt = $con->prepare($sql);

            $Femployeeid = $_SESSION['EmployeeId'];
            $stmt->bind_param('i',$Femployeeid);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($Fcustomerid,$feedback);

            while($stmt->fetch()){

      ?>

      <tr>
        <td data-th="customerSent"><?php echo $Fcustomerid; ?></td>
        <td data-th="employeeMessage"><?php echo $feedback; ?></td>

      </tr>

<?php

}

?>

</table>

</div>

<script src="../js/index.js"></script>

<?php

	include('../globalIncludes/footer.php');
	?>