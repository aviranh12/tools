<?php
//header("Content-Type: text/html; charset=UTF-8LE");

date_default_timezone_set("Asia/Jerusalem");

$offer = $_GET['offer'];




$offerToUrl=array("burning-desire7"=>"http://vast.space/sl/burning-desire/index.php",
                  "testoffer2"=>"http://localhost/counter_site/files/startfile.php");

$offerToTimeInSecends=array("burning-desire7"=>60*60*2,
                           "testoffer2"=>2222);

if (!array_key_exists($offer,$offerToUrl) || !array_key_exists($offer,$offerToTimeInSecends)) {
  echo "offer not exists!";
  return;
}

$timeInSecends = $offerToTimeInSecends[$offer];

//$stopwatchString = "[stopwatch]";

$servername = "localhost";
$username = "aviranh1_l_o_i_s";
$password = "Ec8wnwfDIm2WvUzh%62^*IP";
$dbname = "aviranh1_limitedoffer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//var_dump( $conn);

$email = mysqli_real_escape_string($conn, $_GET['email']);
//echo $email.'<br>';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = sprintf("SELECT time FROM enters WHERE email = '%s' and offer = '%s'",
      mysqli_real_escape_string($conn, $email), mysqli_real_escape_string($conn, $offer));


//echo $sql;
$result = $conn->query($sql);

//echo '<br><br>result<br>';

//var_dump($result);

$timeOfUser;

$timeNow  = new DateTime();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //var_dump($row);
        $timeOfUser = new DateTime($row["time"]);
    }
} else {
    $timeOfUser = new DateTime();
  //echo "aaaaaa";
  $sql = sprintf("INSERT INTO enters (email, offer, time) VALUES ('%s', '%s', '%s')",
      mysqli_real_escape_string($conn, $email), mysqli_real_escape_string($conn, $offer), $timeOfUser->format('Y-m-d H:i:s'));



//  echo $sql;
  //echo '<br><br>sql<br>';

//echo
$conn->query($sql);
}
$conn->close();


/*echo '<br><br>timeNow<br>';
  var_dump ($timeNow );

echo '<br><br>';
echo '<br>timeOfUser<br>';

var_dump($timeOfUser);
echo '<br><br>';
*/

   $timeExpire =  $timeOfUser->add(new DateInterval('PT'.$timeInSecends.'S'));

  $diff = $timeExpire->getTimestamp() - $timeNow->getTimestamp();


//echo $offerToUrl[$offer];

echo '<html>
<body>
<form id="myForm" action="'.$offerToUrl[$offer].'" method="post">';

    foreach ($_GET as $a => $b) {
          echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
    echo '<input type="hidden" name="diff" value="'.$diff.'">';

?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
</body>
</html>


