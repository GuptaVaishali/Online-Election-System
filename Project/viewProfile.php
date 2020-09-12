<?php
$cname=$_GET['name'];


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Candidate</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
    	
    </script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Candidate</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Candidate Profile <small>Choose Wisely</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="casteVote.php" class="well" >
                  <div class="form-group">
                  	<?php
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

						//header("Content-type: image/png");
						//echo "<img src=<?$image' >";
						//echo "<br>";
						//echo 'img src="data:image/png;base64,'.$row['img'].'"/>';
						//echo 'img src="data:image/jpeg;base64,'.base64_encode($row['img']).'"/>';
                        ?>

                        <!-- <img src="<?php //echo 'image_folder/'.$row['img']; ?>"/> -->
                    	
								<html>	
									<body>
										<script>
											alert("Hope you would like this candidate");
										</script>
									</body>
									</html>
									<?php	
						$sql = mysqli_query($conn, "SELECT email,image_name,des From candidate where cname='$cname'");
						$row = mysqli_fetch_array($sql);
						$image=$row['image_name'];
						?>
						<img src="image_folder\<?php echo $image; ?>" height="300" width="300" alt="image" />
						
						</br>
                        <label>Name:</label>
                        <?php
                        print_r($cname);
                        ?>
                        </br><label>Email:</label>
                        <?php print_r($row['email']);
						?></br>
						<label>Description:</label>
						<?php print_r($row['des']);
					}
					$conn->close();
					?>
                   
                  </div>
                  <a href="" onclick=window.close() >Return</a>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright Election, &copy; 2020</p>
    </footer>

  </body>
</html>
