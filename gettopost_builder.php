<!DOCTYPE html>
<html>
<body>

<form action="" method="post">
  url<br>
  <input type="text" name="url" value="<?php echo $_POST["url"]; ?>" size="90">
  <br>
  
  
  par1Name<br>
  <input type="text" name="par1Name" value="<?php echo $_POST["par1Name"]; ?>">
  <br><br>  
    par1Value<br>
  <input type="text" name="par1Value" value="<?php echo $_POST["par1Value"]; ?>">
  <br><br><br><br>
  
  
 par2Name<br>
  <input type="text" name="par2Name" value="<?php echo $_POST["par2Name"]; ?>">
  <br><br>  
    par2Value<br>
  <input type="text" name="par2Value" value="<?php echo $_POST["par2Value"]; ?>">
  <br><br><br><br>



 par3Name<br>
  <input type="text" name="par3Name" value="<?php echo $_POST["par3Name"]; ?>">
  <br><br>  
    par3Value<br>
  <input type="text" name="par3Value" value="<?php echo $_POST["par3Value"]; ?>">
  <br><br>


  <input type="submit" value="Submit">
</form> 

<?php

if (isset($_POST['url'])) {

foreach ($_POST as $a => $b) {
	   
	        echo 'name="'.htmlentities($a).'" value="'.htmlentities($b).'"<br/>';
	  
    }
    
    echo '<br/><br/>';
    
    
    $theUrl = 'http://aviranhayun.com/tools/gettopost.php?url='. urlencode($_POST["url"]);
    
     
    
    if ($_POST['par1Name']) {
    $theUrl.= '&'.$_POST['par1Name'].'='.$_POST['par1Value'];
    
    }
    
     if ($_POST['par2Name']) {
    $theUrl.= '&'.$_POST['par2Name'].'='.$_POST['par2Value'];
    
    }


     if ($_POST['par3Name']) {
    $theUrl.= '&'.$_POST['par3Name'].'='.$_POST['par3Value'];
    
    }
       if (strlen($theUrl) > 300) {
         
   	 echo  '<div style="color: red;" > '  .  strlen($theUrl).   ' chars. max chars in get getresponse campaigns_predefined_variables . max is 300</div><br/>' ;
    }

    echo  $theUrl;
    
    
    echo  '<br/><br/>'.  strlen($theUrl).' chars. max is 2000' ;
    

}
?>

</body>
</html>


