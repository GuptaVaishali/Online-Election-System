<?php
$eid=$_POST['selection'];
$vid=$_POST['vid'];
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Caste Vote</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
      function checking()
      {
        
        var can=document.getElementById("candidate").value;
        
        if ($("input[type=radio]:checked").length > 0)
          return true;
        else
        {
          alert("Please Select the Candidate");
          return false;
        }
      }

      if(isset($_POST['submit']))
   {
    /*other variables*/
    //$candidate = $_POST["abc"];
   }
      
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
        </div>
              <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Caste</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome,<?php echo "$vid" ?> </a></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>


    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Cast Vote <small>Each Vote Counts</small></h1>
          </div>
        </div>
      </div>
    </header>
    <section id="main">
      <div class="container">

        <div class="row">
          <div class="jumbotron col-md-4 col-md-offset-4">
            <form  id="login" action="countUpdate.php" class="well" onsubmit="return checking()" method="post" >
              
              <input type="hidden" name="vid" value=<?php echo "'$vid'"?> />
              <input type="hidden" name="eid" value=<?php echo "'$eid'"?> />
                <div class="form-group">
                    <div class="input-group">      
                          <p class="bg-success">Select Candidate</p></br>
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
                              $result = mysqli_query($conn,"SELECT title from election where electionid='$eid'"); 
   if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
                              $row = mysqli_fetch_array($result);    
                              ?> <h4><?php print_r($row['title']);?> </h4></br>
                              <?php 
                              $sql = mysqli_query($conn, "SELECT cname from candidate where eid='$eid'");
                              $row = mysqli_num_rows($sql);
                               while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
                                {
                                $name=$row["cname"];
                                ?>
                                <input type="radio" id="candidate" name="abc" value=<?php echo "'$name'"?> /><?php echo "$name"?>
                                <a href="viewProfile.php?name=<?php echo $name ?>" onclick="window.open( "viewProfile.php?name=<?php echo $name ?>", 'View Candidate' ); return false" target="_blank">View Profile</a>
                                </br>
                                <?php
                              }
                            }
                            ?>

                    </div></br>
                    <button type="submit" class="btn btn-warning">Vote</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright Election, &copy; 2020</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
