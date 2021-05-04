<!DOCTYPE html>
<html>
<head>
  <title> Animal Sanctuary </title>
</head>

<body>
	<h1>Welcome To Animal Sanctuary!</h1>
    <h2>Sign In Below</h2>
	
	</div>


    <form method="post" action="index.php">
        <label for="Username">Username:</label> <br>
        <input type="text" id="username" name="username" required> <br>
        <label for="Password">Password:</label> <br>
        <input type="text" id="password" name="Password" required> <br>
        <input type="submit" value="Register" name="register">
		<input type="submit" value="Login" name="login">

</form>

<div id="loginjava">
	<p> Message Should be below</p>
	<br>
	
	</div>

<?php 
function validateNewUser() {
	$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
	$username = $_REQUEST["username"];
	$password = $_REQUEST["Password"];

	if (preg_match("/^[a-z\d_]{5,20}$/i", $username) == 1 && preg_match("/^[a-z\d_]{5,20}$/i", $username) == 1 ) {
		print "<h2>Your username and Password is good</h2>";
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO Users (username, Passwords, Staff) VALUES (?, ?, ?)";
		$data = [$username, $passwordHash, 0];
		$db->prepare($sql)->execute($data);

	} else {
		print"<h2> Your username was not accepted. Use only Letters and Numbers</h2>";
		exit;
	}

	$result = $db->query("SELECT * FROM users");
	foreach ($result as $row) {
		print "<h2>$row[username] </h2>";
		print "<h2>$row[Passwords] </h2>";
	}	
}

function login() {
	print "<h2> Using Login Function</h2>";
	$db = new PDO("mysql:dbname=u_190225199_db; host=localhost", "u-190225199", "tqGOHHC8wEQtrpI");
	$username = $_REQUEST["username"];
	$password = $_REQUEST["Password"];
	print "<h2> $username</h2>";
	print "<h2> $password</h2>";
	$sql = "SELECT * FROM Users WHERE username=?";
	$data = [$username];
	$query = $db->prepare($sql);
	$query->execute($data);
	$results = $query->fetchAll(PDO::FETCH_ASSOC);

	foreach ($results as $row) {
		if (password_verify($password, $row["Passwords"]) && $row["Staff"] == 1) {
			print "<h2>Login was successful</h2>";
			header("Location: adminmain.php");
			exit;
		} elseif (password_verify($password, $row["Passwords"])) {
			print "<h2>Login was successful</h2>";
			header("Location: mainpage.php");
			exit;
		} else {
			print "<h2> Could not find your account details</h2>";
		}
	}
}

if(isset($_POST['register'])) {
	validateNewUser();
}
if(isset($_POST['login'])) {
	login();
}
?>

</body>
</html>
