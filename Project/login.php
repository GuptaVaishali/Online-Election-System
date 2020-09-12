<?php


$vid=$_POST['vid'];
$password=$_POST['password'];

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
	$sql = mysqli_query($conn, "SELECT * FROM voter WHERE vid ='$vid' and password='$password'");
	$row = mysqli_num_rows($sql);
	if(!$sql)
	{
			?>
			<html>
				<body>
					<script>
						alert('DB is down, Please try later');
					</script>
				</body>
			</html>
			<?php

	}
	if ($row==1)
	{
		include 'pendingElection.php';
	}
	else
		{	
			?>
			<html>
				<body>
					<script>
						alert('Username/Password Not Found');
					</script>
				</body>
				</html>	
				<?php
				include 'login.html';	

		}
}

$conn->close();
?>