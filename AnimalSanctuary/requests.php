<!DOCTYPE html>

<html>
<div class="topnav">
  <a class="active" href="mainpage.php">Home</a>
  <a href="mainpage.php">All Animals</a>
  <a href="requests.php">Requests</a>
  <a href="index.php">Sign Out</a>
</div>

<h1> Type in your username to see all your requests!</h1>

<form method="post" action="requests.php">
        <input type="text" id="username" name="username" required>
		<input type="submit" value="Search!" name="search">

</form>

<?php 

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if(isset($_POST['username'])) {
    $username = clean($_REQUEST["username"]);
    $db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
	$sql = "SELECT * FROM requests WHERE requester=?";
	$data = [$username];
	$query = $db->prepare($sql);
	$query->execute($data);
	$results = $query->fetchAll(PDO::FETCH_ASSOC);

    print "<h2> Here are your requests:</h2>";
    foreach ($results as $row) {
        $animal = $row["animal"];
        $status = $row["statusof"];
        print "<h3>You made a request for: $animal</h3>
        <h3> Status of Request: $status</h3>
        <br>
        <br>";

    }
}

?>
</html>