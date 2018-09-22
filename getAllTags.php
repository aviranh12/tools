<?php

require_once 'getresponse/index.php';

?>
    



<?php

$getResponse = new GetResponse('aaeb380d727149b3946321023566c91f');


$allTags = $getResponse->getTags();


echo '<table>';

foreach ($allTags as $obj) { 
    echo '<tr>';
    
    echo '<td>'.$obj->name."</td>   <td>". $obj->tagId.'</td>';
    
    echo '</tr>';
}


echo '</table>';