<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Candidate</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script>
    function checking() {
      var name = document.getElementById("name").value;
      var address = document.getElementById("address").value;
      var img = document.getElementById("img").value;
      var mobile = document.getElementById("mobile").value;
      if (name == "") {
        alert('Please Enter Name');
        return false;
      }
      if (mobile.length != 10) {
        alert('Please Enter valid Mobile No.');
        return false;
      }
      if (mobile == "") {
        alert('Please Enter Mobile No.');
        return false;
      }

      if (address == "") {
        alert('Please Enter Address');
        return false;
      }
      if (img == "") {
        alert('Please Upload Picture');
        return false;
      } else {
        // alert("Successfully added");
        return true;
      }
    }
  </script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="candidate.php">Add Candidate</a></li>
            <li><a href="addElection.html">Add New Election</a></li>
            <li><a href="result.php?name=Admin">Result</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, Admin</a></li>
            <li><a href="onlineElection.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Candidate Register</h1>
          </div>
        </div>
      </div>
    </header>

  <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="Add Candidate" action="insertCandidate.php" class="well" method="post" onsubmit="return checking()"
            enctype="multipart/form-data">
      <div class="form-group">
        <label for="elecid">Election Title</label>
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

                        $query=mysqli_query($conn,"select * from election");
                        
                        $rowcount=mysqli_num_rows($query);
                        if($rowcount==0)
                        {
                          ?>
                          <script>
                          alert("Add Election First");
                          </script>
                        <?php
                        }
        ?> 
                        <select class="form-control" id="elecid" name="eid">
        <?php
                        for($i=1;$i<=$rowcount;$i++)
                        {
                            $row=mysqli_fetch_array($query);
        ?>
                          <option value='<?php echo $row["electionid"] ?>' > <?php echo $row["title"] ?> </option>
        <?php
                        }
                      }
        ?>
        </select>
      </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter Name" id="name" name="cname" required>
            </div>
            <div class="form-group">
              <label>Gender </label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" value="male" id="gen1" checked> 
          <label class="form-check-label" for="gen1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" value="female" id="gen2">
          <label for="gen2" class="form-check-label">Female</label>
        </div>
            </div>
            <div class="form-group">
              <label>Mobile No.</label>
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>

                <select class="custom-select" style="max-width: 120px;" name="coun-code">
                  <option selected="">+91</option>
                  <option value="1">+96</option>
                  <option value="2">+98</option>
                  <option value="3">+70</option>
                </select></div>
              <input class="form-control" placeholder="Phone number" type="number" id="mobile" name="mobile" required>
              </div>
                <div class="form-group">
                  <label>Enter your email</label>
                  <input type="email" class="form-control" placeholder="@hmail.com" id="email" name="email" required>
                </div>

                <div class="form-group">
                  <label>Enter Address</label>
                  <input type="text" class="form-control" placeholder="1234 Main St" id="address" name="address"
                    required>
                </div>
                <div class="form-group">
                  <label>Upload Picture</label>
                  <input type="file" id="image" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01" name="image">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description">
                </div>
          <button type="submit" name="submit" class="btn btn-success btn-xs">Submit</button>
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