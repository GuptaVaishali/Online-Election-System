<?php
$vid=$_POST['id'];
$pass=$_POST['pass'];

if($vid=="ADMIN" and $pass=="12345")
{
	include 'addElection.html'; 
}
else
{
?>
<html>
<body>
  <script>
  alert("Incorrect Id/Password Combination");
  </script>
 </body>
 </html>
<?php
	 include 'onlineElection.html';
}
?> 
