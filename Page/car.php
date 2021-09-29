<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="EZ_x.ico" type="image/x-icon" />
	<title>EZ-GAME 會員</title>
	<style> 
	.left{float: left}
	.right{float: right} 
	.middle{text-align: center}
</style>
<style>
	p{padding:0px; margin:0px;}
</style>
</head>
<body background="/img/back.png">
	<?php
		header("Content-Type:text/html; charset=utf-8");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$id=$_POST["id"];

			$servername = "localhost";
			$username = "HHJ";
			$password = "S10459015";
			$dbname = "ezgame_database";
			$conn = new mysqli($servername, $username, $password, $dbname);
			mysqli_query($conn,"SET NAMES 'utf8'");

			$sql = "SELECT User_name, User_amount FROM user WHERE User_id='$id'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$name=$row["User_name"];
				$amount=$row["User_amount"];
			}
		}
		function jump_post($url,$uid,$img_url){
			echo "<form style='margin:0px;display:inline;' action='".$url."' method='post' >";
			echo "<p>";
			echo "<input type='hidden' name='id' value='".$uid."'>";
    		echo "<input type='image' src='".$img_url."'>";
    		echo "</p>";
  			echo "</form>";
		}
	?>
	<div style="background:#000; color:#FFF">
		<img src="/img/EZ_GAME.png">
		<img src="/img/user.png">
		<div class="right">
			<br><br><a href="index.php" target＝_blank><img src="/img/out.png"></a>
		</div>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br><br>
		<table>
			<tr>
				<td>
					<?php jump_post("user_interface.php",$id,"/img/shop.png");?>
				</td>
				<td>
					<?php jump_post("store_value.php",$id,"/img/store_value.png");?>
				</td>
				<td>
					<img src="/img/car_on.png">
				</td>
				<td>
					<?php jump_post("game_library.php",$id,"/img/game_library.png");?>
				</td>
			</tr>
		</table>
		<div class="right">
			<font size="6">會員 : <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;錢包餘額 : <?php echo $amount;?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
		</div>
		<div class="middle">
			<?php
				date_default_timezone_set('Asia/Taipei');
				$check=0;
				if(!empty($_POST["check"])){
					$check=$_POST["check"];
					$gid=$_POST["gid"];
				}
				if($check==1){
					$sql = "DELETE FROM shopping_cart WHERE user_id = '$id' and game_id='$gid'";
					$result = $conn->query($sql);
					if($result === TRUE){
						echo "<script>alert('移除成功，即將刷新頁面。');</script>";
					}
				}
				echo "<br>";
				$clean=0;
				$sql1= "SELECT game_id,Add_date FROM shopping_cart WHERE user_id='$id'";
				$result_game=$conn->query($sql1);
				if($result_game->num_rows==0){
					echo "<div class='left'><font size= 6>&nbsp;&nbsp;您的購物車裏空空的，趕快去商店添加游戲吧！</font></div>";
				}
				else{
					$total=0;
					if(!empty($_POST["clean"])){
						$clean=$_POST["clean"];
						$money=$_POST["total"];
						if($amount<$money){
							echo "<script>alert('結算失敗，您的賬號餘額不足，即將跳轉到儲值頁面。');</script>";
							echo "<form id='jump_with_post' name='jump_with_post' action='store_value.php' method='post'>";
							echo "<input type='hidden' name='id' value='".$id."'>";
							echo "</form>";
							echo "<script>document.forms['jump_with_post'].submit();</script>";
						}
						else{
							while($row = $result_game->fetch_assoc()){
								$gid=$row["game_id"];
								$sql2= "SELECT Game_price, Game_state, developer_id FROM game WHERE Game_id='$gid'";
								$print_game=$conn->query($sql2);
								while($row2=$print_game->fetch_assoc()){
									$gprice=$row2["Game_price"];
									$gstate=$row2["Game_state"];
									$did=$row2["developer_id"];
									if($gstate=='Y'){
										$amount=$amount-$gprice;
										$sql = "UPDATE user SET User_amount = '$amount' WHERE User_id = '$id'";
										$conn->query($sql);
										$sql = "UPDATE developer SET Developer_amount = Developer_amount+'$gprice' WHERE Developer_id = '$did'";
										$conn->query($sql);
										$sql = "SELECT Record_id FROM transaction_record";
										$find_num = $conn->query($sql);
   										$record_num=$find_num->num_rows;
   										$today=date("Y-m-d");
   										$sql = "INSERT INTO transaction_record (Record_id, game_id, user_id, developer_id,Record_amount,Transaction_date,Transaction_type) VALUES ('$record_num', '$gid', '$id', '$did','$gprice','$today','B')";
   										$conn->query($sql);
   										$sql = "SELECT Library_state FROM game_library WHERE user_id = '$id' and game_id = '$gid'";
   										$result = $conn->query($sql);
   										if($result->num_rows > 0){
   											$sql = "UPDATE game_library SET Library_state = 'Y' WHERE user_id = '$id' and game_id = '$gid'";
   											$conn->query($sql);
   										}
   										else{
   											$sql = "INSERT INTO game_library (user_id, game_id, Transaction_date,Library_state) VALUES ('$id', '$gid', '$today','Y')";
   											$conn->query($sql);
   										}
   										$sql = "DELETE FROM shopping_cart WHERE user_id = '$id' and game_id='$gid'";
   										$conn->query($sql);
   									}
								}
							}
							echo "<script>alert('恭喜購買結算成功，即將跳轉到游戲庫頁面。');</script>";
							echo "<form id='jump_with_post' name='jump_with_post' action='game_library.php' method='post'>";
							echo "<input type='hidden' name='id' value='".$id."'>";
							echo "</form>";
							echo "<script>document.forms['jump_with_post'].submit();</script>";
						}
					}
					else{
						while($row = $result_game->fetch_assoc()){
							$buf=$row["game_id"];
							$date=$row["Add_date"];
							$sql2= "SELECT Game_name, Game_price, Game_img FROM game WHERE Game_id='$buf' and Game_state='Y'";
							$print_game=$conn->query($sql2);
							while($row2=$print_game->fetch_assoc()){
								$gname=$row2["Game_name"];
								$gprice=$row2["Game_price"];
								$gimg=$row2["Game_img"];
								$total+=$gprice;
								echo "<table><tr><td>";
								echo "<form action='car.php' method='post'>";
								echo "<input type='hidden' name='id' value='".$id."'>";
    							echo "<input type='hidden' name='gid' value='".$buf."'>";
    							echo "<input type='hidden' name='check' value='1'>";
    							echo('&nbsp;');echo('&nbsp;');
    							echo "<input type='submit' style='font-size:36px' value='移除'>";
    							echo "</form>";
								echo "</td><td>";
								echo "<form action='game.php' method='post'>";
								echo "<input type='hidden' name='uid' value='".$id."'>";
    							echo "<input type='hidden' name='gid' value='".$buf."'>";
    							echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    							echo "<input type='image' src='".$gimg."' width=292px height=136px>";
  								echo "</form>";
  								echo "</td><td>";
  								echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
								echo $gname;
								echo "</td><td>";
								echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
								echo "添加時間 : ".$date;
								echo "</td><td>";
								echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
								echo "價格 : ".$gprice;
								echo "</td></tr></table>";
							}
						}
						echo "<font size= 6>&nbsp;&nbsp;預計總額 : ".$total."</font>";
						echo "<form action='car.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$id."'>";
						echo "<input type='hidden' name='total' value='".$total."'>";
    					echo "<input type='hidden' name='clean' value='1'>";
    					echo "<br>";
    					echo "<input type='submit' style='font-size:36px' value='購買結算'>";
    					echo "</form>";
    				}
				}
			?>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>