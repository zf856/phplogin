<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['name'])){
    echo $_SESSION['name'] . "عزیز خوش آمدید";
}
else{
    header("location:login.php?login=error1");
}


?>
 |
<a href="expire.php" >
   خروج
</a>
</body>
</html>