<?php
//header("Content-Type: text/html; charset=UTF-8LE");

date_default_timezone_set("Asia/Jerusalem");

$offer = $_GET['offer'];

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

$email = mysqli_real_escape_string($conn, $_GET['email']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$offer = mysqli_real_escape_string($conn, $offer);

$sqlOffer = sprintf("SELECT time_in_secends, url FROM offers WHERE offer_name = '%s'",
$offer);

$resultOffer = $conn->query($sqlOffer);

if ($resultOffer->num_rows == 0) {
    echo "offer not exists in!!!";
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



echo '<html>
<body>
<form id="myForm" action="'.$offerUrl.'" method="post">';

    foreach ($_GET as $a => $b) {
          echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
    echo '<input type="hidden" name="diff" value="'.$diff.'">';

?>
</form>
<script type="text/javascript">
   // document.getElementById('myForm').submit();
</script>
</body>
</html>


