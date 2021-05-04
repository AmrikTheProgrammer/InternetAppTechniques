<!DOCTYPE html>
<html>
<div class="topnav">
  <a class="active" href="mainpage.php">Home</a>
  <a href="mainpage.php">All Animals</a>
  <a href="requests.php">Requests</a>
  <a href="index.php">Sign Out</a>
</div>
<h1>Create your request Below</h1>
<?php 

$animal = $_REQUEST["animal"];
print "<h2> Animal is $animal</h2>";

print"
<form method='post' action='makerequest.php'>
        <label for='Username'>Enter your usename here:</label> <br>
        <input type='text' id='username' name='username' required> <br>
        <label for='Reason'>Why do you want to adopt this animal?</label> <br>
        <input type='text' id='Reason' name='Reason' required> <br>
        <input type='hidden' name='animalinnew' value='$animal'>
        <input type='submit' value='Submit Request' name='submit'>

</form>
";

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function createRequest() {
    $db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
    $username = clean($_REQUEST["username"]);
    $reason = clean($_REQUEST["Reason"]);
    $animal = $_REQUEST["animalinnew"];
    $sql = "INSERT INTO requests (animal, requester, reasonwhy, statusof) VALUES (?, ?, ?, ?)";
    $data = [$animal, $username, $reason, "Pending"];
    $db->prepare($sql)->execute($data);
    print "<h3> Your request was created</h3>";

}

if(isset($_POST['submit'])) {
	createRequest();
}


?>
</html>