<?php
    include "./connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./mail.css">
  <link rel="stylesheet" href="./navigation.css">
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
          <li class="links"><a href="./IndexPage/index.php">Home</a></li>
          <li class="links"><a href="./LoginPage/userLogin.php">SignIn</a></li>
          <li class="links"><a href="./RegistrationPage/registration.php">SignUp</a></li>
          <li class="links"><a href="./ContectPage/contect.php">Contect us</a></li>
        </ul>
      </div>
      <div class="heading">
        <img src="./Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
<div class="main-box">

<?php
  if(isset($_GET["forgot"])){
    ?>
    <div class="card">
    <div class="container">
      <center>
        <h1 style="margin: 0;margin-bottom: 10px;">Password Recovery</h1>
      </center>
      <form action="" method="post" name="form2">
        <div class="row">
          <div class="col-25">
            <label>Recovery mail</label>
          </div>
          <div class="col-75">
            <input type="email" id="mail" name="mail" placeholder="Enter name of email..." required>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Username</label>
          </div>
          <div class="col-75">
            <input type="text" id="uname" name="uname" placeholder="Enter name of username..." required>
          </div>
        </div>
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
            </select>
          </div>
        </div>
        <div class="row">
          <input id="getpass" name="send" type="submit" value="Send Password">
        </div>
      </form>
    </div>
    </div>
    <?php
    if(isset($_POST["send"])){
      $mail=$_POST['mail'];
      if($_POST["role"]=="student"){
        $q="select * from student where username='$_POST[uname]'";
      }else if($_POST["role"]=="faculty"){
        $q="select * from faculty where username='$_POST[uname]'";
      }else if($_POST["role"]=="admin"){
        $q="select * from admin where username='$_POST[uname]'";
      }
      $result=mysqli_query($con,$q);
      $count=mysqli_num_rows($result);
      $count=mysqli_num_rows($result);
      if($count==0){
        ?>
        <script type="text/javascript">
          alert("Username not found pleasw check again..");
        </script>
        <?php
      }else{
        while($record=mysqli_fetch_assoc($result)){
          $name=$record['name'];
          $password=$record['password'];
          $email=$record['email'];
          ?>
          <script type="text/javascript">
            alert("Username=<?php echo $_POST['uname']?> \nName=<?php echo $name?> \nPassword=<?php echo $password?> \nRegistred email=<?php echo $email?>");
            window.location="./LoginPage/userLogin.php";
          </script>
          <?php
        }
      }
    }
  }
?>
</div>

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