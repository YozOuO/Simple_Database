<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Loading</title>
</head>
<body>
	<?php
		header("Content-Type:text/html; charset=utf-8");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//$login=$_POST["login"];
			$login_type=$_POST["login_type"];
 			$account=$_POST["account"];
 		}
 		$servername = "localhost";
		$username = "HHJ";
		$password = "S10459015";
		$dbname = "ezgame_database";
		$conn = new mysqli($servername, $username, $password, $dbname);
		mysqli_query($conn,"SET NAMES 'utf8'");

		if($login_type=="user"){
			$sql = "SELECT User_id FROM user WHERE User_account='$account'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$id=$row["User_id"];
			}
			$conn->close();
			echo "<form id='jump_with_post' name='jump_with_post' action='user_interface.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$id."'>";
			echo "</form>";
			echo "<script>document.forms['jump_with_post'].submit();</script>";
		}
		else{
			$sql = "SELECT Developer_id FROM developer WHERE Developer_account='$account'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$id=$row["Developer_id"];
			}
			$conn->close();
			echo "<form id='jump_with_post' name='jump_with_post' action='developer_interface.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$id."'>";
			echo "</form>";
			echo "<script>document.forms['jump_with_post'].submit();</script>";
		}
	?>
</body>
</html>