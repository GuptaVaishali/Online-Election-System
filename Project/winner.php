<?php
$eid=$_POST['selection'];
$vid=$_POST['vid'];
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Winner</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
      function checking()
      { 
          var selection=document.getElementById("selection").value;
          if(selection=="")
          {
            alert("Result is not declared yet");
            return false;
          }
          else
            return true;
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
            <li><a href="result.php?name=<?php echo $vid ?>">Result</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo "$vid" ?></a></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Result</h1>
          </div>
        </div>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="jumbotron col-md-4 col-md-offset-4">
            <form id="login" action="winner.php" class="well" onsubmit="return checking()" method="post">
                  <input type="hidden" name="vid" value=<?php echo "'$vid'"?> >
                  <p class="bg-success">Winner is</p>
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
                              
                              $sql = mysqli_query($conn, "select cname from candidate where cid in (SELECT cid FROM counting where count=(select max(count) from counting where eid='$eid') and Eid='$eid')");

                              if($row = mysqli_fetch_array($sql))
                              {
                              }
                              else
                              {
                                printf("Error: %s\n", mysqli_error($conn));
                                ?>
                                      <html>  
                                        <body>
                                          <script>
                                            alert("DB is down, Please try later");
                                          </script>
                                        </body>
                                        </html>
                                        <?php 
                              }


                              ?>
                              <a href="viewProfile.php?name=<?php print_r($row['cname']); ?>" onclick="window.open( "viewProfile.php?name=<?php print_r($row['cname']); ?>", 'View Candidate' ); return false" target="_blank"><h3><?php print_r($row['cname']); ?></h3></a>
                            </br>
                              <?php
                              } 
                              ?>
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