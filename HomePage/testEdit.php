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
          <li><input type="submit" value="Back" onclick="backH()" id="outbtn"></li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
    <div class="main-box">
      <?php
      if(isset($_GET['question']) || isset($_GET['aqedit']) || isset($_GET['sqedit'])){
        
        if(isset($_GET['question'])){
          $id=$_GET['question'];
          $q="select * from question where id=$_GET[question]";
        }else if(isset($_GET['aqedit'])){
          $id=$_GET['aqedit'];
          $q="select * from question where id=$_GET[aqedit]";
        }else if(isset($_GET['sqedit'])){
          $id=$_GET['sqedit'];
          $q="select * from question where id=$_GET[sqedit]";
        }
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        while($record=mysqli_fetch_assoc($result)){
          ?>
          <div class="card qus">
            <div class="container">
              <center>
                <h1 style="margin: 0;margin-bottom: 10px;">Edit Question</h1>
              </center>
              <form action="" method="post" name="form2">
                <div class="row">
                  <div class="col-25">
                    <label>Question</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="ques" name="ques" value="<?php echo $record['question']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Option1</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="o1" name="o1" value="<?php echo $record['opt1']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Option2</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="o2" name="o2" value="<?php echo $record['opt2']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Option3</label>
                  </div>
                  <div class="col-75">
                  <input type="text" id="o3" name="o3" value="<?php echo $record['opt3']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Option4</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="o4" name="o4" value="<?php echo $record['opt4']?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Currect Answer</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="ans" name="ans" value="<?php echo $record['answer']?>">
                  </div>
                </div>
                <div class="row">
                  <input id="editQ" name="editQ" type="submit" value="Edit Question">
                </div>
              </form>

              <?php 
              if(isset($_GET['question'])){
                ?>
                <script type="text/javascript">
                  function backH(){
                    window.location.href="./fView.php"+'?display='+<?php echo $record['category']?>;
                  }
                </script>
                <?php
              }else if(isset($_GET['aqedit'])){
                ?>
                <script type="text/javascript">
                  function backH(){
                    window.location.href="./aView.php"+'?aQusList='+<?php echo $record['category']?>;
                  }
                </script>
                <?php
              }else if(isset($_GET['sqedit'])){
                ?>
                <script type="text/javascript">
                  function backH(){
                    window.location.href="./aView.php"+'?sQusList='+<?php echo $record['category']?>;
                  }
                </script>
                <?php
              }
              ?>
            </div>
          </div>
          <?php
        }

        if(isset($_POST['editQ'])){
          if(isset($_GET['question'])){
            $q="update question set question='$_POST[ques]', opt1='$_POST[o1]', opt2='$_POST[o2]', opt3='$_POST[o3]', opt4='$_POST[o4]', answer='$_POST[ans]', updateAt=now(), updateBy='self', adminId=0 where id=$id";
          }else if(isset($_GET['aqedit'])){
            $q="update question set question='$_POST[ques]', opt1='$_POST[o1]', opt2='$_POST[o2]', opt3='$_POST[o3]', opt4='$_POST[o4]', answer='$_POST[ans]', updateAt=now(), updateBy='admin', adminId=$_SESSION[user] where id=$id";
          }else if(isset($_GET['sqedit'])){
            $q="update question set question='$_POST[ques]', opt1='$_POST[o1]', opt2='$_POST[o2]', opt3='$_POST[o3]', opt4='$_POST[o4]', answer='$_POST[ans]', updateAt=now(), updateBy='super admin', adminId=0 where id=$id";
          }
          
          mysqli_query($con,$q);
          ?>
          <script type="text/javascript">
            backH();
          </script>
          <?php
        }
        
      }else if(isset($_GET['test']) || isset($_GET['atedit']) || isset($_GET['stedit'])){
        
        if(isset($_GET['test'])){
          $id=$_GET['test'];
          $q="select * from assessment where id=$_GET[test]";
        }else if(isset($_GET['atedit'])){
          $id=$_GET['atedit'];
          $q="select * from assessment where id=$_GET[atedit]";
        }else if(isset($_GET['stedit'])){
          $id=$_GET['stedit'];
          $q="select * from assessment where id=$_GET[stedit]";
        }

        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        while($record=mysqli_fetch_assoc($result)){
          ?>
          <div class="card">
            <div class="container">
              <center>
                <h1 style="margin: 0;margin-bottom: 10px;">Edit Assessment</h1>
              </center>
              <form action="" method="post" name="form2">
                <div class="row">
                  <div class="col-25">
                    <label>Assessment Title</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="title" name="title" value="<?php echo $record['title']?>">
                  </div>
                </div>
                <div class="row">
                  <input id="editT" name="editT" type="submit" value="Edit Assessment">
                </div>
              </form>
            </div>
          </div>
          <?php 
        }
        if(isset($_GET['test'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./fHome.php";
            }
          </script>
          <?php
        }else if(isset($_GET['atedit'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=atest";
            }
          </script>
          <?php
        }else if(isset($_GET['stedit'])){
          ?>
          <script type="text/javascript">
            function backH(){
              window.location="./aView.php?list=stest";
            }
          </script>
          <?php
        }
        
        if(isset($_POST['editT'])){
          if(isset($_GET['test'])){
            $q="update assessment set title='$_POST[title]', updateAt=now(), updateBy='self', adminId=0 where id=$id";
          }else if(isset($_GET['atedit'])){
            $q="update assessment set title='$_POST[title]', updateAt=now(), updateBy='admin', adminId=$_SESSION[user] where id=$id";
          }else if(isset($_GET['stedit'])){
            $q="update assessment set title='$_POST[title]', updateAt=now(), updateBy='super admin', adminId=0 where id=$id";
          }
          mysqli_query($con,$q);
          ?>
          <script type="text/javascript">
              backH();
          </script>
          <?php
        }
      }
      ?>
    </div>
  <?php } ?>

      <script type="text/javascript" src="./route.js"></script>
  </body>
</html>