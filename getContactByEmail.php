<?php

require_once 'getresponse/index.php';

?>


<form action="getContactByEmail.php"  method="post">

  Email:<br>
  <input type="text" name="email" value="<?php  echo $_POST['email'] ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


if (isset($_POST['email'])) {
	$email =  $_POST['email'];
	
	echo $email.'<br/>';
	$res =$getResponse->getContactByEmail($email);
	var_dump($res);
}


