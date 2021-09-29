<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="EZ_x.ico" type="image/x-icon" />
	<title>EZ-GAME 注冊</title>
	<style> 
	.left{float: left}
	.right{float: right} 
	.middle{text-align: center}
</style>
</head>
<body background="/img/back.png">
	<?php
		header("Content-Type:text/html; charset=utf-8");
		$Developer_account=$Developer_password=$Developer_password_check=$Developer_name=$Developer_charger=$Developer_company_number=$Developer_phone_number=$Developer_address="";
		$check_account=$check_password=$check_name=$check_charger=$check_company_number=$check_phone_number=$check_address=FALSE;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$Developer_account=$_POST["Developer_account"];
   			$Developer_password = $_POST["Developer_password"];
   			$Developer_password_check = $_POST["Developer_password_check"];
   			$Developer_name = $_POST["Developer_name"];
   			$Developer_charger = $_POST["Developer_charger"];
   			$Developer_company_number = $_POST["Developer_company_number"];
   			$Developer_phone_number=$_POST["Developer_phone_number"];
   			$Developer_address=$_POST["Developer_address"];
   			
			$servername = "localhost";
			$username = "HHJ";
			$password = "S10459015";
			$dbname = "ezgame_database";
			$conn = new mysqli($servername, $username, $password, $dbname);
			mysqli_query($conn,"SET NAMES 'utf8'");

   			if(!empty($Developer_account)){
   				$sql = "SELECT Developer_account FROM developer WHERE Developer_account='$Developer_account'";
				$account_result = $conn->query($sql);
   			}
   			if(!empty($Developer_name)){
   				$sql = "SELECT Developer_name FROM developer WHERE Developer_name='$Developer_name'";
				$name_result = $conn->query($sql);
   			}
		}
	?>
	<div style="background:#000; color:#FFF">
		<a href="index.php" target＝_blank><img src="/img/EZ_GAME.png"></a>
		<img src="/img/register.png"><br>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br>
		<div class="middle">
			<br>請選擇要注冊的對象 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_register.php" target＝_blank><img src="/img/user.png"></a>&nbsp;&nbsp;&nbsp;
			<img src="/img/developer_x.png">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<p>
					標有<font color="#FF0000"> * </font>的為必填資料&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
					創建EZ-GAME平臺賬號 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_account" size="20" value="<?php echo $Developer_account;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_account))
								{
									echo "賬號不能為空";
								}
								else if(isset($Developer_account{20}))
								{
									echo "賬號長度過長(不能超過20個字符)";
								}
								else if($account_result->num_rows>0)
								{
									echo "該賬號已被使用";
								}
								else{
									//echo "account ok";
									$check_account=TRUE;
								}
							}
						?>
					</font><br>
					請輸入密碼 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="password" name="Developer_password" size="20" value="<?php echo $Developer_password;?>"/><font color="#FF0000"> *</font><br>
					請重新輸入密碼 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="password" name="Developer_password_check" size="20" value="<?php echo $Developer_password_check;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_password))
								{
									echo "密碼不能為空";
								}
								else if(isset($Developer_password{20}))
								{
									echo "密碼長度過長(不能超過20個字符)";
								}
								else if($Developer_password_check!=$Developer_password)
								{
									echo "兩次輸入的密碼不相同";
								}
								else {
									//echo "password ok";
									$check_password=TRUE;
								}
							}
						?>
					</font><br>
					請輸入您在平臺上的名稱 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_name" size="20" value="<?php echo $Developer_name;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_name))
								{
									echo "名稱不能為空";
								}
								else if(isset($Developer_name{20}))
								{
									echo "名稱長度過長(不能超過20個字符)";
								}
								else if($name_result->num_rows>0)
								{
									echo "該名稱已被使用";
								}
								else{
									//echo "name ok";
									$check_name=TRUE;
								}
							}
						?>
					</font><br>
					請輸入公司負責人的名稱 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_charger" size="20" value="<?php echo $Developer_charger;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_charger))
								{
									echo "負責人的名稱不能為空";
								}
								else if(isset($Developer_charger{20}))
								{
									echo "負責人的名稱長度過長(不能超過20個字符)";
								}
								else{
									//echo "charger ok";
									$check_charger=TRUE;
								}
							}
						?>
					</font><br>
					請輸入公司行號 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_company_number" size="20" value="<?php echo $Developer_company_number;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_company_number))
								{
									echo "公司行號不能為空";
								}
								else if(isset($Developer_company_number{8}))
								{
									echo "公司行號長度過長(不能超過8位數)";
								}
								else{
									//echo "company number ok";
									$check_company_number=TRUE;
								}
							}
						?>
					</font><br>
					請輸入公司聯係電話 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_phone_number" size="20" value="<?php echo $Developer_phone_number;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_phone_number))
								{
									echo "電話號碼不能為空";
								}
								else if(isset($Developer_phone_number{20}))
								{
									echo "電話號碼長度過長(不能超過20個字符)";
								}
								else{
									//echo "phone ok";
									$check_phone_number=TRUE;
								}
							}
						?>
					</font><br>
					請輸入公司地址 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="Developer_address" size="54" value="<?php echo $Developer_address;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($Developer_address))
								{
									echo "公司地址不能為空";
								}
								else if(isset($Developer_address{50}))
								{
									echo "公司地址長度過長(不能超過50個字符)";
								}
								else{
									//echo "address ok";
									$check_address=TRUE;
								}
							}
						?>
					</font><br>
					請同意以下注冊條款才能完成注冊&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<textarea disabled="disabled" style="width:400px;height:150px;border:none;resize:none;">1.條款一。&#10;&#10;2.條款二。&#10;&#10;3.條款三。&#10;&#10;4.條款四。&#10;&#10;5.條款五。&#10;&#10;6.條款六。
					</textarea><br>
					<input type="checkbox" name="agree" value="1">我同意以上條款&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']) && empty($_POST["agree"]))
							{
								echo "必須同意才能注冊";
							}
						?>
					</font><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Click here :<input type="image" name="submit" value="1" src="/img/register.png">
				</p>
			</form>
		</div>
		<img src="/img/bottom_x.png" width="100%" height="26.041%">
	</div>
	<?php
		if(!empty($_POST["agree"])&&$check_account===TRUE&&$check_password===TRUE&&$check_name===TRUE&&$check_charger===TRUE&&$check_company_number===TRUE&&$check_phone_number===TRUE&&$check_address===TRUE){
   			$sql = "SELECT Developer_id FROM developer";
   			$find_num = $conn->query($sql);
   			$num=$find_num->num_rows;

  			$sql = "INSERT INTO developer (Developer_id, Developer_account, Developer_password, Developer_name,Developer_charger,Developer_company_number,Developer_phone_number,Developer_address,Developer_state) VALUES ('$num', '$Developer_account', '$Developer_password', '$Developer_name','$Developer_charger','$Developer_company_number','$Developer_phone_number','$Developer_address','Y')";

			$is_registerd = $conn->query($sql);

			if($is_registerd === TRUE){
				$conn->close();
				echo "<script>alert('注冊成功，即將跳轉到登入頁面。');</script>";

				echo "<script language='javascript'>";
				echo "location='loginup.php';";
				echo "</script>";
			}
   		}
   		else if(isset($_POST['submit'])){
   			echo "<script>alert('注冊失敗，請根據提示修改注冊資料。');</script>";
   		}
	?>
</body>
</html>