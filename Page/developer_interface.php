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
					<img src="/img/spk_on.png">
				</td>
				<td>
					<?php jump_post("developer_money.php",$id,"/img/yyzl.png");?>
				</td>
			</tr>
		</table>
		<div class="right">
			<font size="6">開發商 : <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;營業總額 : <?php echo $amount;?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
		</div>
		<?php
			$sql1= "SELECT Game_id,Game_name,Game_up_date,Game_img,Game_good,Game_bad,Game_introduction FROM game WHERE developer_id='$id' and Game_state='Y'";
			$result=$conn->query($sql1);
			if($result->num_rows==0){
				echo "<div class='left'><font size= 6>&nbsp;&nbsp;您的当前还没有上架的商品，请联系客服咨询上架。</font></div>";
			}
			else{
				echo "<div class='middle'>";
				echo "<table>";
				while($row = $result->fetch_assoc()){
					$gid=$row["Game_id"];
					$gname=$row["Game_name"];
					$gdate=$row["Game_up_date"];
					$gimg=$row["Game_img"];
					$ggood=$row["Game_good"];
					$gbad=$row["Game_bad"];
					$gintro=$row["Game_introduction"];
					$sql2= "SELECT user_id FROM game_library WHERE game_id='$gid' and Library_state='Y'";
					$result2=$conn->query($sql2);
					$play_num=$result2->num_rows;
					echo "<tr><td>";
					//echo "<form action='game.php' method='post'>";
					//echo "<input type='hidden' name='did' value='".$id."'>";
    				//echo "<input type='hidden' name='gid' value='".$gid."'>";
    				echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
    				//echo "<input type='image' src='".$gimg."' width=292px height=136px>";
    				echo "<img src='".$gimg."' width=292px height=136px>";
  					//echo "</form>";
  					echo "</td><td>";
  					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo $gname;
					echo "</td><td>";
					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo "上架日期 : ".$gdate;
					echo "</td><td>";
					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo "好評數 : ".$ggood;
					echo "</td><td>";
					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo "差評數 : ".$gbad;
					echo "</td><td>";
					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo "游戲介紹 : ";
					echo "</td><td>";
					echo "<textarea disabled='disabled' style='width:500px;height:136px;border:none;resize:none;'>".$gintro."</textarea>";
					echo "</td><td>";
					echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
					echo "玩家總數 : ".$play_num;
					echo "</td></tr>";
					echo "<br>";echo "<br>";
				}
				echo "</table>";
				echo "</div>";
			}
		?>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>