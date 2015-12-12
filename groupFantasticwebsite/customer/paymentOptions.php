<?php 
ob_start();

	include('includes/header.php');

  if (!empty($_POST)) {

    // credit card

    $InvoiceId = 7;

    if(isset($_POST['chname'])) {

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $sql = "INSERT INTO creditcard (CardHolderName, CardNumber, CNN, ExpirationDate, CreditCardType, CustomerId, InvoiceId) VALUES (?,?,?,?,?,?,?)";
      $stmt = $con->prepare($sql);

      $CardHolderName = $_POST["chname"];
      $CardNumber = $_POST["chnumber"];
      $CNN = $_POST["chcnn"];
      $ExpirationDate = $_POST["chdate"];
      $CreditCardType = $_POST["select-choice"];
      $CustomerId = $_SESSION["CustomerId"];

      $stmt->bind_param('ssissii', $CardHolderName, $CardNumber, $CNN, $ExpirationDate, $CreditCardType, $CustomerId, $InvoiceId);
      $stmt->execute();

      header("Location:paymentOptions.php?message=updated");
      exit();
    }

    // google pay

    if(isset($_POST['gchname'])) {

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $sql = "INSERT INTO googlepay (Email, CustomerId) VALUES (?,?)";
      $stmt = $con->prepare($sql);

      $CardHolderName = $_POST["gchname"];
      $CustomerId = $_SESSION["CustomerId"];

      $stmt->bind_param('si', $CardHolderName, $CustomerId);
      $stmt->execute();

      header("Location:paymentOptions.php?message=updated");
      exit();
    }

    // apple pay

    if(isset($_POST['achname'])) {

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $sql = "INSERT INTO applepay ( Email, CustomerId ) VALUES (?,?)";
      $stmt = $con->prepare($sql);

      $CardHolderName = $_POST["gchname"];
      $CustomerId = $_SESSION["CustomerId"];

      $stmt->bind_param('si', $CardHolderName, $CustomerId);
      $stmt->execute();

      header("Location:paymentOptions.php?message=updated");
      exit();
    }

    // paypal

    if(isset($_POST['pchname'])) {

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      $sql = "INSERT INTO paypal ( Email, CustomerId, InvoiceId ) VALUES (?,?,?)";
      $stmt = $con->prepare($sql);

      $CardHolderName = $_POST["pchname"];
      $CustomerId = $_SESSION["CustomerId"];

      $stmt->bind_param('sii', $CardHolderName, $CustomerId, $InvoiceId);
      $stmt->execute();

      header("Location:paymentOptions.php?message=updated");
      exit();
    }

  } else {

	?>

<h1 style="text-align: center;">Your Payment Options</h1>

<h5 id="alertLine">Info updated</h5>

 <div id ="paymentType">
<h2 style="text-align:left;">Credit Card</h2>

	<form action="paymentOptions.php" method="post">
 
   <div>
    <label for="select-choice">Supported Credit Cards:</label>
    <select name="select-choice" id="select-choice">
      <option value="Choice 1">Visa</option>
      <option value="Choice 2">MasterCard</option>
      <option value="Choice 3">Amex</option>
    </select>
  </div>
    <label for="chname">Card Holder Name:</label>
    <input type="text" name="chname" id="chname" placeholder="Card Holder Name" />
    <br>
    <label for="chnumber">Card Number:</label>
    <input type="text" name="chnumber" id="chnumber" placeholder="Card Number" />
    <br>
    <label for="chcnn">CVC:</label>
    <input type="text" name="chcnn" id="chcnn" placeholder="CVC Number" />
    <br>
    <label for="chdate" >Expiration Date:</label>
    <input type="date" name="chdate" id="chdate" style="padding:0px;"  placeholder="" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set CreditCard" />
  </div>
</form>  


 <div id ="paymentType">
 <h2 style="text-align:left;">Google Pay</h2>
<form action="paymentOptions.php" method = "post">
  <div>
    <label for="gchname">Google Pay Email:</label>
    <input type="text" name="gchname" id="gchname" placeholder="Google Pay" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Google Pay" />
  </div>
</form>  
</div>

 <div id ="paymentType">
 <h2 style="text-align:left;">Apple Pay</h2>
<form action="paymentOptions.php" method = "post">
  <div>
    <label for="achname">Apple Pay Email:</label>
    <input type="text" name="achname" id="achname" placeholder="Apple Pay" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Apple Pay" />
  </div>
</form>  
</div>

 <div id ="paymentType">
 <h2 style="text-align:left;">Pay Pal</h2>
<form action="paymentOptions.php" method = "post">
  <div>
    <label for="pchname">Paypal Email:</label>
    <input type="text" name="pchname" id="pchname" placeholder="PayPal" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Paypal" />
  </div>
</form>  
</div>

<script src="../js/index.js"></script>


<?php

}

if($_GET['message'] == "updated") {
    echo "<script> alertLine(); </script>";
}

	include('../globalIncludes/footer.php');
	?>