<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="EZ_x.ico" type="image/x-icon" />
	<title>EZ-GAME 游戲</title>
	<style> 
	.left{float: left}
	.right{float: right} 
	.middle{text-align: center}
	p{padding:0px; margin:0px;}
</style>
</head>
<body background="/img/back.png">
	<?php
		header("Content-Type:text/html; charset=utf-8");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$uid=$_POST["uid"];
			$gid=$_POST["gid"];

			$servername = "localhost";
			$username = "HHJ";
			$password = "S10459015";
			$dbname = "ezgame_database";
			$conn = new mysqli($servername, $username, $password, $dbname);
			mysqli_query($conn,"SET NAMES 'utf8'");

			$sql = "SELECT Game_name,Game_price,developer_name,Game_up_date,Game_size,Game_good,Game_bad,Game_introduction,Game_img FROM game WHERE Game_id='$gid'";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()){
				$gname=$row["Game_name"];
				$gprice=$row["Game_price"];
				$dname=$row["developer_name"];
				$gdate=$row["Game_up_date"];
				$gsize=$row["Game_size"];
				$ggood=$row["Game_good"];
				$gbad=$row["Game_bad"];
				$gintro=$row["Game_introduction"];
				$gimg=$row["Game_img"];
			}
		}
		function jump_post($id,$name){
			echo "<form style='margin:0px;display:inline;' action='user_interface.php' method='post' >";
			echo "<p>";
			echo "<input type='hidden' name='id' value='".$id."'>";
    		echo "<input type='hidden' name='search_game' value='".$name."'>";
    		echo "<input type='image' src='/img/goback.png'>";
    		echo "</p>";
  			echo "</form>";
		}
	?>
	<div style="background:#000; color:#FFF">
		<img src="/img/EZ_GAME.png">
		<img src="/img/game.png">
		<div class="right">
			<br><br>
			<?php
  			jump_post($uid,$gname);
			?>
		</div>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br><br>
		<div class="middle">
			<font size= 6><?php echo $gname;?><br>
			<img src=<?php echo $gimg;?> width=500px height=232.87px><br>
			游戲評分 : 
			<?php
				if($ggood+$gbad<10)
					$gscore=0;
				else $gscore=100*$ggood/($ggood+$gbad);
				if($gscore>=0 && $gscore<20){
					echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "(辣鷄游戲)";
				}
				else if($gscore>=20 && $gscore<40){
					echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "(多半差評)";
				}
				else if($gscore>=40 && $gscore<60){
					echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "(褒貶不一)";
				}
				else if($gscore>=60 && $gscore<80){
					echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "(多半好評)";
				}
				else if($gscore>=80 && $gscore<95){
					echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s0.png' width=30px height=30px>";echo "(特別好評)";
				}
				else{
					echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "<img src='\img\s1.png' width=30px height=30px>";echo "(好評如潮)";
				}
			?>
			<br>
			好評數 : <?php echo $ggood;?>&nbsp;&nbsp;差評數 : <?php echo $gbad;?><br>
			上架日期 : <?php echo $gdate;?><br>
			游戲開發商 : <?php echo $dname;?><br>
			游戲價格 : <?php echo $gprice;?><br>
			游戲所需的磁碟空間 : <?php echo $gsize;?><br>
			游戲介紹 :<br>
			<textarea disabled="disabled" style="width:500px;height:500px;border:none;resize:none;"><?php echo $gintro;?></textarea><br>
			</font>
			<?php
			date_default_timezone_set('Asia/Taipei');
			echo "<form style='margin:0px;display:inline;' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>";
			echo "<p>";
			echo "<input type='hidden' name='uid' value='".$uid."'>";
    		echo "<input type='hidden' name='gid' value='".$gid."'>";
    		echo "<input type='hidden' name='check' value= 1>";
    		echo "<input type='image' name='submit' value='1' src='/img/add_into_car.png'>";
    		//echo "<input type='submit' style='font-size:36px' value='加入購物車'>";
    		echo "</p>";
			echo "</form>";

			$check=0;
			if(!empty($_POST["check"])){
				$check=$_POST["check"];
			}
			if($check==1){
				$sql1="SELECT Library_state FROM game_library WHERE user_id='$uid' and game_id='$gid' and Library_state='Y'";
				$sql2="SELECT Add_date FROM shopping_cart WHERE user_id='$uid' and game_id='$gid'";
				$result1 = $conn->query($sql1);
				$result2 = $conn->query($sql2);
				if($result1->num_rows>0){
					echo "<script>alert('加入購物車失敗，您已購買了此游戲，即將跳轉到游戲庫頁面');</script>";
					echo "<form id='jump_with_post' name='jump_with_post' action='game_library.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$uid."'>";
					echo "</form>";
					echo "<script>document.forms['jump_with_post'].submit();</script>";
				}
				else if($result2->num_rows>0){
					echo "<script>alert('加入購物車失敗，您已將此游戲加入了購物車，即將跳轉到購物車頁面。');</script>";
					echo "<form id='jump_with_post' name='jump_with_post' action='car.php' method='post'>";
					echo "<input type='hidden' name='id' value='".$uid."'>";
					echo "</form>";
					echo "<script>document.forms['jump_with_post'].submit();</script>";
				}
				else{
					$today=date("Y-m-d");
					$sql="INSERT INTO shopping_cart (user_id,game_id,Add_date) VALUES ('$uid','$gid','$today')";
					$is_add = $conn->query($sql);
					if($is_add === TRUE){
						echo "<script>alert('加入購物車成功，即將跳轉到購物車頁面。');</script>";
						echo "<form id='jump_with_post' name='jump_with_post' action='car.php' method='post'>";
						echo "<input type='hidden' name='id' value='".$uid."'>";
						echo "</form>";
						echo "<script>document.forms['jump_with_post'].submit();</script>";
					}
				}
			}
			?>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>