<?php
include '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
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
      }else{
        if(isset($_GET['dareq'])){
            mysqli_query($con,"update admin set status=1 where id=$_GET[dareq]");
            ?>
            <script type="text/javascript">
                window.location.href="./aView.php?list=adminReq";
            </script>
            <?php
        }else if(isset($_GET['amsgyes'])){
            mysqli_query($con,"update message set status=1 where id=$_GET[amsgyes]");
            ?>
            <script type="text/javascript">
                window.location.href="./aView.php?list=msglist";
            </script>
            <?php
        }else if(isset($_GET['amsgno'])){
            mysqli_query($con,"update message set status=0 where id=$_GET[amsgno]");
            ?>
            <script type="text/javascript">
                window.location.href="./aView.php?list=msglist";
            </script>
            <?php
        }else if(isset($_GET['smsgyes'])){
            mysqli_query($con,"update message set status=1 where id=$_GET[smsgyes]");
            ?>
            <script type="text/javascript">
                window.location.href="./aHome.php";
            </script>
            <?php
        }else if(isset($_GET['smsgno'])){
            mysqli_query($con,"update message set status=0 where id=$_GET[smsgno]");
            ?>
            <script type="text/javascript">
                window.location.href="./aHome.php";
            </script>
            <?php
        }else if(isset($_GET['afreport']) || isset($_GET['amsg']) || isset($_GET['samsg'])){
            ?>
            <div class="main-box">
                <div class="card">
                  <div class="container">
                    <form action="" method="post" name="form2">
                      <div class="row">
                        <div class="col-25">
                          <label>Complaint name</label>
                        </div>
                        <div class="col-75">
                          <textarea cols="50" rows="10" name="msg" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <input id="addT" name="send" type="submit" value="Send Message">
                      </div>
                      <div class="img">
                      <img src="../Images/img22.png" width="45%" height="45%" style="padding-left: 20px;margin-top: -25px;">
                     </div>
                    </form>
                  </div>
                </div>
            </div>
            <?php
            if(isset($_POST['send'])){
                if(isset($_GET['afreport'])){
                    mysqli_query($con,"insert into message values(NULL,'$_POST[msg]',$_SESSION[user],0,$_GET[afreport],now(),-1)");
                    ?>
                    <script type="text/javascript">
                        window.location="./aView.php?list=afaculty";
                    </script>
                    <?php
                }else if(isset($_GET['amsg'])){
                    mysqli_query($con,"insert into message values(NULL,'$_POST[msg]',0,-1,0,now(),-1)");
                    ?>
                    <script type="text/javascript">
                        window.location="./aView.php?list=msglist";
                    </script>
                    <?php
                }else if(isset($_GET['samsg'])){
                    mysqli_query($con,"insert into message values(NULL,'$_POST[msg]',0,$_GET[samsg],0,now(),-1)");
                    ?>
                    <script type="text/javascript">
                        window.location="./aView.php?list=admin";
                    </script>
                    <?php
                }
            }
        }
      }
    ?>
</body>
</html>