<?php 
	include('includes/header.php');
	?>

<form id="inputfield" action="#" method="post">
    <select name="select-choice" id="select-choice">
      <option value="Choice 1">Choose an employee representative</option>
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
        <h1>Your messages from the staff!</h1>
    <table class="rwd-table">
      <tr>
        <th>Staff Member</th>
        <th>Message</th>
      </tr>
      <tr>
        <td data-th="employeeSent">Chinook</td>
        <td data-th="employeeMessage">Your songs are ready.</td>

      </tr>

    </table>

  </div>

<?php
	include('../globalIncludes/footer.php');
	?>