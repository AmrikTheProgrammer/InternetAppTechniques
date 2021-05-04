<!DOCTYPE html>

<html>

<div class="topnav">
  <a class="active" href="adminmain.php">Home</a>
  <a href="allrequests.php">View Request History</a>
  <a href="allanimals.php">View All Animals</a>
  <a href="createani.php">Create Animal</a>
  <a href="index.php">Sign Out</a>
</div>

<h1>All animals:</h1>

<?php 
$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
$sql = "SELECT * FROM animals";
$query = $db->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
  $dob = $row["dob"];
  $animalName = $row["animalname"];
  $description = $row["anidescription"];
  $image = $row["picture1"];
  $owner = $row["aniowner"];
  $image2 = $row["picture2"];
  $image3 = $row["picture3"];
  $state = $row["anistate"];

    print "
    <h2>$animalName</h2>
    <h2>Description: $description</h2>
    <h2>Born on: $dob</h2>
    <img src='$image'/>
    <img src='$image2'/>
    <img src='$image3'/>
    <h2>Owner is $owner</h2>
    <br>";
}

?>



</html>