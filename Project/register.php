<?php

$vname=$_POST['vname'];
$vid=$_POST['vid'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$address=$_POST['address'];
//DB
$host="www.db4free.net";
//www.db4free.net";
$dbusername="sumit_nagpal";
$dbpassword="Sumit@123";
$dbname="spmdata";

//connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error())
{
	die('Connect Error ('. mysqli_connect_errno() .') '.mysqli_connect_error());
}
else
{
	$sql = mysqli_query($conn, "SELECT * FROM voter WHERE vid ='$vid'");
	$row = mysqli_num_rows($sql);
	if($row)
	{
		?>
			<html>	
				<body>
					<script>
						alert("Login id already Exist,Please register again");
					</script>
				</body>
				</html>
				<?php	
				include 'register.html';
	}
	else
	{
	$sql = "INSERT INTO voter values ('$vname','$vid','$password','$repassword','$address')";

	if ($conn->query($sql))
		{

?>
			<html>	
				<body>
					<script>
						alert("Account Created successfully,Please login");
					</script>
				</body>
				</html>
				<?php	
		}
	
	
	include 'login.html';
	}
}
$conn->close();
	?>