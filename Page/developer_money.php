<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="EZ_x.ico" type="image/x-icon" />
	<title>EZ-GAME 開發商</title>
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

			$sql = "SELECT Developer_name, Developer_amount FROM developer WHERE Developer_id='$id'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$name=$row["Developer_name"];
				$amount=$row["Developer_amount"];
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
		<img src="/img/developer.png">
		<div class="right">
			<br><br><a href="index.php" target＝_blank><img src="/img/out.png"></a>
		</div>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br><br>
		<table>
			<tr>
				<td>
					<?php jump_post("developer_interface.php",$id,"/img/spk.png");?>
				</td>
				<td>
					<img src="/img/yyzl_on.png">
				</td>
			</tr>
		</table>
		<div class="right">
			<font size="6">開發商 : <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;營業總額 : <?php echo $amount;?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
		</div>
		<?php
			date_default_timezone_set('Asia/Taipei');
			$sql1= "SELECT Game_id FROM game WHERE developer_id='$id'";
			$result1=$conn->query($sql1);
			echo "<br>";
			echo "<br>";
			if($result1->num_rows==0){
				echo "<div class='left'><font size= 6>&nbsp;&nbsp;您的当前还没有上架的商品，请联系客服咨询上架。</font></div>";
			}
			else{
				$sql2= "SELECT game_id,user_id,Record_amount,Transaction_date,Transaction_type FROM transaction_record WHERE developer_id='$id'";
				$result2=$conn->query($sql2);
				if($result2->num_rows==0){
					echo "<div class='left'><font size= 6>&nbsp;&nbsp;您上架的商品還沒產生交易記錄。</font></div>";
				}
				else{
					echo "<div class='middle'>";
					echo "<table border='1'>";
					echo "<tr>";
					echo "<td>交易型別</td>";
					echo "<td>游戲名稱</td>";
					echo "<td>會員名稱</td>";
					echo "<td>交易金額</td>";
					echo "<td>交易日期</td>";
					echo "</tr>";
					while($row2 = $result2->fetch_assoc()){
						$gid=$row2["game_id"];
						$uid=$row2["user_id"];
						$rec_amount=$row2["Record_amount"];
						$date=$row2["Transaction_date"];
						$type=$row2["Transaction_type"];
						$sql3= "SELECT Game_name FROM game WHERE Game_id='$gid'";
						$result3=$conn->query($sql3);
						while($row3 = $result3->fetch_assoc()){
							$gname=$row3["Game_name"];
						}
						$sql4= "SELECT User_name FROM user WHERE User_id='$uid'";
						$result4=$conn->query($sql4);
						while($row4=$result4->fetch_assoc()){
							$uname=$row4["User_name"];
						}
						echo "<tr>";
						if($type=='B'){
							echo"<td>購買</td>";
						}
						else {
							echo"<td>退款</td>";
						}
						echo "<td>".$gname."</td>";
						echo "<td>".$uname."</td>";
						echo "<td>".$rec_amount."</td>";
						echo "<td>".$date."</td>"; 
						echo "</tr>";
					}
					echo "</table>";
					echo "</div>";
				}
			}
		?>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>