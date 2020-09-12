<?php
$eid=$_POST['eid'];
$etopic=$_POST['etopic'];
$edate=$_POST['edate'];
$etime=$_POST['etime'];

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
	$sql = mysqli_query($conn, "SELECT * FROM election WHERE electionid ='$eid'");
	$row = mysqli_num_rows($sql);
	if($row)
	{
		?>
			<html>	
				<body>
					<script>
						alert("Election ID already Exist,Please Select New Election ID");
					</script>
				</body>
			</html>
		<?php	
	}
	else
	{
		$sql = "INSERT INTO election values ('$etopic','$edate','$etime','$eid')";
		if ($conn->query($sql))
		{
		?>
					<html>	
						<body>
							<script>
								alert("Election added successfully");
							</script>
						</body>
						</html>
		<?php	
		}
	}
	include 'addelection.html';
}
$conn->close();
?>