<!DOCTYPE html>
<html>

<div class="topnav">
  <a class="active" href="adminmain.php">Home</a>
  <a href="allrequests.php">View Request History</a>
  <a href="allanimals.php">View All Animals</a>
  <a href="createani.php">Create Animal</a>
  <a href="index.php">Sign Out</a>
</div>

<?php 

$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
$sql = "SELECT * FROM requests";
$query = $db->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    $user = $row["requester"];
    $animal = $row["animal"];
    $status = $row["statusof"];
    print "<h2>$user has requested to Adopt $animal</h2>
    <h2>Status: $status</h2> ";

}

?>

</html>
