<?php 
	include('includes/header.php');
	?>

<form id="inputfield" action="#" method="post">
    <select name="select-choice" id="select-choice">
      <option value="Choice 1">Choose customer to send a message to</option>
    </select>
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


      <div class = "customerMessages">
        <h1>Your messages from the customers</h1>
    <table class="rwd-table">
      <tr>
        <th>Customer</th>
        <th>Message</th>
      </tr>
      <tr>
        <td data-th="customerSent">Chinook Customer</td>
        <td data-th="employeeMessage">Help Me.</td>

      </tr>

    </table>

  </div>

<?php
	include('../globalIncludes/footer.php');
	?>