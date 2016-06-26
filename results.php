<!DOCTYPE html>
<html>
    <head>
        <title>
         Online Elections Portal : Results Page
         </title>
    </head>

<body>

<div id="sss" style="width:100%;height:600px;background-color:#FFFFFF;float:left;margin:left:0px;">

<div id="header" style="height:100px;width:100%;float:left;background:url(http://www.statmethods.net/images/header.jpg)no-repeat;background-size:100%;">

<h2 style="text-align:center;margin-top:22px;" ><font size="33" color="white">RESULTS</font></h2>
</div>

<div id="body1" style="margin-top:110px;height:100%;width:100%;background:url(http://thefivefortyfive.com/wp-content/uploads/2014/02/first-vote.jpg)no-repeat;">

<?php
session_start();
$winner="";
$connect = mysql_connect("localhost","root","") or die("Couldn't Connect!!");
mysql_select_db("phplogin") or die("Couldn't find db");
$query = mysql_query("SELECT Name FROM president WHERE Count=(SELECT MAX(Count) FROM president)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The President is $winner ";
        echo "<br>";

        }
echo "<br>";

$query = mysql_query("SELECT Name FROM gensec WHERE Count=(SELECT MAX(Count) FROM gensec)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The General Secretary is $winner";
        echo "<br>";
        }
echo "<br>";
$query = mysql_query("SELECT Name FROM smc WHERE Count=(SELECT MAX(Count) FROM smc)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The SMC is $winner ";
        echo "<br>";
        }
 echo "<br>";
$query = mysql_query("SELECT Name FROM cultsecboys WHERE Count=(SELECT MAX(Count) FROM cultsecboys)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The Cultural Secretary(boys) is $winner";
        echo "<br>";
        }
echo "<br>";
$query = mysql_query("SELECT Name FROM cultsecgirls WHERE Count=(SELECT MAX(Count) FROM cultsecgirls)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The Cultural Secretary(girls) is $winner";
        echo "<br>";
        }
echo "<br>";

$query = mysql_query("SELECT Name FROM sportssec WHERE Count=(SELECT MAX(Count) FROM sportssec)");
while ($row = mysql_fetch_assoc($query))
        {
        $winner=$row['Name'];
        echo "The Sports Secretary is $winner";
        echo "<br>";

        }
echo "<br>";

?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>
</body>
</html>
