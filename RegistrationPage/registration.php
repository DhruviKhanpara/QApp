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
  <link rel="stylesheet" href="./registration.css">
  <link rel="stylesheet" href="../navigation.css">
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
          <li class="links"><a href="../LoginPage/userLogin.php">SignIn</a></li>
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
<div class="opt" id="id01">
    <button onclick="displays()">Student Sign Up</button>
    <button onclick="displayf()">Faculty Sign Up</button>
    <button onclick="displaya()">Admin Request</button>
</div>

  <div class="main-container" id="id02">
    <span onclick="option()" class="close" title="Registration option">&times;</span>
    <div class="card">
      <div class="img">
        <img id="img" src="../Images/bg-LR.png">
      </div>
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Register</h1>
        </center>
        <form action="" method="post" name="form2">
          <div class="row">
            <div class="col-25">
              <label>Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="sname" name="sname" placeholder="Your name..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Gender</label>
            </div>
            <div class="col-75 radio">
              <input type="radio" id="male" name="gender" value="male">Male
              <input type="radio" id="female" name="gender" value="female">Female
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Username</label>
            </div>
            <div class="col-75">
              <input type="text" id="suname" name="suname" placeholder="Your username..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Email</label>
            </div>
            <div class="col-75">
              <input type="email" id="semail" name="semail" placeholder="Your Email..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Study In</label>
            </div>
            <div class="col-75">
              <select id="srole" name="srole" required>
                <option value="">Select your Standard</option>
                <option value="Below 10th">Below 10th</option>
                <option value="10th">10th</option>
                <option value="11th">11th</option>
                <option value="12th">12th</option>
                <option value="In Bachelor">In Bachelor</option>
                <option value="Complete Bachelor">Complete Bachelor</option>
                <option value="In Master">In Master</option>
                <option value="Complete Master">Complete Master</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="spwd" name="spassword" placeholder="Your password..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Confirm Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="scpwd" name="scpassword" placeholder="Your confirm password..." required>
            </div>
          </div>
          <div class="row">
            <input id="regStudent" name="stdR" type="submit" value="Register">
          </div>
        </form>
        <div>
          <img src="../Images/img22.png" width="45%" height="45%" style="padding-left: 20px;margin-top: -70px;">
        </div>
      </div>
    </div>
  </div>

  <div class="main-container" id="id03">
    <span onclick="option()" class="close" title="Registration option">&times;</span>
    <div class="card">
      <div class="img">
        <img id="img" src="../Images/bg-LR.png">
      </div>
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Register</h1>
        </center>
        <form action="" method="post" name="form3">
          <div class="row">
            <div class="col-25">
              <label>Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Your name..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Gender</label>
            </div>
            <div class="col-75 radio">
              <input type="radio" id="male" name="gender" value="male">Male
              <input type="radio" id="female" name="gender" value="female">Female
            </div>
          </div>  
          <div class="row">
            <div class="col-25">
              <label>Username</label>
            </div>
            <div class="col-75">
              <input type="text" id="funame" name="funame" placeholder="Your username..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Email</label>
            </div>
            <div class="col-75">
              <input type="email" id="femail" name="femail" placeholder="Your Email..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Teaching In</label>
            </div>
            <div class="col-75">
              <select id="frole" name="frole" required>
                <option value="">Select your Teaching standard</option>
                <option value="Below 10th standard">Below 10th standard</option>
                <option value="10th standard">10th standard</option>
                <option value="11th standard">11th standard</option>
                <option value="12th standard">12th standard</option>
                <option value="In Bachelor">In Bachelor</option>
                <option value="Complete Bachelor">Complete Bachelor</option>
                <option value="In Master">In Master</option>
                <option value="Complete Master">Complete Master</option>
                <option value="No teaching">No teaching</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Exprience</label>
            </div>
            <div class="col-75">
              <input type="text" id="fexprience" name="fexprience" placeholder="Your Exprience..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="fpwd" name="fpassword" placeholder="Your password..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Confirm Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="fcpwd" name="fcpassword" placeholder="Your confirm password..." required>
            </div>
          </div>
          <div class="row">
            <input id="regFaculty" name="facultyR" type="submit" value="Register">
          </div>
        </form>
        <div>
          <img src="../Images/img22.png" width="35%" height="35%" style="padding-left: 20px;margin-top: -75px;">
        </div>
      </div>
    </div>
  </div>

  <div class="main-container" id="id04">
    <span onclick="option()" class="close" title="Registration option">&times;</span>
    <div class="card">
      <div class="img">
        <img id="img" src="../Images/bg-LR.png">
      </div>
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Request for Admin</h1>
        </center>
        <form action="" method="post" name="form3">
          <div class="row">
            <div class="col-25">
              <label>Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="aname" name="aname" placeholder="Your name..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Gender</label>
            </div>
            <div class="col-75 radio">
              <input type="radio" id="male" name="gender" value="male">Male
              <input type="radio" id="female" name="gender" value="female">Female
            </div>
          </div>  
          <div class="row">
            <div class="col-25">
              <label>Username</label>
            </div>
            <div class="col-75">
              <input type="text" id="auname" name="auname" placeholder="Your username..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Email</label>
            </div>
            <div class="col-75">
              <input type="email" id="aemail" name="aemail" placeholder="Your Email..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Contect No.</label>
            </div>
            <div class="col-75">
              <input type="tel" id="acontect" name="acontect" placeholder="Your contetc number..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="apwd" name="apassword" placeholder="Your password..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Confirm Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="acpwd" name="acpassword" placeholder="Your confirm password..." required>
            </div>
          </div>
          <div class="row">
            <input id="reqAdmin" name="adminR" type="submit" value="Request">
          </div>
        </form>
        <div>
          <img src="../Images/img22.png" width="35%" height="35%" style="padding-left: 20px;margin-top: -75px;">
        </div>
      </div>
    </div>
  </div>


  <?php
    if(isset($_POST["stdR"])){
      $count=0;
      if($_POST["scpassword"]==$_POST["spassword"]){
        $res=mysqli_query($con,"select * from student where username='$_POST[suname]'") or die(mysqli_error($con));
        $count=mysqli_num_rows($res);

        if($count>0){
          ?>
            <script type="text/javascript">
              alert("This username is already exist..");
            </script>
          <?php
        }else{
          mysqli_query($con,"insert into student values(NULL,'$_POST[sname]','$_POST[gender]','$_POST[suname]','$_POST[semail]','$_POST[spassword]','$_POST[srole]',now(),now(),'self')");
          ?>
            <script type="text/javascript">
              alert("Done registration..")
              window.location="../LoginPage/userLogin.php";
            </script>
          <?php
        }
      }else{
        ?>
        <script type="text/javascript">
          alert("Recheck your password..");
        </script>
        <?php
      }
    }else if(isset($_POST["facultyR"])){
      $count=0;
      if($_POST["fcpassword"]==$_POST["fpassword"]){
        $res=mysqli_query($con,"select * from faculty where username='$_POST[funame]'") or die(mysqli_error($con));
        $count=mysqli_num_rows($res);

        if($count>0){
          ?>
            <script type="text/javascript">
              alert("This username is already exist..");
            </script>
          <?php
        }else{
          mysqli_query($con,"insert into faculty values(NULL,'$_POST[fname]','$_POST[gender]','$_POST[funame]','$_POST[femail]','$_POST[fpassword]','$_POST[frole]','$_POST[fexprience]',now(),now(),'self')");
          ?>
            <script type="text/javascript">
              alert("Done registration..")
              window.location="../LoginPage/userLogin.php";
            </script>
          <?php
        }
      }else{
        ?>
        <script type="text/javascript">
          alert("Recheck your password..");
        </script>
        <?php
      }      
    }else if(isset($_POST['adminR'])){
      $count=0;
      if($_POST["acpassword"]==$_POST["apassword"]){
        $res=mysqli_query($con,"select * from admin where username='$_POST[auname]'") or die(mysqli_error($con));
        $count=mysqli_num_rows($res);

        if($count>0){
          ?>
            <script type="text/javascript">
              alert("This username is already exist..");
            </script>
          <?php
        }else{
          mysqli_query($con,"insert into admin values(NULL,'$_POST[aname]','$_POST[gender]','$_POST[auname]','$_POST[apassword]','$_POST[aemail]','$_POST[acontect]',0,now(),now(),'self')");
          ?>
            <script type="text/javascript">
              alert("Request is send..")
              window.location="../IndexPage/index.php";
            </script>
          <?php
        }
      }else{
        ?>
        <script type="text/javascript">
          alert("Recheck your password..");
        </script>
        <?php
      }    
    }
  ?>

  <script type="text/javascript">
    var modal = document.getElementById('id01');
    var stdReg = document.getElementById('id02');
    var facultyReg = document.getElementById('id03');
    var adminReq = document.getElementById('id04');

    window.onclick = function(event) {
      if (event.target == modal) {
        window.location="../LoginPage/userLogin.php"
      }
    }
    function displays(){
      modal.style.display="none";
      stdReg.style.display="block";
    }
    function displayf(){
      modal.style.display="none";
      facultyReg.style.display="block";
    }
    function displaya(){
      modal.style.display="none";
      adminReq.style.display="block";
    }
    function option(){
      modal.style.display="block";
      facultyReg.style.display="none";
      stdReg.style.display="none";
      adminReq.style.display="none";
    }
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