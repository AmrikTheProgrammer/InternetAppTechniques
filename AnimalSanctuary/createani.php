<!DOCTYPE html>

<html>

<div class="topnav">
  <a class="active" href="adminmain.php">Home</a>
  <a href="allrequests.php">View Request History</a>
  <a href="allanimals.php">View All Animals</a>
  <a href="createani.php">Create Animal</a>
  <a href="index.php">Sign Out</a>
</div>

<h1> Create an Animal Listing:</h1>

<form method="post" action="createani.php" enctype="multipart/form-data">
        <label for="name">Name:</label> <br>
        <input type="text" id="name" name="name" required> <br>

        <label for="Password">Date of Birth:</label> <br>
        <input type="text" id="dob" name="dob" required> <br>

        <label for="Username">Description:</label> <br>
        <input type="text" id="description" name="description" required> <br>

        <label for="Username">Owner:</label> <br>
        <input type="text" id="owner" name="owner"> <br>

        <label for="Username">Availablity:</label> <br>
        <input type="text" id="state" name="state"> <br>

        <label for="Username">Picture 1:</label> <br>
        <input type="file" id="pic1" name="pic1"> <br>

        <label for="Username">Picture 2:</label> <br>
        <input type="file" id="pic2" name="pic2"> <br>

        <label for="Username">Picture 3:</label> <br>
        <input type="file" id="pic3" name="pic3"> <br>
        <input type="submit" value="Submit Animal" name="newAnimal">

</form>

<?php
if(isset($_POST['newAnimal'])) {
	createNewAnimal();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function createNewAnimal() {
    $db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
	$name = test_input($_REQUEST["name"]);
	$dob = test_input($_REQUEST["dob"]);
    $description = test_input($_REQUEST["description"]);
    $owner = test_input($_REQUEST["owner"]);
    $state = test_input($_REQUEST["state"]);
    $picture1 = $_FILES["pic1"];
    $picture2 = $_FILES["pic2"];
    $picture3 = $_FILES["pic3"];
    $pictures = [$picture1, $picture2,$picture3];
    $safe = "yes";

    $names = ["name", "dob", "description", "owner", "state"];
    $destinations = ["","",""];
    $count = 0;
    foreach ($pictures as $picture) {
        $fileName = $picture["name"];
        $fileTmpName = $picture["tmp_name"];
        $fileSize = $picture["size"];
        $fileError = $picture["error"];
        $fileType = $picture["type"];

        if ($fileName != "") {
            $exten = explode(".", $fileName);
            $type = strtolower(end($exten));
            $allowed = ["jpg", "jpeg", "png"];
            if (in_array($type, $allowed)) {
                if ($fileError === 0) {
                    $newFileName = uniqid("",true).".".$type;
                    $destination = "uploads/".$newFileName;
                    move_uploaded_file($fileTmpName, $destination);
                    $destinations[$count] = $destination;
                    $count = $count + 1;
    
                }else {
                    print "<h2> There was an Error!</h2>";
                    $safe = "no";
                }
            } else {
                print "<h2> Only JPGs JPEGs and PNGs are allowed</h2>";
                $safe = "no";
            }
        }
        
    }

    print"<h2>Value of Safe: $safe</h2>";
	if ($safe == "yes") {
		$sql = "INSERT INTO animals (animalname, dob, anidescription, aniowner, anistate, picture1,picture2,picture3) VALUES (?, ?, ?, ?, ?, ?,? ,?)";
		$data = [$name, $dob, $description, $owner, $state, $destinations[0],$destinations[1],$destinations[2]];
		$db->prepare($sql)->execute($data);
    }

}
//(preg_match("/^[a-z\d_]{5,20}$/i", $username)
?>




</html>