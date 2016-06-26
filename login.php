<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

if($username&&$password)
{
    $connect = mysql_connect("localhost","root","") or die("Couldn't Connect!!");
    mysql_select_db("phplogin") or die("Couldn't find db");

    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $numrows = mysql_num_rows($query);
    $query1 = mysql_query("SELECT * FROM users");
    $numrows1 = mysql_num_rows($query1);

    if ($numrows!=0)
        {
        while ($row = mysql_fetch_assoc($query))
            {
            $dbusername=$row['username'];
            $dbpassword=$row['password'];
            $dbvalid=$row['Valid'];
            //$dbotp=$row['OTP'];
            }
        if ($username==$dbusername&&$password==$dbpassword)
            {
            $_SESSION['username'] = $dbusername;
            $_SESSION['Valid'] = $dbvalid;
            #echo "You're In.Click <a href='member.php'>here</a> to enter the member page";

            if (!$_SESSION['username'])
            die("you must be logged in");
            if ($dbvalid==0)
            {
            $otp=rand();
            $query2=mysql_query("UPDATE users SET OTP='$otp' where username='$dbusername'");
            $query3=mysql_query("UPDATE users SET Valid='1' where username='$dbusername'");
            if(mail('f2012947@hyderabad.bits-pilani.ac.in','OTP','Your otp is $otp','From: pt111094@gmail.com'))
            echo "Mail Sent.";
            else
            echo 'Error while sending mail.';

            }
            }
        else
            {
            die( "incorrect password");
            }
        }
    else
        die("That user doesn't exist");
}
else
    die("Please enter the username and the password");
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Online Election Portal : View Candidates</title>

    </head>
<body style="background-color:black;" >
<?php
$flag=0;
$otp=rand();
$to="pt111094@gmail.com";
$subject="OTP";
$message="$otp";
$header="";
//if ($dbvalid==0)

 ?>


<div id="sss" style="width:2020px;height:600px;background-color:black;float:left;margin:left:0px;">

<div id="header" style="height:140px;width:2020px;float:left;background:url(http://www.statmethods.net/images/header.jpg)no-repeat;background-size:100%;">

            <h1 style="margin-bottom:0px;text-align:center;margin-top:35px;" ><font size="33" color="white">VIEW CANDIDATES</font></h1>
        </div>
        <br></br>
        <br></br>

<div id="body1" style="position:relative;background-color:#FFFFFF;float:left;margin:left:0px;width:2020px;height:820px;background-image:url(http://www.noqta.it/dromoscopio/img/pattern_23.gif);margin-top:10px;">
<font size="4" color="white">
<p><b>Welcome <?=$_SESSION['username'] ?>!</b>
<br>

</font>

<div style=" background-image:url(http://philboyd74.files.wordpress.com/2013/10/silhouette-of-business-peoplemen-vector.png);opacity:0.6;width:2020px;height:723px;background-size:100%;margin-top:45px;"></div>

<div style="position:absolute;top:10px;margin-left:5px;margin-top:10px">
<font size="4" color="white">
<br>
<a href='logout.php'>Click here</a> to logout</p>
<table border="1" style="border-collapse:collapse;margin-top:10px;">
    <tr>
        <td width="400px" height="400px">
            <div style="width:400px;height:400px;overflow:scroll;" >
        <h3>President:</h3>
        <p>The President of the student union is the person who is responsible for all the actions of the Student Union.
            He oversees the activities of the many technical departments of the College. The President represents the students on various committees and conferences.
            He acts as the point of contact between the students and the college. </p>
    <ol>
        <li>Candidate #1:</li>
        <li>Candidate #2:</li>
        <li>Candidate #3:</li>
    </ol>
	<br>
	<font color="white">
	<a href="PdentCredentials.php">View Credentials</a></font>
    </div>
        </td>
        <td width="400px">
            <div style="width:400px;height:400px;overflow:scroll;" >
            <h3>General Secretary</h3>
            <p> The General Secretary of the student union caries out the secretarial activities of all the clubs and societies of the college.
                He also assists the president in the management of the financial activities of the Student Union.
            </p>
            <ol>
                <li>Candidate #1:</li>
                <li>Candidate #2:</li>
                <li>Candidate #3:</li>
            </ol>
			<br>
			<a href="GenSecCredentials.php">View Credentials</a>
            </div>
        </td>
        <td width="400px">
            <div style="width:400px;height:400px;overflow:scroll;" >
            <h3>Cultural Secretary(boys)</h3>
            <ol>
            <li>Candidate #1:</li>
            <li>Candidate #2:</li>
            </ol>
			<br>
			<a href="CulSecCredentials.php#culsecb">View Credentials</a>
            <h3>Cultural Secretary(girls)</h3>
            <ol>
            <li>Candidate #1:</li>
            <li>Candidate #2:</li>
            </ol>
			<br>
			<a href="CulSecCredentials.php#culsecg">View Credentials</a>
            </div>
        </td>
        <td width="400px">
            <div style="width:400px;height:400px;overflow:scroll;" >
            <h3>SMC</h3>
            <ol>
                <li>Candidate #1:</li>
                <li>Candidate #2:</li>
                <li>Candidate #3:</li>
            </ol>
			<br>
			<a href="SMCCredentials.php">View Credentials</a>
            </div>
        </td>
        <td>
            <div style="width:400px;height:400px;overflow:scroll;" >
            <h3>Sports Sec</h3>
            <ol>
                <li>Candidate #1:</li>
                <li>Candidate #2:</li>
                <li>Candidate #3:</li>
            </ol>
			<br>
			<a href="SportsSecCredentials.php">View Credentials</a>
            </div>
        </td>
    </tr>
</table>

<font color="#FFFFFF">
<br></br>
<form method="post" action="Voting.php" >
    <div style="margin-left:920px;">
Insert OTP: <input type="password" name="OTP"><br>
<input type="submit"  value="VOTE" style="margin-left:60px;margin-top:20px;width:100px;height:40px;" ></input>
</div>
</form>
</font>
</font>
</div>
</div>

</div>
</body>
</html>
