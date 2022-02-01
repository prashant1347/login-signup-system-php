<?php
session_Start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header('location:_login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <a href="_logout.php">logout</a>
    
</body>
</html>