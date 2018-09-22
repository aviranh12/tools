<?php

require_once 'getresponse/index.php';

?>


<form action="addTagBuy_burning_desireEmail.php"  method="post">
Buy_burning_desire aGpE<br><br>
  email name:<br>
  <input type="text" name="email" value="<?php  echo $_POST['email'] ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


if (isset($_POST['email'])) {
$email =  $_POST['email'];

//var_dump ($getResponse->addTagToContactEmailByTagId($email, 'aGpE'));


var_dump ($getResponse->myAddContactWithCampaignId('6EUqL', $email, 0, 'aGpE'));




}

