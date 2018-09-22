
<form action="urlencode.php"  method="post">

  Url:<br>
  <input type="text" name="url" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php


if (isset($_POST['url'])) {
echo $_POST['url'].'<br/>';
echo urlencode($_POST['url']);

}

?>

