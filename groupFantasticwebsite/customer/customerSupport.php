<?php 

ob_start();

	include('includes/header.php');
	?>

<h5 id="alertLine">Feedback sent!</h5>

<form id='feedback' name='feedback' method='post' action=''>

  <?php

        $sql = "SELECT EmployeeId FROM employee ORDER BY EmployeeId ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($EmployeeId);

$menu="
  <p><label>Select Employee ID</label></p>
    <select name='filter' id='filter'>";

// Add options to the drop down
$menu .= "<option>--</option>";

while($row = $stmt->fetch())
{
  $menu .='<option value="'. $EmployeeId .'">' . $EmployeeId . '</option>';
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
    <textarea cols="80" rows="16" name="textarea" required id="textarea"></textarea>
  </div>
  <br>
  <div>
    <input type="submit" value="Submit" />
  </div>
 
</form> 

<?php

if (!empty($_POST)) {

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $sql = "INSERT INTO feedback (feedback, Fcustomerid, Femployeeid) VALUES (?,?,?)";
  $stmt = $con->prepare($sql);

    $feedback = $_POST["textarea"];
    $Fcustomerid = $_SESSION["CustomerId"];
    $Femployeeid = $_POST["filter"];

    $stmt->bind_param('sii', $feedback, $Fcustomerid, $Femployeeid);
    $stmt->execute();

    header("Location:customerSupport.php?message=sent");
    exit();

  }


?>

      <div class = "customerMessages">
        <h1>Your messages from the staff!</h1>
    <table class="rwd-table">
      <tr>
        <th>Staff Member</th>
        <th>Message</th>
      </tr>

      <?php

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "SELECT Cemployeeid, Contact FROM contact WHERE Ccustomerid = ? ORDER BY contactid ASC";
            $stmt = $con->prepare($sql);

            $Ccustomerid = $_SESSION['CustomerId'];
            $stmt->bind_param('i',$Ccustomerid);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($Cemployeeid,$Contact);

            while($stmt->fetch()){

      ?>

      <tr>

        <td data-th="employeeSent"><?php echo $Cemployeeid; ?></td>
        <td data-th="employeeMessage"><?php echo $Contact; ?></td>

      </tr>

<?php

}

?>

</table>

</div>

<script src="../js/index.js"></script>

<?php

if($_GET['message'] == "sent") {
    echo "<script> alertLine(); </script>";
}

	include('../globalIncludes/footer.php');

	?>