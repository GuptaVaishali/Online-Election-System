<?php
$vid=$_POST['vid'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Election</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
      function checking()
      { 
          var selection=document.getElementById("selection").value;
          if(selection=="")
          {
            alert("You don't have any Pending Election to vote for");
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
            <h1 class="text-center">Pending Election <small>Each Vote Counts</small></h1>
          </div>
        </div>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="jumbotron col-md-4 col-md-offset-4">
            <form id="login" action="casteVote.php" class="well" onsubmit="return checking()" method="post">
                <input type="hidden" name="vid" value=<?php echo "'$vid'"?> >
                <div class="form-group">
                    <label ><h4>Election Title</h4></label>
                    <select name="selection" id="selection" >
                   <?php
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
                      $sql=mysqli_query($conn,"select ADDTIME(CURTIME(), '5:30:0') as time from dual");
                       $row = mysqli_fetch_array($sql);
                       
                       if($row['time']>='24:0:0')
                       {
                          $sql = mysqli_query($conn, "SELECT title,electionid,enddate,endtime From election where electionid in(select distinct eid from candidate where eid not in (select eid from caste where vid='$vid')) and enddate=ADDDATE(CURDATE(),1) and endtime > ADDTIME(CURTIME(), '-18:30:0') ");
                       }
                       else
                       {
                          $sql = mysqli_query($conn, "SELECT title,electionid,enddate,endtime From election where electionid in(select distinct eid from candidate where eid not in (select eid from caste where vid='$vid')) and enddate=CURDATE() and endtime > ADDTIME(CURTIME(), '5:30:0')");
                        }
                           while ($row = mysqli_fetch_array($sql))
                          {
                            echo "<option value='". $row['electionid'] ."'>" .$row['title'] ."</option>" ;
                          }
                          
                    }
                    ?>
                  </select> 
                </br>
                  <button type="submit" class="btn btn-info">Submit</button>
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
