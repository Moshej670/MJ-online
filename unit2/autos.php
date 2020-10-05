<?php
require_once "pdo.php";

if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

$e1 = "Mileage and year must be numeric";
$e2 = " Make is required ";

if ( isset($_POST['make']) && isset($_POST['year']) 
     && isset($_POST['mileage'])) {
     if ( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year']) )  {  
           echo('<p style="color: red;">'.htmlentities($e1)."</p>\n");

}

else if  (strlen($_POST['make']) < 1) {
	 echo('<p style="color: red;">'.htmlentities($e2)."</p>\n");

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
} }
$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head> <title> Moshe Janani </title> </head>
<body>

<h1> Tracking Autos for <?php
if ( isset($_REQUEST['name']) ) {
  echo htmlentities($_REQUEST['name']);
   }
?>
 </h1>
<form method="post">
<p>Make:
<input type="text" name="make" size="40"></p>
<p>Year:
<input type="text" name="year"></p>
<p>Mileage:
<input type="text" name="mileage"></p>

<div><input type="submit" value="Add">
<input type="submit" name="logout" value="Logout"></div>

</form>

<div>
<h2> Automobiles </h2> 
<table>
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo(htmlentities($row['make']));
    echo("</td><td>");
    echo(htmlentities($row['year']));
    echo("</td><td>");
    echo(htmlentities($row['mileage']));
    echo("</td></tr>\n");
}
?>
</table>
</div>
</body>
