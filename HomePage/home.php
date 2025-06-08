<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Times</title>
    <link rel="stylesheet" href="./sStyle.css">
    <link rel="stylesheet" href="../navigation.css">
</head>
<body>
<div class="navigation-formate" id="id" style="background:black;">
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
          <li class="links"><a href="../LoginPage/userLogin.php">SignIn</a></li>
          <li class="links"><a href="../RegistrationPage/registration.php">SignUp</a></li>
          <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
          <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
    <div class="container">
        <div class="card">
          <?php
          
          $q="select id,title, qTotal, creater from assessment";
          $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
          while($record=mysqli_fetch_assoc($result)){
            if($record['qTotal']>0){
            $q1="select name from faculty where id=$record[creater]";
            $res=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
            while($ans=mysqli_fetch_assoc($res)){
          ?>
            <div class="item">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="./sHome.php" class="link">
                    <div class="bg"></div>
                    <div class="title">
                      <?php echo $record['title']; ?>
                    </div>
                    <div class="q-box">
                      Total questions: <?php echo $record['qTotal']; ?>
                    </div>
                    <div class="a-box">
                        - <?php echo $ans['name']; ?>
                    </div>
                    <div class="bg1"></div>
                </a>
            </div>
          <?php }}}?>
        </div>
    </div>
    <script type="text/javascript" src="./route.js"></script>
</body>
</html>