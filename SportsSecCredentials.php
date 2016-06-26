<!DOCTYPE html>
<html>
    <head>
	<title>View Credentials : Sports Secretary</title>
    </head>
<body style="background-color:black;" >
<?php
	session_start();
	$username = $_SESSION['username'];
if (!isset($_SESSION['username']))
    die("you must be logged in");
	$_SESSION['username'] = $username;
	?>

<div id="header" style="height:140px;width:100%;float:left;background:url(http://www.statmethods.net/images/header.jpg)no-repeat;background-size:100%;">

            <h1 style="margin-bottom:0px;text-align:center;margin-top:35px;" ><font size="33" color="white">VIEW CREDENTIALS</font></h1>
        </div>
        <br></br>
        <br></br>

<div id="body1" style="position:relative;background-color:#FFFFFF;float:left;margin:left:0px;margin-top:10px;width:100%;height:1200px;background-image:url(http://www.noqta.it/dromoscopio/img/pattern_23.gif);">
<font size="4" color="white">
<p><b>Welcome <?=$_SESSION['username'] ?>!</b>
<br>

<br><br><br><br><br><br><br><br><br><br>
<div style="margin-top:0px;background:url(http://philboyd74.files.wordpress.com/2013/10/silhouette-of-business-peoplemen-vector.png)no-repeat;opacity:0.3;width:100%;height:900px;background-size:100%;margin-top:45px;"></div>

<div style="position:absolute;top:10px;margin-left:5px;">
<br><br>
<a href='logout.php'>Click here</a> to logout</p>
<br>
<ol>
<li><a href="PdentCredentials.php">President</a></li>
<li><a href="GenSecCredentials.php">Genereal Secretary</a></li>
<li><a href="CulSecCredentials.php">Cultural Secretary</a></li>
<li><a href="SMCCredentials.php">SMC</a></li>
<li><a href="SportsSecCredentials.php">Sports Secretary</a></li>
</ol>
</font>
<font size="5" color="white">
<h3>Sports Secretary:</h3>
	<table border="2" style="border-collapse:collapse;margin-top:10px;margin-left:20px">
		<tr height="250px">
			<td width="40px">1.</td>
			<td width="160px">Candidate #1</td>
			<td width="800px" >
				<ol>
				<li>Credential 1</li>
				<li>Credential 2</li>
				</ol>
			</td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Candidate #2</td>
			<td width="400px" height="250px">
				<ol>
				<li>Credential 1</li>
				<li>Credential 2</li>
				</ol>
			</td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Candidate #3</td>
			<td width="400px" height="250px">
				<ol>
				<li>Credential 1</li>
				<li>Credential 2</li>
				</ol>
			</td>
		</tr>
	</table>
	<form action = "login.php">
<font color="#FFFFFF"><input type="submit" value="Back to view candidates" style="margin-top:30px;width:200px;height:40px;" ></input></font>
</font>
</form
</div>
</div>
</body>
</html>
