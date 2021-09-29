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
		$cardNum="";
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
					<img src="/img/store_value_on.png">
				</td>
				<td>
					<?php jump_post("car.php",$id,"/img/car.png");?>
				</td>
				<td>
					<?php jump_post("game_library.php",$id,"/img/game_library.png");?>
				</td>
			</tr>
		</table>
		<div class="right">
			<font size="6">會員 : <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;錢包餘額 : <?php echo $amount;?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
		</div>
		<br>&nbsp;&nbsp;
		<img src="/img/mht1.jpg">
		<img src="/img/mht2.jpg">
		<?php
			date_default_timezone_set('Asia/Taipei');
			if(!empty($_POST["check"])){
				if(!empty($_POST["cardNum"])){
					$cardNum=$_POST["cardNum"];
					$sql= "SELECT Card_id,Card_value,Card_state FROM card WHERE Card_number='$cardNum'";
					$result_card=$conn->query($sql);
					if($result_card->num_rows==0){
						echo "<br>";
						echo "<div class='middle'><font color='#FF0000'>錯誤，序號不存在！</font></div>";
					}
					else{
						while($row = $result_card->fetch_assoc()){
							$cid=$row["Card_id"];
							$cvalue=$row["Card_value"];
							$cstate=$row["Card_state"];
							if($cstate=='N'){
								echo "<br>";
								echo "<div class='middle'><font color='#FF0000'>儲值失敗，序號已被使用！</font></div>";
							}
							else{
								$amount+=$cvalue;
								$today=date("Y-m-d");
								$sql = "UPDATE user SET User_amount = '$amount' WHERE User_id = '$id'";
								$conn->query($sql);
								$sql = "UPDATE card SET Card_change_date = '$today',Card_state='N',user_id='$id' WHERE Card_id = '$cid'";
								$conn->query($sql);
								echo "<script>alert('恭喜儲值成功，儲值點數為 ".$cvalue." ，即將跳轉到購物車頁面。');</script>";
								echo "<form id='jump_with_post' name='jump_with_post' action='car.php' method='post'>";
								echo "<input type='hidden' name='id' value='".$id."'>";
								echo "</form>";
								echo "<script>document.forms['jump_with_post'].submit();</script>";
							}
						}
					}
				}
				else {
					echo "<br>";
					echo "<div class='middle'><font color='#FF0000'>錯誤，序號不能爲空！</font></div>";
				}
			}
		?>
		<div class="middle">
			<form action='store_value.php' method='post'>
				<p>
				<font size= 6>請輸入儲值卡序號 : </font>
				<input type=hidden name=id value= <?php echo $id;?>>
    			<input type=hidden name=check value=1>
    			<input type=text name=cardNum size=20 value=<?php echo $cardNum;?>>
    			&nbsp;
    			<input type='submit' style='font-size:32px' value='儲值'>
    			</p>
    		</form>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>