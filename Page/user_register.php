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
		$User_account=$User_password=$User_password_check=$User_name=$User_idcard_number=$User_phone_number="";
		$check_account=$check_password=$check_name=$check_idcard_number=$check_phone_number=FALSE;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$User_account=$_POST["User_account"];
   			$User_password = $_POST["User_password"];
   			$User_password_check = $_POST["User_password_check"];
   			$User_name = $_POST["User_name"];
   			$year=$_POST["year"];
   			$month=$_POST["month"];
   			$day=$_POST["day"];
   			$date=$year."-".$month."-".$day;
   			$User_gender = $_POST["User_gender"];
   			$User_idcard_number = $_POST["User_idcard_number"];
   			$User_phone_number=$_POST["User_phone_number"];
   			
			$servername = "localhost";
			$username = "HHJ";
			$password = "S10459015";
			$dbname = "ezgame_database";
			$conn = new mysqli($servername, $username, $password, $dbname);
			mysqli_query($conn,"SET NAMES 'utf8'");

   			if(!empty($User_account)){
   				$sql = "SELECT User_account FROM user WHERE User_account='$User_account'";
				$result = $conn->query($sql);
   			}
		}
	?>
	<div style="background:#000; color:#FFF">
		<a href="index.php" target＝_blank><img src="/img/EZ_GAME.png"></a>
		<img src="/img/register.png"><br>
		<img src="/img/hew_2018.jpg" width="100%" height="24.907%"><br>
		<div class="middle">
			<br>請選擇要注冊的對象 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/img/user_onx.png">&nbsp;&nbsp;&nbsp;
			<a href="developer_register.php" target＝_blank><img src="/img/developer.png"></a>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<p>
					標有<font color="#FF0000"> * </font>的為必填資料&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
					創建EZ-GAME平臺賬號 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="User_account" size="20" value="<?php echo $User_account;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($User_account))
								{
									echo "賬號不能為空";
								}
								else if(isset($User_account{20}))
								{
									echo "賬號長度過長(不能超過20個字符)";
								}
								else if($result->num_rows>0)
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
					<input type="password" name="User_password" size="20" value="<?php echo $User_password;?>"/><font color="#FF0000"> *</font><br>
					請重新輸入密碼 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="password" name="User_password_check" size="20" value="<?php echo $User_password_check;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($User_password))
								{
									echo "密碼不能為空";
								}
								else if(isset($User_password{20}))
								{
									echo "密碼長度過長(不能超過20個字符)";
								}
								else if($User_password_check!=$User_password)
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
					<input type="text" name="User_name" size="20" value="<?php echo $User_name;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($User_name))
								{
									echo "名稱不能為空";
								}
								else if(isset($User_name{20}))
								{
									echo "名稱長度過長(不能超過20個字符)";
								}
								else{
									//echo "name ok";
									$check_name=TRUE;
								}
							}
						?>
					</font><br>
					您的生日 :&nbsp;
						<select name="year">
							<option value="1900">1900</option>
							<option value="1901">1901</option>
							<option value="1902">1902</option>
							<option value="1903">1903</option>
							<option value="1904">1904</option>
							<option value="1905">1905</option>
							<option value="1906">1906</option>
							<option value="1907">1907</option>
							<option value="1908">1908</option>
							<option value="1909">1909</option>
							<option value="1910">1910</option>
							<option value="1911">1911</option>
							<option value="1912">1912</option>
							<option value="1913">1913</option>
							<option value="1914">1914</option>
							<option value="1915">1915</option>
							<option value="1916">1916</option>
							<option value="1917">1917</option>
							<option value="1918">1918</option>
							<option value="1919">1919</option>
							<option value="1920">1920</option>
							<option value="1921">1921</option>
							<option value="1922">1922</option>
							<option value="1923">1923</option>
							<option value="1924">1924</option>
							<option value="1925">1925</option>
							<option value="1926">1926</option>
							<option value="1927">1927</option>
							<option value="1928">1928</option>
							<option value="1929">1929</option>
							<option value="1930">1930</option>
							<option value="1931">1931</option>
							<option value="1932">1932</option>
							<option value="1933">1933</option>
							<option value="1934">1934</option>
							<option value="1935">1935</option>
							<option value="1936">1936</option>
							<option value="1937">1937</option>
							<option value="1938">1938</option>
							<option value="1939">1939</option>
							<option value="1940">1940</option>
							<option value="1941">1941</option>
							<option value="1942">1942</option>
							<option value="1943">1943</option>
							<option value="1944">1944</option>
							<option value="1945">1945</option>
							<option value="1946">1946</option>
							<option value="1947">1947</option>
							<option value="1948">1948</option>
							<option value="1949">1949</option>
							<option value="1950">1950</option>
							<option value="1951">1951</option>
							<option value="1952">1952</option>
							<option value="1953">1953</option>
							<option value="1954">1954</option>
							<option value="1955">1955</option>
							<option value="1956">1956</option>
							<option value="1957">1957</option>
							<option value="1958">1958</option>
							<option value="1959">1959</option>
							<option value="1960">1960</option>
							<option value="1961">1961</option>
							<option value="1962">1962</option>
							<option value="1963">1963</option>
							<option value="1964">1964</option>
							<option value="1965">1965</option>
							<option value="1966">1966</option>
							<option value="1967">1967</option>
							<option value="1968">1968</option>
							<option value="1969">1969</option>
							<option value="1970">1970</option>
							<option value="1971">1971</option>
							<option value="1972">1972</option>
							<option value="1973">1973</option>
							<option value="1974">1974</option>
							<option value="1975">1975</option>
							<option value="1976">1976</option>
							<option value="1977">1977</option>
							<option value="1978">1978</option>
							<option value="1979">1979</option>
							<option value="1980">1980</option>
							<option value="1981">1981</option>
							<option value="1982">1982</option>
							<option value="1983">1983</option>
							<option value="1984">1984</option>
							<option value="1985">1985</option>
							<option value="1986">1986</option>
							<option value="1987">1987</option>
							<option value="1988">1988</option>
							<option value="1989">1989</option>
							<option value="1990">1990</option>
							<option value="1991">1991</option>
							<option value="1992">1992</option>
							<option value="1993">1993</option>
							<option value="1994">1994</option>
							<option value="1995">1995</option>
							<option value="1996">1996</option>
							<option value="1997">1997</option>
							<option value="1998">1998</option>
							<option value="1999">1999</option>
							<option value="2000">2000</option>
							<option value="2001">2001</option>
							<option value="2002">2002</option>
							<option value="2003">2003</option>
							<option value="2004">2004</option>
							<option value="2005">2005</option>
							<option value="2006">2006</option>
							<option value="2007">2007</option>
							<option value="2008">2008</option>
							<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018" selected="selected">2018</option>
						</select> 年
						<select name="month">
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select> 月
						<select name="day">
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select> 日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
					您的性別 : 男<input type="radio" name="User_gender" value="M" checked> 女<input type="radio" name="User_gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
					您的身份證字號 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="User_idcard_number" size="20" value="<?php echo $User_idcard_number;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($User_idcard_number))
								{
									echo "身份證字號不能為空";
								}
								else if(isset($User_idcard_number{20}))
								{
									echo "身份證字號長度過長(不能超過20個字符)";
								}
								else{
									//echo "idcard ok";
									$check_idcard_number=TRUE;
								}
							}
						?>
					</font><br>
					您的電話號碼 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<input type="text" name="User_phone_number" size="20" value="<?php echo $User_phone_number;?>"/><font color="#FF0000"> *</font><br>
					<font color="#FF0000">
						<?php 
							if(isset($_POST['submit']))
							{
								if(empty($User_phone_number))
								{
									echo "電話號碼不能為空";
								}
								else if(isset($User_phone_number{20}))
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
		if(!empty($_POST["agree"])&&$check_account===TRUE&&$check_password===TRUE&&$check_name===TRUE&&$check_idcard_number===TRUE&&$check_phone_number===TRUE){
   			$sql = "SELECT User_id FROM user";
   			$find_num = $conn->query($sql);
   			$num=$find_num->num_rows;

  			$sql = "INSERT INTO user (User_id, User_account, User_password, User_name,User_birthday,User_gender,User_idcard_number,User_phone_number,User_state) VALUES ('$num', '$User_account', '$User_password', '$User_name','$date','$User_gender','$User_idcard_number','$User_phone_number','Y')";

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