<?php

require_once 'getresponse/index.php';

?>


<form action="gr_get_campaignId_by_name.php"  method="post">

  campaignName:<br>
  <input type="text" name="campaignName" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


if (isset($_POST['campaignName'])) {
$campaignName = $_POST['campaignName'];

echo '$'.$campaignName.'CampaignId = "'.$getResponse->getCampaignIdByName($campaignName). '";';


}


