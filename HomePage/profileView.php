<?php
include "../connection.php";
$boy=array("../Images/Bavtar1.png","../Images/Bavtar2.png","../Images/Bavtar3.png");
$girl=array("../Images/Gavtar1.png","../Images/Gavtar2.png","../Images/Gavtar3.png");
shuffle($boy);
shuffle($girl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Times</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./aStyle.css">
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
  }else{
  ?>
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

    <?php
    if(isset($_GET['afview']) || isset($_GET['sfview']) || isset($_GET['sview']) || isset($_GET['aview']) || isset($_GET['apview']) || isset($_GET['spview']) || isset($_GET['fpview'])){
        if(isset($_GET['afview'])){
          $q="select * from faculty where id=$_GET[afview]";
        }else if(isset($_GET['sfview'])){
          $q="select * from faculty where id=$_GET[sfview]";
        }else if(isset($_GET['sview'])){
          $q="select * from student where number=$_GET[sview]";
        }else if(isset($_GET['aview'])){
          $q="select * from admin where id=$_GET[aview]";
        }else if(isset($_GET['apview'])){
          $q="select * from admin where id=$_GET[apview]";
        }else if(isset($_GET['spview'])){
          $q="select * from student where number=$_GET[spview]";
        }else if(isset($_GET['fpview'])){
          $q="select * from faculty where id=$_GET[fpview]";
        }
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        $record=mysqli_fetch_array($result);

        if(isset($_GET['afview']) || isset($_GET['sfview']) || isset($_GET['fpview'])){
            $q1="select count(id) as total from assessment where creater=$record[id]";
            $q2="select count(id) as total from assessment where creater=$record[id] and qTotal=0";
            $res1=mysqli_query($con,$q1) or die("database error:".mysqli_erre($con));
            $res2=mysqli_query($con,$q2) or die("database error:".mysqli_erre($con));
            $row1=mysqli_fetch_array($res1);
            $row2=mysqli_fetch_array($res2);
        }
        ?>
        <div class="profile-data">
            <div class="profile">
              <div class="left">
                <?php
                if($record['gender']=="female"){ ?>
                  <img src="<?php echo $girl[0];?>">
                <?php }else if($record['gender']=="male"){ ?>
                  <img src="<?php echo $boy[0];?>">
                <?php }
                
                if(isset($_GET['afview'])){?>
                  <input type="submit" value="View Quiz" id="profile-btn" onclick="aSpecial(<?php echo $record['id']?>)">
                <?php } else if(isset($_GET['sfview'])){ ?>
                  <input type="submit" value="View Quiz" id="profile-btn" onclick="sSpecial(<?php echo $record['id']?>)">
                  <input type="submit" value="Edit" id="profile-btn" onclick="sfedit(<?php echo $record['id']?>)">
                <?php } else if(isset($_GET['sview'])){ ?>
                  <input type="submit" value="Edit" id="profile-btn" onclick="ssedit(<?php echo $record['number']?>)">
                <?php } else if(isset($_GET['aview'])){ ?>
                  <input type="submit" value="Edit" id="profile-btn" onclick="saedit(<?php echo $record['id']?>)">
                <?php } else if(isset($_GET['apview'])){ ?>
                  <input type="submit" value="Edit" id="profile-btn" onclick="apedit(<?php echo $record['id']?>)">
                <?php } else if(isset($_GET['spview'])){ ?>
                  <input type="submit" value="Edit" id="profile-btn" onclick="spedit(<?php echo $record['number']?>)">
                <?php } else if(isset($_GET['fpview'])){ ?>
                  <input type="submit" value="Edit" id="profile-btn" onclick="fpedit(<?php echo $record['id']?>)">
                <?php } ?>
              </div>
              <div class="about">
                <h1><?php echo $record['name'];?></h1>
                <div class="data">
                  <table>
                    <tr>
                      <td>EmailId:</td>
                      <td><?php echo $record['email'];?></td>
                    </tr>
                    <tr>
                      <td>Gender:</td>
                      <td><?php echo $record['gender'];?></td>
                    </tr>
                    <tr>
                      <td>Username:</td>
                      <td><?php echo $record['username'];?></td>
                    </tr>
                    <tr>
                      <td>Password:</td>
                      <td><?php echo $record['password'];?></td>
                    </tr>
                    <?php if(isset($_GET['afview']) || isset($_GET['sfview']) || isset($_GET['fpview'])){?>
                      <tr>
                        <td>Teaching in:</td>
                        <td><?php echo $record['teachingIn'];?></td>
                      </tr>
                      <tr>
                        <td>Exprience:</td>
                        <td><?php echo $record['exprience'];?> years</td>
                      </tr>
                    <?php }else if(isset($_GET['sview']) || isset($_GET['spview'])){ ?>
                      <tr>
                        <td>Study in:</td>
                        <td><?php echo $record['studyIn'];?></td>
                      </tr>
                    <?php }else if(isset($_GET['aview']) || isset($_GET['apview'])){ ?>
                      <tr>
                        <td>Contact:</td>
                        <td><?php echo $record['contectNo'];?></td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <td>Created On:</td>
                      <td><?php echo $record['createAt'];?></td>
                    </tr>
                    <tr>
                      <td>Updated On:</td>
                      <td><?php echo $record['updateAt'];?></td>
                    </tr>
                    <tr>
                      <td>Update By:</td>
                      <td><?php echo $record['updateBy'];?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <?php if(isset($_GET['afview']) || isset($_GET['sfview']) || isset($_GET['fpview'])){?> 
            <div class="discription">
                The user <?php echo $record['name'];?> create total <?php echo $row1['total'];?> Assessment and form them total <?php echo $row2['total'];?> Assessment is empty.
            </div>
          <?php }else if(isset($_GET['apview'])){
          
            $count=0;
            $q="select * from message where fromId=$_SESSION[user]";
            $res=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
            $count=mysqli_num_rows($res);
            if($count!=0){
              ?>
              <div class="message">
                <h1>Your Messages Status</h1>
                <?php
                while($row=mysqli_fetch_assoc($res)){
                  $res1=mysqli_query($con,"select name from faculty where id=$row[againstFid]") or die("database error:".mysqli_error($con));
                  $res2=mysqli_query($con,"select * from admin where id=$row[fromId]") or die("database error:".mysqli_error($con));
                  $row1=mysqli_fetch_array($res1);
                  $row2=mysqli_fetch_array($res2);
                  ?>
                  <div class="m-top">
                    <div class="m-left">
                      <?php if($record['gender']=="female"){ ?>
                        <img src="<?php echo $girl[0];?>">
                      <?php }else if($record['gender']=="male"){ ?>
                        <img src="<?php echo $boy[0];?>">
                      <?php } ?>
                    </div>
                    <div class="m-right">
                      <h3>Admin: <?php echo $row2['name'];?></h3>
                      <span>Against faculty: <?php echo $row1['name'];?> &nbsp;&nbsp; ID: <?php echo $row['againstFid'];?></span><br/>
                      <span><?php echo $row['message'];?></span>
                      <br/>
                      <?php if($row['status']==-1){ ?>
                        <span style="color:#a7821c;font-size:18px;margin-right:20px;">Not Check</span> 
                      <?php }else if($row['status']==0){ ?>
                        <span style="color:red;font-size:18px;margin-right:20px;">Rejected</span> 
                      <?php }else if($row['status']==1){ ?>
                        <span style="color:green;font-size:18px;margin-right:20px;">Accepted</span>
                      <?php } ?>
                      <i class="fas fa-times" onclick="amsgdel(<?php echo $row['id'];?>)"></i> 
                    </div>
                  </div>
                  <hr/>
                <?php } ?>
              </div>
            <?php } else {
              ?>
                <p id="message">No message from you..</p>
              <?php
            }
          } ?>
        </div>
        <?php
        if(isset($_GET['afview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=afaculty";
            }
          </script>
          <?php
        }else if(isset($_GET['sfview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=sfaculty";
            }
          </script>
          <?php
        }else if(isset($_GET['sview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=student";
            }
          </script>
          <?php
        }else if(isset($_GET['aview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=admin";
            }
          </script>
          <?php
        }else if(isset($_GET['apview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aHome.php";
            }
          </script>
          <?php
        }else if(isset($_GET['spview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./sHome.php";
            }
          </script>
          <?php
        }else if(isset($_GET['fpview'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./fHome.php";
            }
          </script>
          <?php
        }
    } 
  } ?>

  <script type="text/javascript" src="./route.js"></script>
</body>
</html>