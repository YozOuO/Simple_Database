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
					<?php jump_post("car.php",$id,"/img/car.png");?>
				</td>
				<td>
					<img src="/img/game_library_on.png">
				</td>
			</tr>
		</table>
		<div class="right">
			<font size="6">會員 : <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;錢包餘額 : <?php echo $amount;?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
		</div>
		<?php
			date_default_timezone_set('Asia/Taipei');
			$sql1= "SELECT game_id,Transaction_date FROM game_library WHERE user_id='$id' and Library_state='Y'";
			$result=$conn->query($sql1);
			echo "<br>";
			if($result->num_rows==0){
				echo "<div class='left'><font size= 6>&nbsp;&nbsp;您的游戲庫裏空空的，趕快去商店購買游戲吧！</font></div>";
			}
			else{
				while($row = $result->fetch_assoc()){
					$gid=$row["game_id"];
					$date=$row["Transaction_date"];
					$sql2= "SELECT Game_name, Game_size, Game_img, Game_download FROM game WHERE Game_id='$gid'";
					$print_game=$conn->query($sql2);
					while($row2=$print_game->fetch_assoc()){
						$gname=$row2["Game_name"];
						$gsize=$row2["Game_size"];
						$gimg=$row2["Game_img"];
						$glink=$row2["Game_download"];
						echo "<table><tr><td>";
						echo "<form action='game.php' method='post'>";
						echo "<input type='hidden' name='uid' value='".$id."'>";
    					echo "<input type='hidden' name='gid' value='".$gid."'>";
    					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    					echo "<input type='image' src='".$gimg."' width=292px height=136px>";
  						echo "</form>";
  						echo "</td><td>";
  						echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
						echo $gname;
						echo "</td><td>";
						echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
						echo "購買時間 : ".$date;
						echo "</td><td>";
						echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
						echo "游戲所需磁碟空間 : ".$gsize;
						echo "</td></tr></table>";
						echo "<table><tr><td>";
    					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    					echo "<a href=".$glink." target＝_blank><input type='button' style='font-size:30px' value='下載'></a>";
  						echo "</td><td>";
						echo "<form action='game_library.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$id."'>";
    					echo "<input type='hidden' name='gid' value='".$gid."'>";
    					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    					echo "好評<input type='radio' name='score' value=1 checked>&nbsp;&nbsp;差評<input type='radio' name='score' value=-1>";
    					echo('&nbsp;');echo('&nbsp;');
    					echo "<input type='submit' style='font-size:30px' value='評價'>";
  						echo "</form>";
						echo "</td><td>";
						echo "<form action='game_library.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$id."'>";
    					echo "<input type='hidden' name='gid' value='".$gid."'>";
    					echo "<input type='hidden' name='check' value='1'>";
    					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    					echo "<input type='submit' style='font-size:30px' value='退款'>";
  						echo "</form>";
						echo "</td></tr></table>";
						echo "<br>";echo "<br>";
					}
				}
				if(!empty($_POST["score"])){
					$new_score=$_POST["score"];
					$gid=$_POST["gid"];
					$sql3= "SELECT Score FROM game_library WHERE user_id='$id' and game_id='$gid'";
					$get_score=$conn->query($sql3);
					while($row2 = $get_score->fetch_assoc()){
						$old_score=$row2["Score"];
						if($old_score==0){
							$sql4 = "UPDATE game_library SET Score = '$new_score' WHERE User_id = '$id' and game_id='$gid'";
							$conn->query($sql4);
							if($new_score==1){
								$sql5 = "UPDATE game SET Game_good = Game_good+1 WHERE game_id='$gid'";
								$conn->query($sql5);
							}
							else{
								$sql5 = "UPDATE game SET Game_bad = Game_bad+1 WHERE game_id='$gid'";
								$conn->query($sql5);
							}
							echo "<script>alert('評價成功，感謝您的寶貴意見。');</script>";
						}
						else if($new_score==$old_score){
							echo "<script>alert('評價失敗，不能重複給予相同評價。');</script>";
						}
						else{
							$sql6 = "UPDATE game_library SET Score = '$new_score' WHERE User_id = '$id' and game_id='$gid'";
							$conn->query($sql6);
							if($new_score==1){
								$sql7 = "UPDATE game SET Game_good = Game_good+1 WHERE game_id='$gid'";
								$conn->query($sql7);
								$sql7 = "UPDATE game SET Game_bad = Game_bad-1 WHERE game_id='$gid'";
								$conn->query($sql7);
								echo "<script>alert('修改評價成功，已將差評改爲好評。');</script>";
							}
							else{
								$sql7 = "UPDATE game SET Game_good = Game_good-1 WHERE game_id='$gid'";
								$conn->query($sql7);
								$sql7 = "UPDATE game SET Game_bad = Game_bad+1 WHERE game_id='$gid'";
								$conn->query($sql7);
								echo "<script>alert('修改評價成功，已將好評改爲差評。');</script>";
							}
						}
					}
				}
				if(!empty($_POST["check"])){
					$gid=$_POST["gid"];
					$sql= "SELECT Transaction_date FROM game_library WHERE user_id='$id' and game_id='$gid'";
					$get_date=$conn->query($sql);
					while($row = $get_date->fetch_assoc()){
						$date=$row["Transaction_date"];
						$today=date("Y-m-d");
						$time=(strtotime($today)-strtotime($date))/3600;
						if($time>72){
							echo "<script>alert('退款失敗，購買時間超過72小時。');</script>";
						}
						else{
							$sql = "UPDATE game_library SET Library_state='N' WHERE User_id = '$id' and game_id='$gid'";
							$conn->query($sql);
							$sql = "SELECT developer_id,Record_amount,Transaction_type FROM transaction_record WHERE User_id = '$id' and game_id='$gid'";
							$get_rec=$conn->query($sql);
							while($row2 = $get_rec->fetch_assoc()){
								$did=$row2["developer_id"];
								$rec_amount=$row2["Record_amount"];
								$Tt=$row2["Transaction_type"];
							}
							if($Tt=='B'){
								$sql = "UPDATE developer SET Developer_amount = Developer_amount-'$rec_amount' WHERE Developer_id = '$did'";
								$conn->query($sql);
								$sql = "UPDATE user SET User_amount = User_amount+'$rec_amount' WHERE User_id = '$id'";
								$conn->query($sql);
								$sql = "SELECT Record_id FROM transaction_record";
								$find_num = $conn->query($sql);
   								$record_num=$find_num->num_rows;
   								$sql = "INSERT INTO transaction_record (Record_id, game_id, user_id, developer_id,Record_amount,Transaction_date,Transaction_type) VALUES ('$record_num', '$gid', '$id', '$did','$rec_amount','$today','R')";
   								$conn->query($sql);
   								echo "<script>alert('退款成功。');</script>";
   								echo ("<script type='text/javascript'>");
								echo ("function fresh_page()");
								echo ("{");
								echo ("window.location.reload();");
								echo ("}");
								echo ("setTimeout('fresh_page()',0);");
								echo ("</script>");
   							}
						}
					}
				}
			}
		?>
	</div>
	<img src="/img/bottom_x.png" width="100%" height="26.041%">
</body>
</html>