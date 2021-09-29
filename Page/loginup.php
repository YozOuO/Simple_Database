<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="EZ_x.ico" type="image/x-icon" />
	<title>EZ-GAME 登入</title>
	<style> 
	.left{float: left}
	.right{float: right} 
	.middle{text-align: center}
</style>
</head>
<body background="/img/back.png">
	<?php 
		header("Content-Type:text/html; charset=utf-8");
		$login_account=$login_password="";
		$check_info=false;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$login_account=$_POST["login_account"];
			$login_password=$_POST["login_password"];
			$is_developer=$_POST["is_developer"];

			$servername = "localhost";
			$username = "HHJ";
			$password = "S10459015";
			$dbname = "ezgame_database";
			$conn = new mysqli($servername, $username, $password, $dbname);
			mysqli_query($conn,"SET NAMES 'utf8'");

   			if(!empty($login_account)&&!empty($login_password)){
   				if($is_developer==0){
   					$check_null=TRUE;
   					$sql = "SELECT User_account, User_password ,User_state FROM user WHERE User_account='$login_account' and User_password='$login_password'";
					$result = $conn->query($sql);
				}
				else{
					$check_null=TRUE;
					$sql = "SELECT Developer_account, Developer_password ,Developer_state FROM developer WHERE Developer_account='$login_account' and Developer_password='$login_password'";
					$result = $conn->query($sql);
				}
   			}
   			else $check_null=FALSE;
		}
	?>
	<div style="background:#000; color:#FFF">
		<a href="index.php" target＝_blank><img src="/img/EZ_GAME.png"></a>
		<img src="/img/login.png"><br>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br><br>
		<div class="middle">
			<img src="/img/login.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
			到現有的EZ-GAME平臺賬號&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<p>
					<br>請選擇登入的身份 : 會員<input type="radio" name="is_developer" value="0" checked>
					開發商<input type="radio" name="is_developer" value="1"><br><br>
					EZ-GAME平臺賬號 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="login_account" size="20" value="<?php echo $login_account;?>"><br>
					密碼 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="password" name="login_password" size="20" value="<?php echo $login_password;?>"><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if($check_null===FALSE)
								{
									echo "<script>alert('登入失敗，請根據提示修改登入資料。');</script>";
									echo "請補全登入資料";
								}
								else if($result->num_rows==0)
								{
									echo "<script>alert('登入失敗，請根據提示修改登入資料。');</script>";
									echo "您输入的賬號或密码错误";
								}
								else{
									while($row = $result->fetch_assoc()){
										if($is_developer==0){
											if($row["User_state"]=='N'){
												echo "該會員賬號已被封禁";
											}
											else $check_info=TRUE;
										}
										else{
											if($row["Developer_state"]=='N'){
												echo "該開發商賬號已被封禁";
											}
											else $check_info=TRUE;
										}	
									}
								}
							}
						?>
					</font><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Click here :<input type="image" name="submit" value="1" src="/img/login.png"><br>
				</p>
			</form>
			&nbsp;還沒有EZ-GAME賬號?<a href="user_register.php" target＝_blank><img src="/img/register.png"></a>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
	<?php
		if($check_info==TURE){
			$conn->close();
			if($is_developer==0){
				echo "<script>alert('登入成功，即將跳轉到會員頁面。');</script>";
				echo "<form id='jump_with_post' name='jump_with_post' action='login_info_handler.php' method='post'>";
				//echo "<input type='hidden' name='login' value='TRUE'>";
				echo "<input type='hidden' name='login_type' value='user'>";
				echo "<input type='hidden' name='account' value='".$login_account."'>";
				echo "</form>";
				echo "<script>document.forms['jump_with_post'].submit();</script>";
			}
			else{
				echo "<script>alert('登入成功，即將跳轉到開發商頁面。');</script>";
				echo "<form id='jump_with_post' name='jump_with_post' action='login_info_handler.php' method='post'>";
				//echo "<input type='hidden' name='login' value='TRUE'>";
				echo "<input type='hidden' name='login_type' value='developer'>";
				echo "<input type='hidden' name='account' value='".$login_account."'>";
				echo "</form>";
				echo "<script>document.forms['jump_with_post'].submit();</script>";
			}
		}
	?>
</body>
</html>