
<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("http://wesayjustvote.files.wordpress.com/2012/02/blank-writing-board-thank-u.png");
    background-repeat: no-repeat;
}
</style>
</head>

<body>
<?php
session_start();

session_destroy();

echo "You've been logged out. Click <a href='form.php'> here </a> to return"
?>
</body>
</html>