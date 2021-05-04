<!DOCTYPE html>
<html>

<div class="topnav">
  <a class="active" href="mainpage.php">Home</a>
  <a href="mainpage.php">All Animals</a>
  <a href="requests.php">Requests</a>
  <a href="index.php">Sign Out</a>
</div>

<h1>Welcome to the Main Page!</h1>
<h2> Below are current animals:</h2>


<?php 
$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
$sql = "SELECT * FROM animals";
$data = [1];
$query = $db->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
  $dob = $row["dob"];
  $animalName = $row["animalname"];
  $description = $row["anidescription"];
  $image = $row["picture1"];
  $image2 = $row["picture2"];
  $image3 = $row["picture3"];
  $state = $row["anistate"];

  if ($state==1) {

    print "
    <h2>$animalName</h2>
    <h2>Description: $description</h2>
    <h2>Born on: $dob</h2>
    <img src='$image'/>
    <img src='$image2'/>
    <img src='$image3'/>
    <br>
    <form method='post' action='makerequest.php'>
      <input type='hidden' name='animal' value='$animalName'>
      <input type='submit' value='Adopt This animal'>
    </form>";
  }
}

?>


</html>