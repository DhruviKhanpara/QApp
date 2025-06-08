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
    <link rel="stylesheet" href="add.css">
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
              </div>
            </li>
            <li class="links"><a href="../IndexPage/index.php">Home</a></li>
            <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
            <li><input type="submit" value="Back" onclick="backH()" id="outbtn"></li>
          </ul>
        </div>
        <div class="heading">
          <img src="../Images/icon.png" height="40px" width="60px">
          QA Times
        </div>
      </nav>
    </div>

    <div class="card qus">
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Edit Profile</h1>
        </center>
        <form action="" method="post" name="form2">
          <?php
          if(isset($_GET['sfedit']) || isset($_GET['ssedit']) || isset($_GET['saedit']) || isset($_GET['apedit']) || isset($_GET['spedit']) || isset($_GET['fpedit'])){
            if(isset($_GET['sfedit'])){
              $q="select * from faculty where id=$_GET[sfedit]";
            }else if(isset($_GET['ssedit'])){
              $q="select * from student where number=$_GET[ssedit]";
            }else if(isset($_GET['saedit'])){
              $q="select * from admin where id=$_GET[saedit]";
            }else if(isset($_GET['apedit'])){
              $q="select * from admin where id=$_GET[apedit]";
            }else if(isset($_GET['spedit'])){
              $q="select * from student where number=$_GET[spedit]";
            }else if(isset($_GET['fpedit'])){
              $q="select * from faculty where id=$_GET[fpedit]";
            }
            $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
            $record=mysqli_fetch_array($result);

            ?>
            <div class="row">
              <div class="col-25">
                <label>Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="name" name="name" value="<?php echo $record['name'];?>">
              </div>
            </div>
            <div class="row">
                <div class="col-25">
                  <label>Gender</label>
                </div>
                <div class="col-75 radio">
                  <input type="radio" id="male" name="gender" value="male" <?php echo $record['gender']=='male' ? "checked" : '' ; ?> >Male
                  <input type="radio" id="female" name="gender" value="female" <?php echo $record['gender']=='female' ? "checked" : '' ; ?> >Female
                </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label>Username</label>
              </div>
              <div class="col-75">
                <input type="text" id="username" name="username" value="<?php echo $record['username'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label>Email Id</label>
              </div>
              <div class="col-75">
                <input type="text" id="email" name="email" value="<?php echo $record['email'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label>Password</label>
              </div>
              <div class="col-75">
              <input type="text" id="password" name="password" value="<?php echo $record['password'];?>">
              </div>
            </div>
            <?php
            if(isset($_GET['ssedit']) || isset($_GET['spedit'])){
              ?>
              <div class="row">
                <div class="col-25">
                  <label>Study in</label>
                </div>
                <div class="col-75">
                  <select id="role" name="role" >
                    <option value="" <?php echo $record['studyIn']=='' ? "selected" : '' ; ?> >Select your Standard</option>
                    <option value="Below 10th" <?php echo $record['studyIn']=='Below 10th' ? "selected" : '' ; ?> >Below 10th</option>
                    <option value="10th" <?php echo $record['studyIn']=='10th' ? "selected" : '' ; ?> >10th</option>
                    <option value="11th" <?php echo $record['studyIn']=='11th' ? "selected" : '' ; ?> >11th</option>
                    <option value="12th" <?php echo $record['studyIn']=='12th' ? "selected" : '' ; ?> >12th</option>
                    <option value="In Bachelor" <?php echo $record['studyIn']=='In Bachelor' ? "selected" : '' ; ?> >In Bachelor</option>
                    <option value="Complete Bachelor" <?php echo $record['studyIn']=='Complete Bachelor' ? "selected" : '' ; ?> >Complete Bachelor</option>
                    <option value="In Master" <?php echo $record['studyIn']=='In Master' ? "selected" : '' ; ?> >In Master</option>
                    <option value="Complete Master" <?php echo $record['studyIn']=='Complete Master' ? "selected" : '' ; ?> >Complete Master</option>
                  </select>
                </div>
              </div>
              <?php
            }else if(isset($_GET['sfedit']) || isset($_GET['fpedit'])){
              ?>
              <div class="row">
                <div class="col-25">
                  <label>Teaching in</label>
                </div>
                <div class="col-75">
                <select id="role" name="role">
                    <option value="" <?php echo $record['teachingIn']=='' ? "selected" : '' ; ?> >Select your Teaching standard</option>
                    <option value="Below 10th standard" <?php echo $record['teachingIn']=='Below 10th standard' ? "selected" : '' ; ?> >Below 10th standard</option>
                    <option value="10th standard" <?php echo $record['teachingIn']=='10th standard' ? "selected" : '' ; ?> >10th standard</option>
                    <option value="11th standard" <?php echo $record['teachingIn']=='11th standard' ? "selected" : '' ; ?> >11th standard</option>
                    <option value="12th standard" <?php echo $record['teachingIn']=='12th standard' ? "selected" : '' ; ?> >12th standard</option>
                    <option value="In Bachelor" <?php echo $record['teachingIn']=='In Bachelor' ? "selected" : '' ; ?> >In Bachelor</option>
                    <option value="Complete Bachelor" <?php echo $record['teachingIn']=='Complete Bachelor' ? "selected" : '' ; ?> >Complete Bachelor</option>
                    <option value="In Master" <?php echo $record['teachingIn']=='In Master' ? "selected" : '' ; ?> >In Master</option>
                    <option value="Complete Master" <?php echo $record['teachingIn']=='Complete Master' ? "selected" : '' ; ?> >Complete Master</option>
                    <option value="No teaching" <?php echo $record['teachingIn']=='No teaching' ? "selected" : '' ; ?> >No teaching</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label>Exprience</label>
                </div>
                <div class="col-75">
                  <input type="text" id="exprience" name="exprience" value="<?php echo $record['exprience'];?>">
                </div>
              </div>
              <?php
            }else if(isset($_GET['saedit']) || isset($_GET['apedit'])){
              ?>
              <div class="row">
                <div class="col-25">
                  <label>Contect No.</label>
                </div>
                <div class="col-75">
                <input type="text" id="contect" name="contect" value="<?php echo $record['contectNo'];?>">
              </div>
            </div>
              <?php
            }
            ?>
            <div class="row">
              <input id="pedit" name="pedit" type="submit" value="Edit Profile">
            </div>

            <?php
            if(isset($_GET['sfedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?sfview="+<?php echo $record['id'];?>;
                }
              </script>
              <?php
            }else if(isset($_GET['ssedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?sview="+<?php echo $record['number'];?>;
                }
              </script>
              <?php
            }else if(isset($_GET['saedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?aview="+<?php echo $record['id'];?>;
                }
              </script>
              <?php
            }else if(isset($_GET['apedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?apview="+<?php echo $record['id'];?>;
                }
              </script>
              <?php
            }else if(isset($_GET['spedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?spview="+<?php echo $record['number'];?>;
                }
              </script>
              <?php
            }else if(isset($_GET['fpedit'])){
              ?>
              <script type="text/javascript">
                function backH(){
                  window.location="./profileView.php?fpview="+<?php echo $record['id'];?>;
                }
              </script>
              <?php
            }

            if(isset($_POST['pedit'])){
              if(isset($_GET['sfedit'])){
                $q="update faculty set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', teachingIn='$_POST[role]', exprience='$_POST[exprience]', updateAt=now(), updateBy='super admin' where id=$_GET[sfedit]";
              }else if(isset($_GET['ssedit'])){
                $q="update student set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', studyIn='$_POST[role]', updateAt=now(), updateBy='super admin' where number=$_GET[ssedit]";
              }else if(isset($_GET['saedit'])){
                $q="update admin set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', contectNo='$_POST[contect]', updateAt=now(), updateBy='super admin' where id=$_GET[saedit]";
              }else if(isset($_GET['apedit'])){
                $q="update admin set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', contectNo='$_POST[contect]', updateAt=now(), updateBy='self' where id=$_GET[apedit]";
              }else if(isset($_GET['spedit'])){
                $q="update student set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', studyIn='$_POST[role]', updateAt=now(), updateBy='self' where number=$_GET[spedit]";
              }else if(isset($_GET['fpedit'])){
                $q="update faculty set name='$_POST[name]', username='$_POST[username]', email='$_POST[email]', password='$_POST[password]', gender='$_POST[gender]', teachingIn='$_POST[role]', exprience='$_POST[exprience]', updateAt=now(), updateBy='self' where id=$_GET[fpedit]";
              }
              mysqli_query($con,$q);
              ?>
              <script type="text/javascript">
                backH();
              </script>
              <?php
            } 
          } ?>
        </form>
      </div>
    </div>
  <?php } ?>
</body>
</html>