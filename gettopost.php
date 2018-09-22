<html>
<body>

<?php

if (!isset($_GET['url'])) {
die();
}
echo '<form id="myForm" action="'.$_GET['url'].'" method="post">';

    foreach ($_GET as $a => $b) {
	    if ($a != 'url') {
	        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
	    }
    }
   
?>
</form>
<script type="text/javascript">
   
   document.getElementById('myForm').submit();
</script>
</body>
</html>