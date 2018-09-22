<?php
require_once 'getresponse/index.php';

        


$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');



//$res = $getResponse-> getContacts( array(['query'=>$arr]));
//$res = $getResponse-> getContactById( 'G14RMv');




//$res = $getResponse-> myAddContact('dating_tips3', "aviranh12+NoCampaignId@gmail.com", 3);
$dating_tips3Id = '46CpZ';
//$res = $getResponse-> myAddContactWithCampaignId($dating_tips3Id, "aviranh12+CampaignId@gmail.com", null);




//$res = $getResponse-> getCustomFields( array(['fields'=>'name']));
//$res =     $getResponse-> getCustomFieldIdByName('action');
//$res = $getResponse-> getContactByEmail('aviranh12+')[0];
//$contactId = $res-> contactId;


//$res = $getResponse->addTagToContactId($contactId, 'buy' );
//$res = $getResponse->addTagToContactEmail('aviranh12+', 'buy' );

//$res = $getResponse->addTagToContactEmail('aviranh12+CampaignId@gmail.com', 'no_buy' );


//$res = $getResponse->addTagToContactEmailByTagId('aviranh12+CampaignId@gmail.com', $buy_dark_triad_formulaId  );


//$res = $getResponse->deleteTag($no_buyTagId);


$email = 'aviranh12+test2@gmail.com';
$itemNumber = 'burning_desire';



$dating_tips3CampaignId = '46CpZ';
$buy_burning_desireCampaignId = "4QvxO";
$buy_dark_triad_formulaCampaignId = "4Qh71";

$buy_dark_triad_formulaTagId = "aGTw";
$buy_burning_desireTagId = "aGpE";



$courseNameToCampaignId['burning_desire'] = $buy_burning_desireCampaignId;
$courseNameToCampaignId['dark_triad_formula'] = $buy_dark_triad_formulaCampaignId;

$courseNameToTagId['burning_desire'] = $buy_burning_desireTagId;
$courseNameToTagId['dark_triad_formula'] = $buy_dark_triad_formulaTagId;



$contact =$getResponse->getContactByEmail($email);



  
//$coursesArry = array_filter(explode(',', $itemNumber));


//foreach ($coursesArry as $course_name) {
$course_name = $itemNumber;
	
	if ($contact) {
		$contactId = $contact-> contactId;
		$res = $getResponse->addTagToContactIdByTagId($contactId, $courseNameToTagId[$course_name] );
		echo 'inside if';

		
	} else {
			echo 'inside else';

		$res = $getResponse-> myAddContactWithCampaignId($courseNameToCampaignId[$course_name], $email, null);
	
	}

//}	        		
	        			
       			
//var_dump($param);
var_dump($res);

return;

