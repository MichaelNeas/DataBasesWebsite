<?php 
	include('includes/header.php');
	?>

<h1 style="text-align: center;">Your Payment Options</h1>
 <div id ="paymentType">
<h2 style="text-align:left;">Credit Card</h2>
	<form action="setPayments">
 
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
<form action="setGPay">
  <div>
    <label for="chname">Google Pay Email:</label>
    <input type="text" name="chname" id="chname" placeholder="Google Pay" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Google Pay" />
  </div>
</form>  
</div>

 <div id ="paymentType">
<form action="setAPay">
  <div>
    <label for="chname">Apple Pay Email:</label>
    <input type="text" name="chname" id="chname" placeholder="Apple Pay" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Apple Pay" />
  </div>
</form>  
</div>

 <div id ="paymentType">
<form action="setPPay">
  <div>
    <label for="chname">Paypal Email:</label>
    <input type="text" name="chname" id="chname" placeholder="PayPal" />
    <br>
    <label for="checkbox">Preferred Payment Type?</label>
    <input type="checkbox" name="checkbox" id="checkbox" />
    <br>
    <input type="submit" value="Set Paypal" />
  </div>
</form>  
</div>


<?php
	include('../globalIncludes/footer.php');
	?>