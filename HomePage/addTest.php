<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QA Times</title>
  <link rel="stylesheet" href="./add.css">
  <link rel="stylesheet" href="../navigation.css">
</head>
<body>
<?php 
  session_start();
  if(!isset($_SESSION['msg'])){
    ?>
    <script type="text/javascript">
        alert("Login first");
        window.location="../LoginPage/userLogin.php";
    </script>
    <?php
    unset($_SESSION['msg']);
  }else{ ?>
  <div class="navigation-formate" id="id">
    <nav>
      <div class="abc" id="nav">
        <ul>
          <li class="links">
            <div class="ncontainer icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div></li>
          <li class="links"><a href="../IndexPage/index.php">Home</a></li>
          <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
          <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
          <li>
            <div class="outbtn">
              <button onclick="backH()" id="outbtn">Back</button>
            </div>
          </li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
  
  <div class="main-box">
    <div class="card">
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Add Assessment</h1>
        </center>
        <form action="" method="post" name="form2">
          <div class="row">
            <div class="col-25">9
              <label>Assessment name</label>
            </div>
            <div class="col-75">
              <input type="text" id="title" name="title" placeholder="Enter name of assessment..." required>
            </div>
          </div>
          <div class="row">
            <input id="addT" name="addT" type="submit" value="Add Assessment">
          </div>
          <div class="img">
          <img src="../Images/img22.png" width="45%" height="45%" style="padding-left: 20px;margin-top: -25px;">
         </div>
        </form>
      </div>
    </div>
  </div>
  <?php
    if(isset($_POST["addT"])){
      $id=$_SESSION['user'];
      mysqli_query($con,"insert into assessment values(NULL,'$_POST[title]', 0 ,$id,now(),now(),'self',0)");
      ?>
        <script type="text/javascript">
          alert("Assessment created..")
          window.location="./fHome.php";
        </script>
      <?php
    }
  }
  ?>
  <script type="text/javascript">
    function backH(){
      window.location="./fHome.php";
    }
  </script>
</body>
</html>