<?php
$username=$_POST['username'];
$opassword=$_POST['oldpassword'];
$npassword=$_POST['newpassword'];
$cpassword=$_POST['confirmpassword'];

if($username&&$opassword&&$npassword&&$cpassword)
{
	$connect = mysql_connect("localhost","root","") or die("Couldn't Connect!!");
    mysql_select_db("phplogin") or die("Couldn't find db");

    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $numrows = mysql_num_rows($query);

    if ($numrows!=0)
    {
		while ($row = mysql_fetch_assoc($query))
        {
            $dbusername=$row['username'];
            $dbpassword=$row['password'];
        }
		
        if ($username==$dbusername&&$opassword==$dbpassword)
		{
			if($npassword == $cpassword)
			{
				mysql_query("UPDATE users SET password='$npassword' WHERE username='$username'");
				echo "Password changed succesfully<br>Click <a href='form.php'> here </a> to return";
			}
			else
			{
				die("Passwords don't match");
			}
		}
		else
		{
			die("incorrect password");
		}
	}
	else
	{
		die("The user doesn't exist");
	}
}
else
{
	die("Please enter all the fields!!");
}
?>