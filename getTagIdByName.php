<?php

require_once 'getresponse/index.php';

?>
    
    $buy_burning_desireTagId = "aGpE";

<form action="getTagIdByName.php"  method="post">

  tag name:<br>
  <input type="text" name="tagName" value="<?php  echo $_POST['tagName'] ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


if (isset($_POST['tagName'])) {
$tagName =  $_POST['tagName'];

echo '$'.$tagName.'_tag_id = "'.$getResponse->getTagIdByName($tagName). '";';

}


