<?php
require_once "pdo.php";

session_start();

if ( ! isset($_SESSION['name']) ) {
  die('Not logged in');
}
// If the user requested logout go back to index.php

if ( isset($_POST['logout']) ) {
session_start();
session_destroy();
header('Location: index.php');  }
  
  
if ( isset($_POST['make']) && isset($_POST['year']) 
     && isset($_POST['mileage'])) {
     if ( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year']) )  { 
     
$_SESSION['e1'] = "Mileage and year must be numeric";
header("Location: add.php");
return;
  
  }
else if  (strlen($_POST['make']) < 1) {

	$_SESSION['e2'] = "Make is required";
header("Location: add.php");
return; 
}
  else {
    $sql = "INSERT INTO autos (make, year, mileage) 
              VALUES (:mk, :yr, :mi)";
              
    $stmt = $pdo->prepare('INSERT INTO autos
  (make, year, mileage) VALUES ( :mk, :yr, :mi)');
$stmt->execute(array(
  ':mk' => $_POST['make'],
  ':yr' => $_POST['year'],
  ':mi' => $_POST['mileage'])
);
$_SESSION['success'] = "Record inserted";
header("Location: view.php");
return;
  
} }
$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- view area       -->
<html>
<head> <title> Moshe Janani </title> </head>
<body>

<h1> Tracking Autos for <?php
if ( isset($_SESSION['name']) ) {
  echo htmlentities($_SESSION['name']);
   }
?>
 </h1>
 <?php
 if ( isset($_SESSION['e1']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['e1'])."</p>\n");
  unset($_SESSION['e1']);
}
 if ( isset($_SESSION['e2']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['e2'])."</p>\n");
  unset($_SESSION['e2']);
}
 ?>
<form method="post">
<p>Make:
<input type="text" name="make" size="40"></p>
<p>Year:
<input type="text" name="year"></p>
<p>Mileage:
<input type="text" name="mileage"></p>

<div><input type="submit" value="Add New ">
<a href="logout.php"> Cancel </a>
</div>

</form>

</body>
