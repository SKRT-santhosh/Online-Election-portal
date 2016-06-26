<!DOCTYPE html>
<html>
    <head>
	<title>Online Election Portal : Voting Portal</title>
	<style>
.error {color: #FF0000;}
</style>
    </head>
<body style="background-color:black;" >
<font color="white">
    <?php
	session_start();
	
	$otp=$_POST['OTP'];
if (isset($_SESSION['username']))
echo "";
else
    die("You must be logged in");

    $valid=$_SESSION['Valid'];
    $username=$_SESSION['username'];
    if ($valid==2)
    die("You have already voted. Please logout");
    else
    {
    $connect = mysql_connect("localhost","root","") or die("Couldn't Connect!!");
    mysql_select_db("phplogin") or die("Couldn't find db");

    $query = mysql_query("SELECT * FROM users WHERE username='$username'");

    while ($row = mysql_fetch_assoc($query))
            {
            $dbotp=$row['OTP'];
            }
    if ($dbotp!=$otp)
    die("The OTP is incorrect. Please go back and try again.");
    $dbCount=0;
	$pdent = $gensec = $smc = $culsecb = $culsecg = $sportssec = "";
	$pdentErr = $genSecErr = $smcErr = $culsecbErr = $culsecgErr = $sportsErr = "";
	if(isset($_POST["pdent"])){
    $pdent=$_POST["pdent"];
	}
	if(isset($_POST["gensec"])){
    $gensec=$_POST["gensec"];
	}
	if(isset($_POST["smc"])){
    $smc=$_POST["smc"];
	}
	if(isset($_POST["culsecb"])){
    $culsecb=$_POST["culsecb"];
	}
	if(isset($_POST["culsecg"])){
    $culsecg=$_POST["culsecg"];
	}
	if(isset($_POST["sportssec"])){
    $sportssec=$_POST["sportssec"];
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["pdent"])) {
			$pdentErr = "Please select a candidate.";
		}
		if (empty($_POST["gensec"])) {
			$genSecErr = "Please select a candidate.";
		}
		if (empty($_POST["smc"])) {
			$smcErr = "Please select a candidate.";
		}
		if (empty($_POST["culsecb"])) {
			$culsecbErr = "Please select a candidate.";
		}
		if (empty($_POST["culsecg"])) {
			$culsecgErr = "Please select a candidate.";
		}
		if (empty($_POST["sportssec"])) {
			$sportsErr = "Please select a candidate.";
		}
		if(!empty($_POST["pdent"]) && !empty($_POST["gensec"]) && !empty($_POST["smc"]) && !empty($_POST["culsecb"]) && !empty($_POST["culsecg"]) && !empty($_POST["sportssec"]))
        $query3=mysql_query("UPDATE users SET Valid='2' where username='$username'");
	 }
	 }
	?>
</font>
<div id="header" style="height:140px;width:100%;margin-bottom:10px;float:left;background:url(http://www.statmethods.net/images/header.jpg)no-repeat;background-size:100%;">

            <h1 style="margin-bottom:0px;text-align:center;margin-top:35px;" ><font size="33" color="white">VOTING PAGE</font></h1>
        </div>
        <br></br>
        <br></br>

<div id="body1" style="position:relative;background-color:#FFFFFF;float:left;margin:left:0px;width:1330px;height:670px;">
<font size="4">
<p><b>Welcome <?=$_SESSION['username'] ?>!</b>

</font>
<br><br>
<br><br>

<div style=" background:url(images/vote.jpg)no-repeat;opacity:0.4;width:100%;height:100px;background-size:40%;margin-top:35px;margin-left:100px;"></div>



<div style="position:absolute;top:10px;margin-left:5px;">
<br><br><a href='logout.php'>Click here</a> to logout</p>
<div style="margin-left:980px">
<font size="6"><b>Time left :
<span id="countdown" class="timer"></span>
<script>
var seconds = 30;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = alert("Time's up!!");
    } else {
        seconds--;
    }
}

var countdownTimer = setInterval('secondPassed()', 1000);

setTimeout(function(){
       window.location='logout.php';
    }, 32000);
</script>
</b>
</font>
</div>


<div style="margin-left:50px;margin-top:10px;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<input name="OTP" value ="<?php echo $otp?>" style="visibility:hidden;">
<div style="float:left;margin-left:20px">

<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>President </h3></td></tr>
<tr><td>
<br>
	<input type="radio" name="pdent" value="Candidate1">Candidate1<br>
	<input type="radio" name="pdent" value="Candidate2">Candidate2<br>
	<input type="radio" name="pdent" value="Candidate3">Candidate3<br
    >
	<span class="error">* <?php echo $pdentErr;?></span>

	<br>
</td></tr>
</table>
</div>

