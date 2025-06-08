<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="aStyle.css">
    <link rel="stylesheet" href="../navigation.css">
    <title>QA Times</title>
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
              <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
              <li class="links"><a href="./profileView.php?apview=<?php echo $_SESSION['user']?>">Account</a></li>
              <li><input type="submit" value="Logout" onclick="logout()" id="outbtn"></li>
            </ul>
          </div>
          <div class="heading">
            <img src="../Images/icon.png" height="40px" width="60px">
            QA Times
          </div>
        </nav>
    </div>
    <?php
    $q1="select count(id) as total from assessment";
    $q2="select count(id) as total from assessment where qTotal=0";
    $q3="select count(id) as total from faculty";

    $res1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
    $res2=mysqli_query($con,$q2) or die("database error:".mysqli_error($con));
    $res3=mysqli_query($con,$q3) or die("database error:".mysqli_error($con));
    $row1=mysqli_fetch_array($res1);
    $row2=mysqli_fetch_array($res2);
    $row3=mysqli_fetch_array($res3);
    ?>
    <div class="main">
      <div class="top">
        <img id="img1" src="../Images/img1.jpg">
        <img id="img2" src="../Images/img14.jpg">
        <img id="img3" src="../Images/img1.jpg">
      </div>
      <div class="card">
        <a class="link" href="./aView.php?list=afaculty">
          <div class="one">
            <h2>Faculty</h2>
            <div class="info">
              <span>Total faculty: <?php echo $row3['total'];?></span>
            </div>  
          </div>
        </a>
        <a class="link" href="./aView.php?list=atest">
          <div class="one">
            <h2>Assessment</h2>
            <div class="info">
              <span>Total Quiz: <?php echo $row1['total'];?></span>
              <span>Empty Quiz: <?php echo $row2['total'];?></span>
            </div>
          </div>
        </a>
      </div>
    </div>
    <?php
    $count=0;
    $avtar=array("../Images/Bavtar1.png","../Images/Bavtar2.png","../Images/Bavtar3.png","../Images/Gavtar1.png","../Images/Gavtar2.png","../Images/Gavtar3.png");

    $q="select * from message where fromId=0 and status=-1 and (toId=$_SESSION[user] or toId=-1)";
    $res=mysqli_query($con,$q);
    $count=mysqli_num_rows($res);
    if($count!=0){ ?>
      <div class="message">
        <h2>Message Section</h2>
        <hr/>
        <?php 
        while($record=mysqli_fetch_assoc($res)){ 
          shuffle($avtar);
          ?>
          <div class="m-top">
            <div class="m-left">
              <img src="<?php echo $avtar[0];?>">
            </div>
            <div class="m-right">
              <h3>Super admin</h3>
              <span><?php echo $record['message'];?></span>
              <br/>
              <i class="fas fa-check" onclick="smsgapprov(<?php echo $record['id'];?>)"></i>
              <i class="fas fa-times" onclick="smagdecline(<?php echo $record['id'];?>)"></i> 
            </div>
          </div>
          <hr/>
        <?php } ?>
      </div>
    <?php 
    }
  } ?>
  
  <script type="text/javascript" src="./route.js"></script>
</body>
</html>