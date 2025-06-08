<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./userLogin.css">
  <link rel="stylesheet" href="../navigation.css">
  <title>QA Times</title>
</head>
<body>
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
  <div class="main-container">
    <div class="card">
      <div class="img">
        <img id="img" src="../Images/bg-LR.png">
      </div>
      <div class="container">
        <center>
          <img src="../Images/img20.png" width="400px"/>
          <h1 style="margin: 0;">Login</h1>
        </center>
        <form action="" method="post" name="form1">
          <div class="row">
            <div class="col-25">
              <label for="role">Role</label>
            </div>
            <div class="col-75">
              <select id="role" name="role" required>
                <option value="">Select role</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="admin">Admin</option>
                <option value="superAdmin">Super admin</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="uname">UserName</label>
            </div>
            <div class="col-75">
              <input type="text" id="uname" name="username" placeholder="Your username...">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="password">Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="password" placeholder="Your password...">
            </div>
          </div>
          <div class="row">
            <input id="submit" name="login" type="submit" value="Submit">
          </div>
        </form>
        <div class="last-section">
          <a href="../mail.php?forgot=1" style="text-decoration: none;color: darkblue;">Forgot password??</a><br/>
          Don't have an account?
          <a href="../RegistrationPage/registration.php" style="text-decoration: none;color: darkblue;">Signup</a> Here
        </div>
      </div>
    </div>
  </div>

<?php
session_start();
$_SESSION['user']="";

if(isset($_POST["login"])){
  if($_POST["role"]=="student"){
    $res=mysqli_query($con,"select number,username,password from student where username='$_POST[username]' and password='$_POST[password]'");
    $count=mysqli_num_rows($res);
    if($count==0){
      ?>
        <script type="text/javascript">
          alert("Invalid username password!!");
        </script>
      <?php
    }else{
      $row=mysqli_fetch_array($res);
      $_SESSION['user']=$row['number'];
      $_SESSION['msg']="login";
      $_SESSION['std']="student login";
      ?>
        <script type="text/javascript">
          window.location="../HomePage/sHome.php";
        </script>
      <?php
    }
  }else if($_POST["role"]=="faculty"){
    $res=mysqli_query($con,"select id,username,password from faculty where username='$_POST[username]' and password='$_POST[password]'");
    $count=mysqli_num_rows($res);
    if($count==0){
      ?>
        <script type="text/javascript">
          alert("Invalid username password!!");
        </script>
      <?php
    }else{
      $row=mysqli_fetch_array($res);
      $_SESSION['user']=$row['id'];
      $_SESSION['msg']="login";
      ?>
        <script type="text/javascript">
          window.location="../HomePage/fHome.php";
        </script>
      <?php
    }    
  }else if($_POST["role"]=="admin"){
    $res=mysqli_query($con,"select id,username,password from admin where username='$_POST[username]' and password='$_POST[password]' and status=1");
    $count=mysqli_num_rows($res);
    if($count==0){
      ?>
        <script type="text/javascript">
          alert("Invalid username password or you may rejected by superAdmin!!");
        </script>
      <?php
    }else{
      $row=mysqli_fetch_array($res);
      $_SESSION['user']=$row['id'];
      $_SESSION['msg']="login";
      ?>
        <script type="text/javascript">
          window.location="../HomePage/aHome.php";
        </script>
      <?php
    }    
  }else if($_POST['role']=="superAdmin"){
    if($_POST['username']=="superAdmin" && $_POST['password']=="Sp@123"){
      $_SESSION['msg']="login";
      ?>
      <script type="text/javascript">
        window.location="../HomePage/asHome.php";
      </script>
      <?php
    }else{
      ?>
        <script type="text/javascript">
          alert("Invalid username password!!");
        </script>
      <?php
    }
  }
}
?>
<script type="text/javascript">
  function myFunction(y) {
      y.classList.toggle("change");
      var x = document.getElementById("nav");
      if (x.className === "abc") {
        x.className += " responsive";
      } else {
        x.className = "abc";
      }
    }
</script>
</body>
</html>