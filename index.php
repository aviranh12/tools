<?php

foreach (glob("*.*") as $filename) {
	if ('index.php' != $filename) {
		echo '<a href="'.$filename.'">'.$filename.'</a><br />';
	}
}
