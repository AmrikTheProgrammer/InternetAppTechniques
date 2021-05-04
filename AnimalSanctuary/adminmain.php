<!DOCTYPE html>

<html>
<div class="topnav">
  <a class="active" href="adminmain.php">Home</a>
  <a href="">View Request History</a>
  <a href="">View All Animals</a>
  <a href="createani.php">Create Animal</a>
  <a href="index.php">Sign Out</a>
</div>

<h1> Welcome to the Admin Home Screen</h1>


<?php 
//$username = clean($_REQUEST["username"]);
$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
$sql = "SELECT * FROM requests WHERE statusof=?";
$data = ["Pending"];
$query = $db->prepare($sql);
$query->execute($data);
$results = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($results as $row ) {
    $user = $row["requester"];
    $status = $row["statusof"];
    $reason = $row["reasonwhy"];
    $animal = $row["animal"];
    print "<h2>$user would like to adopt $animal </h2>
    <h2> User Comment: $reason</h2>
    <form method='post' action='adminmain.php'>
    <input type='hidden' name='animal' value='$animal'>
    <input type='hidden' name='requester' value='$user'>
    <input type='submit' value='Approve' name='approve'>
    <input type='submit' value ='Deny' name='deny'>
</form>";
}

if(isset($_POST['approve'])) {
	approve();
}
if(isset($_POST['deny'])) {
	deny();
}

function approve() {
    $requester = $_REQUEST["requester"];
    $animal = $_REQUEST["animal"];
    Echo "$requester and $animal";
    $db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
    $sql = "UPDATE requests SET statusof='Approved' WHERE requester=? AND animal=?";
    $data = [$requester,$animal];
    $query = $db->prepare($sql);
    $query->execute($data);

    $sql2 = "UPDATE animals SET aniowner=?, anistate=2 WHERE animalname=?";
    $data2 = [$requester, $animal];
    $query2 = $db->prepare($sql2);
    $query2->execute($data2);

    print "<h3>Approved Request</h3>";
}

function deny() {
    $requester = $_REQUEST["requester"];
    $animal = $_REQUEST["animal"];
    $db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
    $sql = "UPDATE requests SET statusof='Denied' WHERE requester=? AND animal=?";
    $data = [$requester,$animal];
    $query = $db->prepare($sql);
    $query->execute($data);
    print "<h3>Denied the request</h3>";
}



?>

</html>