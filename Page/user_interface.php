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
					<img src="/img/shop_on.png">
				</td>
				<td>
					<?php jump_post("store_value.php",$id,"/img/store_value.png");?>
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
		<div class="middle">
		<?php
			$pageSize = 5;
 		 	$rowCount = 0;
  			$pageNow = 1;
  			if (!empty($_POST['pageNow'])){
    			$pageNow = $_POST['pageNow'];
  			}
  			$pageCount=0;

			$sql = "SELECT Game_id FROM game";
			$count = $conn->query($sql);
			$rowCount=$count->num_rows;
			$pageCount=ceil(($rowCount/$pageSize));
			$pre=($pageNow-1)*$pageSize;

			$search_game="";

			if(!empty($_POST['search_game'])){
				$search_game=$_POST['search_game'];
				$sql= "SELECT Game_id, Game_name, Game_price,Game_up_date,Game_good,Game_bad,Game_img FROM game WHERE Game_name='$search_game' and Game_state='Y'";
			}
			else{
				$sql= "SELECT Game_id, Game_name, Game_price,Game_up_date,Game_good,Game_bad,Game_img FROM game WHERE Game_state='Y' limit $pre,$pageSize";
			}
			$print_game=$conn->query($sql);

			echo "<br>";
			echo "<br>";
			echo "<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post' >";
			echo "<p>";
			echo "<font size='6'>搜索游戲 : </font>";
			echo "<input type='hidden' name='id' value='".$id."'>";
    		echo "<input type='text' name='search_game' size='50' value='".$search_game."'>";
    		echo ('&nbsp;');echo ('&nbsp;');
    		echo "<input type='image' src='/img/search.png'";
    		echo "</p>";
  			echo "</form>";
  			echo "<br>";
  			echo "<br>";

			while($row = $print_game->fetch_assoc()){
				$gid=$row["Game_id"];
				$gname=$row["Game_name"];
				$gprice=$row["Game_price"];
				$gdate=$row["Game_up_date"];
				if($row["Game_good"]+$row["Game_bad"]<10)
					$gscore=0;
				else $gscore=100*$row["Game_good"]/($row["Game_good"]+$row["Game_bad"]);
				$gimg=$row["Game_img"];

				echo "<form action='game.php' method='post'>";
				echo "<input type='hidden' name='uid' value='".$id."'>";
    			echo "<input type='hidden' name='gid' value='".$gid."'>";
    			echo "<input type='image' src='".$gimg."' width=292px height=136px>";
  				echo "</form>";
				echo $gname;
				echo "<br>";
				echo "評分 : ";
				if($gscore>=0 && $gscore<20){
					echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";
				}
				else if($gscore>=20 && $gscore<40){
					echo "<img src='\img\s1.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";
				}
				else if($gscore>=40 && $gscore<60){
					echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";
				}
				else if($gscore>=60 && $gscore<80){
					echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s0.png'>";echo "<img src='\img\s0.png'>";
				}
				else if($gscore>=80 && $gscore<95){
					echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s0.png'>";
				}
				else{
					echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";echo "<img src='\img\s1.png'>";
				}
				echo "<br>";
				echo "上架日期 : ".$gdate;
				echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');echo('&nbsp;');
				echo "價格 : ".$gprice;
				echo "<br>";
				echo "<br>";
			}
			echo "<br>";
			if(!empty($search_game)){
				if($print_game->num_rows==0){
					echo "<font size='6'>抱歉，未找到搜索的游戲</font>";
				}
			}
			else{
				if($pageNow>1){
    				$prePage = $pageNow-1;
    				echo "<form style='margin:0px;display:inline;' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>";
    				echo "<input type='hidden' name='pageNow' value='".$prePage."'>";
    				echo "<input type='hidden' name='id' value='".$id."'>";
    				echo "<input type='image' src='/img/left.png'>";
  					echo "</form>";
  				}
  				echo('&nbsp;');echo('&nbsp;');
  				echo "第 {$pageNow} 頁/共 {$pageCount} 頁";
  				echo('&nbsp;');echo('&nbsp;');
  				if($pageNow<$pageCount){
    				$nextPage = $pageNow+1;
    				echo "<form style='margin:0px;display:inline;' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>";
    				echo "<input type='hidden' name='pageNow' value='".$nextPage."'>";
    				echo "<input type='hidden' name='id' value='".$id."'>";
    				echo "<input type='image' src='/img/right.png'>";
  					echo "</form>";
  				}
  			}
		?>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
</body>
</html>