<div style="float:left;margin-left:50px;">
<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>General Secretary </h3></td></tr>
<tr><td>
<br>
<input type="radio" name="gensec" value="Candidate1">Candidate 1<br>
<input type="radio" name="gensec" value="Candidate2">Candidate 2<br>
<input type="radio" name="gensec" value="Candidate3">Candidate 3<br>
<span class="error">* <?php echo $genSecErr;?></span>

<br>
</td></tr>
</table>
</div>

<div style="float:left;margin-left:50px;">
<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>SMC </h3></td></tr>
<tr><td>
<br>
<input type="radio" name="smc" value="Candidate1">Candidate 1<br>
<input type="radio" name="smc" value="Candidate2">Candidate 2<br>
<input type="radio" name="smc" value="Candidate3">Candidate 3<br>
<span class="error">* <?php echo $smcErr;?></span>

<br>
</td></tr>
</table>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<div style="float:left;margin-left:20px">
<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>Cultural Secretary (boys) </h3></td></tr>
<tr><td>
<br>
<input type="radio" name="culsecb" value="Candidate1">Candidate 1<br>
<input type="radio" name="culsecb" value="Candidate2">Candidate 2<br>
<span class="error">* <?php echo $culsecbErr;?></span>

<br>
</td></tr>
</table>
</div>
<div style="float:left;margin-left:50px">
<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>Cultural Secretary (girls) </h3></td></tr>
<tr><td>
<br>
<input type="radio" name="culsecg" value="Candidate1">Candidate 1<br>
<input type="radio" name="culsecg" value="Candidate2">Candidate 2<br>
<span class="error">* <?php echo $culsecgErr;?></span>

<br>
</td></tr>
</table>
</div>


<div style="float:left;margin-left:50px;">
<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
<tr><td height="20px" width="250px"><h3>Sports Secretary </h3></td></tr>
<tr><td>
<br>
<input type="radio" name="sportssec" value="Candidate1">Candidate 1<br>
<input type="radio" name="sportssec" value="Candidate2">Candidate 2<br>
<input type="radio" name="sportssec" value="Candidate3">Candidate 3<br>
<span class="error">* <?php echo $sportsErr;?></span>

<br>
</td></tr>
</table>
</div>

<br><br><br><br><br><br><br><br><br><br><br>
<input type="submit" value="VOTE" style="margin-top:30px;width:200px;height:40px;></input>
</form>
</div>
</div>
</div>
<font color="blue">
<?php

if(empty($_POST["pdent"]) || empty($_POST["gensec"]) || empty($_POST["smc"]) || empty($_POST["culsecb"]) || empty($_POST["culsecg"]) || empty($_POST["sportssec"]))
{
	echo "<script type='text/javascript'>alert('One or more fields are missing!!');</script>";
}
else
{
echo "<script type='text/javascript'>alert('Thanks for voting!!');window.location='logout.php';</script>";
$flag = 0;
$connect = mysql_connect("localhost","root","") or die("Couldn't Connect!!");
mysql_select_db("phplogin") or die("Couldn't find db");
$query = mysql_query("SELECT * FROM president WHERE Name='$pdent'");
$numrows = mysql_num_rows($query);
        while ($row = mysql_fetch_assoc($query))
            {
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
mysql_query("UPDATE president SET Count='$dbCount' WHERE Name='$pdent'");

#mysql_select_db("phplogin", $connect) or die("Couldn't find db");
$query = mysql_query("SELECT * FROM gensec WHERE Name='$gensec'", $connect);
echo "outside while";
        while ($row = mysql_fetch_assoc($query))
            {
            echo "inside while";
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
echo $gensec;
mysql_query("UPDATE gensec SET Count='$dbCount' WHERE Name='$gensec'", $connect);

$query = mysql_query("SELECT * FROM smc WHERE Name='$smc'", $connect);
echo "outside while";
        while ($row = mysql_fetch_assoc($query))
            {
            echo "inside while";
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
mysql_query("UPDATE smc SET Count='$dbCount' WHERE Name='$smc'", $connect);

$query = mysql_query("SELECT * FROM culsecboys WHERE Name='$culsecb'", $connect);
        while ($row = mysql_fetch_assoc($query))
            {
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
mysql_query("UPDATE culsecboys SET Count='$dbCount' WHERE Name='$culsecb'", $connect);

$query = mysql_query("SELECT * FROM culsecgirls WHERE Name='$culsecg'", $connect);
        while ($row = mysql_fetch_assoc($query))
            {
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
mysql_query("UPDATE culsecgirls SET Count='$dbCount' WHERE Name='$culsecg'", $connect);

$query = mysql_query("SELECT * FROM sportssec WHERE Name='$sportssec'", $connect);
        while ($row = mysql_fetch_assoc($query))
            {
            $dbCount=$row['Count'];
            }
$dbCount=$dbCount+1;
mysql_query("UPDATE sportssec SET Count='$dbCount' WHERE Name='$sportssec'", $connect);
}
 ?>
 </font>
</body>
</html>
