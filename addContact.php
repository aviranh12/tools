<?php

require_once 'getresponse/index.php';

$campain_id = '6EUjw';
?>

check this!!!!

<form action="addContact.php"  method="post">
campain test <?php echo $campain_id; ?><br><br>
  email name:<br>
  <input type="text" name="email" value="<?php  echo $_POST['email'] ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


if (isset($_POST['email'])) {
$email =  $_POST['email'];


var_dump ($getResponse->myAddContactWithCampaignId($campain_id, $email, 0, ''));

}





