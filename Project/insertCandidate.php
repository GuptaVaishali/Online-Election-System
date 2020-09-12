<?php
$cname=$_POST['cname'];
$gen=$_POST['Gender'];
$mb=$_POST['coun-code'].$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$des=$_POST['description'];
$eid=$_POST['eid'];
$img=$_FILES['image']['name'];
//DB
$host="www.db4free.net";
$dbusername="sumit_nagpal";
$dbpassword="Sumit@123";
$dbname="spmdata";
//connection
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO candidate (cname, gen, mob, email, address, des,image_name,eid)
VALUES ('$cname', '$gen', '$mb', '$email', '$address', '$des','$img','$eid')";

if ($conn->query($sql) === TRUE) {
	move_uploaded_file($_FILES['image']['tmp_name'],"image_folder/$img");
    ?>
    <script>
    alert("New record created successfully");
    </script>
    <?php
    include 'candidate.php';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>