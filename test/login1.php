<html>
<fieldset>
	<legend>Login </legend>
	<form action="" method="POST"><br><br>
		Username:<input type="text" required="" name="uname"><br><br>
		Password:<input type="text" required="" name="upassword"><br><br>
		<input type="checkbox" value="1" name="remember">remember:
		<input type="submit" value="Login" name="sub">
		<br>
		<?php
		if (isset($_REQUEST["err"]))
			$msg = "Invalid username or Password";
		?>

		<?php if (isset($msg)) {

			echo $msg;
		}
		//$$$$$$$$$$

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "demo-db";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		if (isset($_REQUEST['sub'])) {

			$a = $_REQUEST['uname'];
			$b = $_REQUEST['upassword'];
			$sqli = "select* from login.new_table where name like '".$a."' and pass like '".$b."'";

			//$res = mysqli_query($cser,"select* from `login`.new_table where uname like '".$a."' and password like '".$b."'");
			$result=$conn->query($sqli)->fetch_assoc();
			//print_r($result);
			if ($result) {
				if (isset($_REQUEST["remember"]) && $_REQUEST["remember"] == 1)
					setcookie("login", "1", time() + 60); // second on page time 
				else
					setcookie("login", "1");
					
				header("location:/connect/index.php");
			} else {
				//header("location:login.php?err=1");
				echo " Username or Password Invalid ";
			}
		}
		?>
		</p>

	</form>

</fieldset>

</html>