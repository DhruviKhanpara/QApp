<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
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
    $q4="select count(number) as total from student";
    $q5="select count(id) as total from admin";
    $q6="select count(id) as total from admin where status=0";
    $q7="select count(id) as total from message where toId=0";

    $res1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
    $res2=mysqli_query($con,$q2) or die("database error:".mysqli_error($con));
    $res3=mysqli_query($con,$q3) or die("database error:".mysqli_error($con));
    $res4=mysqli_query($con,$q4) or die("database error:".mysqli_error($con));
    $res5=mysqli_query($con,$q5) or die("database error:".mysqli_error($con));
    $res6=mysqli_query($con,$q6) or die("database error:".mysqli_error($con));
    $res7=mysqli_query($con,$q7) or die("database error:".mysqli_error($con));
    $row1=mysqli_fetch_array($res1);
    $row2=mysqli_fetch_array($res2);
    $row3=mysqli_fetch_array($res3);
    $row4=mysqli_fetch_array($res4);
    $row5=mysqli_fetch_array($res5);
    $row6=mysqli_fetch_array($res6);
    $row7=mysqli_fetch_array($res7);
    ?>
    <div class="main">
        <div class="top">
            <img id="img1" src="../Images/img1.jpg">
            <img id="img2" src="../Images/img14.jpg">
            <img id="img3" src="../Images/img1.jpg">
        </div>
        <a class="link" href="./aView.php?list=student">
            <div class="one">
                <h2>Student</h2>
                    <div class="info">
                    <span>Total student: <?php echo $row4['total'];?></span>
                </div>  
            </div>
        </a>
        <a class="link" href="./aView.php?list=admin">
            <div class="one">
                <h2>Admin</h2>
                <div class="info">
                    <span>Total admin: <?php echo $row5['total'];?></span>
                </div>  
            </div>
        </a>
        <a class="link" href="./aView.php?list=adminReq">
            <div class="one">
                <h2>Admin Request</h2>
                <div class="info">
                    <span>Total request: <?php echo $row6['total'];?></span>
                </div>  
            </div>
        </a>
        <a class="link" href="./aView.php?list=sfaculty">
            <div class="one">
                <h2>Faculty</h2>
                <div class="info">
                    <span>Total faculty: <?php echo $row3['total'];?></span>
                </div>
            </div>
        </a>
        <a class="link" href="./aView.php?list=stest">
            <div class="one">
                <h2>Assessment</h2>
                <div class="info">
                    <span>Total Quiz: <?php echo $row1['total'];?></span>
                    <span>Empty Quiz: <?php echo $row2['total'];?></span>
                </div>
            </div>
        </a>
        <a class="link" href="./aView.php?list=msglist">
            <div class="one">
                <h2>Message Section</h2>
                <div class="info">
                    <span>Total message: <?php echo $row2['total'];?></span>
                </div>
            </div>
        </a>
    </div>
    <?php 
  } ?>

    <script type="text/javascript" src="./route.js"></script>
</body>
</html>