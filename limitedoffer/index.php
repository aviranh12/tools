<?php
//header("Content-Type: text/html; charset=UTF-8LE");

date_default_timezone_set("Asia/Jerusalem");

if ($_GET['offer']) {		
	echo '<html>
	<body>
	<form id="myForm" action="index.php" method="post">';
		foreach ($_GET as $a => $b) {
			  echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
		}
	echo '</form>
	<script type="text/javascript">
		document.getElementById("myForm").submit();
	</script>
	</body>
	</html>';
	exit();
}

$cookie_name_offer = 'offer';
$cookie_name_email = 'email';
    
if ($_POST) {
    $offer = $_POST['offer'];
    $email = $_POST['email'];
   if (isset($offer)) {
    	$offer = str_replace(' ', '+', $offer);
    	setcookie($cookie_name_offer, $offer , 2147483647, "/"); // 86400 = 1 day
    }
    
    if (isset($email)) {
    	$email = str_replace(' ', '+', $email);
    	setcookie($cookie_name_email, $email , 2147483647, "/"); // 86400 = 1 day
    }
} else {
    if(isset($_COOKIE[$cookie_name_offer] )) {
       $offer = $_COOKIE[$cookie_name_offer];
    }
    if(isset($_COOKIE[$cookie_name_email] )) {
       $email = $_COOKIE[$cookie_name_email];
    }
}

if (!$offer) {
  echo "offer not exists!";
  return;
}

$servername = "localhost";
$username = "aviranh1_l_o_i_s";
$password = "Ec8wnwfDIm2WvUzh%62^*IP";
$dbname = "aviranh1_limitedoffer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$email = mysqli_real_escape_string($conn, $email);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$offer = mysqli_real_escape_string($conn, $offer);

$sqlOffer = sprintf("SELECT time_in_secends, url FROM offers WHERE offer_name = '%s'",
$offer);

$resultOffer = $conn->query($sqlOffer);

if ($resultOffer->num_rows == 0) {
    echo "offer not exists!!!";
    return;
}

$rowOffer = $resultOffer->fetch_assoc();

$timeInSecends = $rowOffer["time_in_secends"];
$offerUrl = $rowOffer["url"];
 
$sql = sprintf("SELECT time FROM enters WHERE email = '%s' and offer = '%s'",
      $email, $offer);

$result = $conn->query($sql);

$timeOfUser;

$timeNow  = new DateTime();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $timeOfUser = new DateTime($row["time"]);
    }
} else {
    $timeOfUser = new DateTime();
    $sql = sprintf("INSERT INTO enters (email, offer, time) VALUES ('%s', '%s', '%s')",
      mysqli_real_escape_string($conn, $email), mysqli_real_escape_string($conn, $offer), $timeOfUser->format('Y-m-d H:i:s'));

	$conn->query($sql);
}
$conn->close();


$timeExpire =  $timeOfUser->add(new DateInterval('PT'.$timeInSecends.'S'));

$diff = $timeExpire->getTimestamp() - $timeNow->getTimestamp();

?>

<html>
<head>
    <title>הצעה מוגבלת בזמן</title>
    <meta http-equiv="Content-Type" content="text/html;">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="countdown/countdown.js"></script>
</head>

<body dir="rtl">
    <div class="box">
		<header class='topBar'>
			<center>
				<?php
					if ($diff > 0) {
						?>
						  ההצעה הזו מסתיימת בעוד...

			<script type="application/javascript">
	   
		
	  
			var myCountdownTest = new Countdown({
					  time: '<?php echo $diff; ?>',
					  
					  width : 300,
					   height  : 60,
		   
					  onComplete : function(){window.location = window.location.href.split("?")[0]; },
					  rangeHi:"day",
				
					  style:"flip"
					  });
			</script>
		
			<?php
					}   else {
								 echo 'ההצעה נגמרה...';
					}
				?>
			  
		</center>
    
   
		</header>
    <?php
        if ($diff > 0) {
    ?>
    
    <iframe src="<?php 
    echo $offerUrl; 
      echo "?";
      foreach ($_POST as $a => $b) {
              echo htmlentities($a).'='.htmlentities($b).'&';
        }
    ?>" class='frame' frameborder="0" scrolling="yes" width='100%' height='100%'></iframe>
     <?php
        }
    ?>

  </div>
</body>
</html>