<?php
$cname = $_POST["abc"];
$vid=$_POST['vid'];
$eid=$_POST['eid'];

//DB
$host="www.db4free.net";
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
	
	$query = "SELECT cid from candidate where cname='$cname'";
	
	$result = mysqli_query($conn, $query);
	$sql = $result->fetch_array(MYSQLI_ASSOC);
	$canid=$sql['cid'];
	$sql= "INSERT into caste values ('$canid','$vid','$eid')";
	if($conn->query($sql))
	{
	}
	else
		{
			printf("Error: %s\n", mysqli_error($conn));
			?>
			<html>	
				<body>
					<script>
						alert("Db is down, Please try later1");
					</script>
				</body>
				</html>
				<?php
		}
		$result = mysqli_query($conn,"SELECT count from counting where cid='$canid' and Eid='$eid'"); 
     	$row = mysqli_num_rows($result);
     	if($row!=1)
     	{
     		$sql = "INSERT INTO counting values ('$eid','$canid',1)";
				if ($conn->query($sql))
				{		
				}
				else
				{
				printf("Error: %s\n", mysqli_error($conn));		
					?>
						<html>	
							<body>
								<script>
									alert("Db is down, Please try later2");
								</script>
							</body>
							</html>
							<?php	
     			}
     	}
     	else
     	{
     		$sql="UPDATE counting SET count =count+1 WHERE Eid = '$eid' and cid = '$canid'";
     		if ($conn->query($sql))
				{		
				}
			else
			{
				echo "Count not Updated";
			}

     	}
}	
include 'PendingElection.php';
?>
