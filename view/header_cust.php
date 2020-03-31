<!DOCTYPE html>
<html lang="en">
<head>
<title>Zippy Used Autos</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="view/main.css">
</head>
<body>
  <?php
 if (isset($_SESSION['firstname'] )) {
    $sessionfirstname = $_SESSION['firstname'];
     echo "<div id='Register' >Welcome " . $_SESSION['firstname'] . "! "; ?>
    <a style="" href=index.php?action=logout>Logout</a></div>
<?php }
else { ?>
    <div id="Register">
    <a href=index.php?action=register>Register</a></div>
<?php }  ?>
  <header>
    <h1>Zippy Used Autos</h1>
 </header>
