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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./aStyle.css">
    <link rel="stylesheet" href="../navigation.css">
    <link rel="stylesheet" href="./fStyle.css">
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
    if(isset($_GET['list'])){
      if($_GET['list']=='afaculty' || $_GET['list']=='sfaculty'){
        $q1="select * from faculty";
        $res1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
    ?>
    <h1>Available Faculty</h1>
    <div class="main1">
    <?php
    while($record=mysqli_fetch_assoc($res1)){
      $q2="select count(id) as total from assessment where creater=$record[id]";
      $q3="select count(id) as total from assessment where creater=$record[id] and qTotal=0";
      $res2=mysqli_query($con,$q2) or die("database error:".mysqli_error($con));
      $res3=mysqli_query($con,$q3) or die("database error:".mysqli_error($con));
      $row1=mysqli_fetch_array($res2);
      $row2=mysqli_fetch_array($res3);
    ?>
        <div class="two">
            <h2><?php echo $record['name'];?></h2>
            <div class="info">
                <div class="detail">
                  <span>Total Quiz: <?php echo $row1['total']; ?></span>
                  <span>Empty Quiz: <?php echo $row2['total']; ?></span>
                </div>
                <div class="action">
                  <?php if($_GET['list']=='afaculty'){?>
                    <button class="view" onclick="afview(<?php echo $record['id']?>)">View</button>
                  <?php }else if($_GET['list']==='sfaculty'){?>
                    <button class="view" onclick="sfview(<?php echo $record['id']?>)">View</button>
                  <?php }?>
                  <?php if($_GET['list']=='afaculty'){?>
                    <button class="report" onclick="afreport(<?php echo $record['id']?>)">Report</button>
                  <?php }else if($_GET['list']==='sfaculty'){?>
                    <button class="report" onclick="sfdel(<?php echo $record['id']?>)">Block</button>
                  <?php }?>
                </div>
            </div>
        </div>
    <?php } 
      if($_GET['list']=='afaculty'){?>
        </div>
        <script type="text/javascript">
          function backH(){
            window.location="./aHome.php";
          }
        </script>
      <?php } else if($_GET['list']=='sfaculty'){?>
        <script type="text/javascript">
          function backH(){
            window.location="./asHome.php";
          }
        </script>
    <?php }
    }else if($_GET['list']=='atest' || $_GET['list']=='stest' || $_GET['list']=='aftest' || $_GET['list']=='sftest'){
      ?>
      <div class="container">
      <h1>Available Assessments</h1>
      <div class="table">
        <table>
          
        <?php
        if(isset($_GET['aSpecial'])){
          $q="select * from assessment where creater=$_GET[aSpecial]";
        }else if(isset($_GET['sSpecial'])){
          $q="select * from assessment where creater=$_GET[sSpecial]";
        }else{
          $q="select * from assessment";
        }
          $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
          $question=mysqli_num_rows($result);
          if($question>0){
            ?>
            <tr>
              <td>Title</td>
              <td>Total Question</td>
              <td>Creater</td>
              <td></td>
            </tr>
            <?php
    
            while($record=mysqli_fetch_assoc($result)){
              $q1="select name from faculty where id=$record[creater]";
              $res=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
              while($ans=mysqli_fetch_assoc($res)){
              ?>
                <tr>
                  <td><?php echo $record['title']?></td>
                  <td><?php echo $record['qTotal']?></td>
                  <td><?php echo $ans['name']?></td>
                  <td>
                    <?php if($_GET['list']=='atest'){ ?>
                      <input type="submit" value="View" onclick="aqview(<?php echo $record['id']?>)" class="v-btn">
                      <input type="submit" value="Edit" onclick="atedit(<?php echo $record['id']?>)" class="e-btn">
                      <input type="submit" value="Delete" onclick="atdel(<?php echo $record['id']?>)" class="d-btn">
                    <?php }else if($_GET['list']=='stest'){ ?>
                      <input type="submit" value="View" onclick="sqview(<?php echo $record['id']?>)" class="v-btn">
                      <input type="submit" value="Edit" onclick="stedit(<?php echo $record['id']?>)" class="e-btn">
                      <input type="submit" value="Delete" onclick="stdel(<?php echo $record['id']?>)" class="d-btn">
                    <?php }else if($_GET['list']=='aftest'){ ?>
                      <input type="submit" value="View in List" onclick="aftolist()" class="v-btn">
                    <?php }else if($_GET['list']=='sftest'){ ?>
                      <input type="submit" value="View in List" onclick="sftolist()" class="v-btn">
                    <?php } ?>
                  </td>
                </tr>
              <?php }
            }
          }else{
            ?>
              <p id="message">Assessment is not here</p>
            <?php
          }
          if($_GET['list']=='atest'){
            ?>  
            <script type="text/javascript">
              function backH(){
                window.location="./aHome.php";
              }
            </script>
            <?php
          } else if($_GET['list']=='stest'){
            ?>         
            <script type="text/javascript">
              function backH(){
                window.location="./asHome.php";
              }
            </script>
            <?php
          } else if(isset($_GET['aSpecial'])){
            ?>
            <script type="text/javascript">
              function backH(){
                window.location="./profileView.php?afview="+<?php echo $_GET['aSpecial'];?>;
              }
            </script>
            <?php
          } else if(isset($_GET['sSpecial'])){
            ?>
            <script type="text/javascript">
              function backH(){
                window.location="./profileView.php?sfview="+<?php echo $_GET['sSpecial'];?>;
              }
            </script>
            <?php
          }
          ?>
        </table>
      </div>
      </div>
      <?php }else if($_GET['list']=='student'){
        $q="select number,name from student";
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        ?>
        <h1>Available Student</h1>
        <div class="main1">
        <?php
        while($record=mysqli_fetch_assoc($result)){
          ?>
          <div class="two">
            <h2><?php echo $record['name'];?></h2>
            <div class="action">
              <button class="view" onclick="sview(<?php echo $record['number']?>)">View</button>
              <button class="report" onclick="ssdel(<?php echo $record['number']?>)">Block</button>
            </div>
          </div>
        <?php } ?>
        </div>
        <script type="text/javascript">
          function backH(){
            window.location="./asHome.php";
          }
          </script>
        <?php
      }else if($_GET['list']=='admin'){
        $q="select id,name from admin where status=1";
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        ?>
        <h1>Available Admin</h1>
        <div class="main1">
        <?php
        while($record=mysqli_fetch_assoc($result)){
          ?>
          <div class="two">
            <h2><?php echo $record['name'];?></h2>
            <div class="action">
              <button class="msgbtn" onclick="samsg(<?php echo $record['id']?>)">Message</button>
              <button class="view" onclick="aview(<?php echo $record['id']?>)">View</button>
              <button class="report" onclick="sadel(<?php echo $record['id']?>)">Block</button>
            </div>
          </div>
        <?php } ?>
        </div>
        <script type="text/javascript">
          function backH(){
            window.location="./asHome.php";
          }
        </script>
        <?php
      }else if($_GET['list']=='adminReq'){
        $boy=array("../Images/Bavtar1.png","../Images/Bavtar2.png","../Images/Bavtar3.png");
        $girl=array("../Images/Gavtar1.png","../Images/Gavtar2.png","../Images/Gavtar3.png");
        
        $q="select * from admin where status=0";
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        ?>
        <h1>Available Admin Request</h1>
        <div class="main1">
          <?php
          while($record=mysqli_fetch_assoc($result)){
            ?>
            <div class="m-top m-card">
              <div class="m-left">
                <?php
                if($record['gender']=='female'){ 
                  shuffle($girl);
                  ?>
                  <img src="<?php echo $girl[0];?>">
                <?php }else if($record['gender']=='male'){ 
                  shuffle($boy);
                  ?>
                  <img src="<?php echo $boy[0];?>">
                <?php } ?>
              </div>
              <div class="m-right">
                <h3 style="margin-bottom:20px;"><?php echo $record['name'];?></h3>
                <div>Hey, I am <?php echo $record['name'];?>.</div>
                <div>Gender: <?php echo $record['gender'];?></div>
                <div>Username: <?php echo $record['username'];?></div>
                <div>Password: <?php echo $record['password'];?></div>
                <div>Email id: <?php echo $record['email'];?></div>
                <div>Contect number: <?php echo $record['contectNo'];?></div>
                <i class="fas fa-check" onclick="dareq(<?php echo $record['id'];?>)"></i>
                <i class="fas fa-times" onclick="careq(<?php echo $record['id'];?>)"></i>        
              </div>
            </div>
          <?php } ?>
        </div>
        <script type="text/javascript">
          function backH(){
            window.location="./asHome.php";
          }
        </script>
        <?php
      }else if($_GET['list']=='msglist'){
        ?>
        <div class="message">
        <input type="submit" value="Message to all Admin" onclick="amsg()" id="outbtn" style="width:250px">
        <?php
        $count=0;
        $boy=array("../Images/Bavtar1.png","../Images/Bavtar2.png","../Images/Bavtar3.png");
        $girl=array("../Images/Gavtar1.png","../Images/Gavtar2.png","../Images/Gavtar3.png");
        
        $q="select * from message where toId=0 and status=-1";
        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
        $count=mysqli_num_rows($result);
        if($count!=0){
          ?>
            <h1>Messages from admin</h1>
            <?php
            while($record=mysqli_fetch_assoc($result)){
              $res1=mysqli_query($con,"select name from faculty where id=$record[againstFid]") or die("database error:".mysqli_error($con));
              $res2=mysqli_query($con,"select * from admin where id=$record[fromId]") or die("database error:".mysqli_error($con));
              $row1=mysqli_fetch_array($res1);
              $row2=mysqli_fetch_array($res2);
              ?>
              <div class="m-top">
                <div class="m-left">
                  <?php if($row2['gender']=='female'){ 
                    shuffle($girl);
                    ?>
                    <img src="<?php echo $girl[0];?>">
                  <?php }else if($row2['gender']=='male'){ 
                    shuffle($boy);
                    ?>
                    <img src="<?php echo $boy[0];?>">
                  <?php } ?>
                </div>
                <div class="m-right">
                  <h3>Admin: <?php echo $row2['name'];?></h3>
                  <span>Against faculty: <?php echo $row1['name'];?> &nbsp;&nbsp; ID: <?php echo $record['againstFid'];?></span><br/>
                  <span><?php echo $record['message'];?></span>
                  <br/>
                  <i class="fas fa-check" onclick="amsgapprov(<?php echo $record['id'];?>)"></i>
                  <i class="fas fa-times" onclick="amsgdecline(<?php echo $record['id'];?>)"></i> 
                </div>
              </div>
              <hr/>
            <?php }
          } else {
            ?>
              <p id="message">No message for you..</p>
            <?php
          } 
          $avtar=array("../Images/Bavtar1.png","../Images/Bavtar2.png","../Images/Bavtar3.png","../Images/Gavtar1.png","../Images/Gavtar2.png","../Images/Gavtar3.png");
          $q1="select * from message where fromId=0";
          $result1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
          $count=mysqli_num_rows($result1);

          if($count!=0){
            ?>
            <h1>Your Messages Status</h1>
            <?php 
            while($record=mysqli_fetch_assoc($result1)){
              shuffle($avtar);
              ?>
              <div class="m-top">
                <div class="m-left">
                  <img src="<?php echo $avtar[0];?>">
                </div>
                <div class="m-right">
                  <h3>Super admin</h3>
                  <?php
                  if($record['toId']==-1){ ?>
                    <span>Message to: All admin</span><br/>
                  <?php }else{
                    $res1=mysqli_query($con,"select name from admin where id=$record[toId]") or die("database error:".mysqli_error($con));
                    $row1=mysqli_fetch_array($res1);
                    ?>
                    <span>Message to: <?php echo $row1['name'];?> &nbsp;&nbsp; ID: <?php echo $record['toId'];?></span><br/>
                  <?php }
                  ?>
                  <span><?php echo $record['message'];?></span>
                  <br/>
                  <?php if($record['status']==-1){ ?>
                    <span style="color:#a7821c;font-size:18px;margin-right:20px;">Not Check</span> 
                  <?php }else if($record['status']==0){ ?>
                    <span style="color:red;font-size:18px;margin-right:20px;">Rejected</span> 
                  <?php }else if($record['status']==1){ ?>
                    <span style="color:green;font-size:18px;margin-right:20px;">Accepted</span>
                  <?php } ?>
                  <i class="fas fa-times" onclick="smsgdel(<?php echo $record['id'];?>)"></i> 
                </div>
              </div>
              <hr/>
            <?php }
            }else{
            ?>
              <p id="message">You not send any message..</p>
            <?php
          }
        ?>
        </div>
        <script type="text/javascript">
          function backH(){
            window.location="./asHome.php";
          }
        </script>
      <?php }
    }else if(isset($_GET['aQusList']) || isset($_GET['sQusList'])){
      $count=0;
      if(isset($_GET['aQusList'])){
        $q="select id,question from question where category=$_GET[aQusList]";
        $q1="select createAt,updateAt,updateBy,adminId from assessment where id=$_GET[aQusList]";
      }else if(isset($_GET['sQusList'])){
        $q="select id,question from question where category=$_GET[sQusList]";
        $q1="select createAt,updateAt,updateBy,adminId from assessment where id=$_GET[sQusList]";
      }
      $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
      $result1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
      $question=mysqli_num_rows($result);
      $row=mysqli_fetch_array($result1);
      if($row['updateBy']=='admin' && isset($_GET['sQusList'])){
        $res=mysqli_query($con,"select name from admin where id=$row[adminId]");
        $admin=mysqli_fetch_array($res);
      }
      ?>
      <div class="container">
        <h1>Available Questions</h1>
        <div style="text-align:center;">Create on: <?php echo $row['createAt'];?>, update on:  <?php echo $row['updateAt'];?> by  <?php echo $row['updateBy']=='self'?'User':$row['updateBy'];?> <?php echo $row['updateBy']=='admin'?$admin['name']:''?></div>
        <div class="table">
          <table>
            <?php
            if($question>0){
            ?>
            <tr>
              <td>Number</td>
              <td>Question</td>
              <td></td>
            </tr>
            <?php
            while($record=mysqli_fetch_assoc($result)){
              $count=$count+1;
            ?>
            <tr>
              <td><?php echo $count?></td>
              <td><?php echo $record['question']?></td>
              <td>
              <?php if(isset($_GET['aQusList'])){?>
                <input type="submit" value="View" onclick="aques(<?php echo $record['id']?>)" class="v-btn">
                <input type="submit" value="Edit" onclick="aqedit(<?php echo $record['id']?>)" class="e-btn">
                <input type="submit" value="Delete" onclick="aqdel(<?php echo $record['id']?>)" class="d-btn">
              <?php }else if(isset($_GET['sQusList'])){ ?>
                <input type="submit" value="View" onclick="sques(<?php echo $record['id']?>)" class="v-btn">
                <input type="submit" value="Edit" onclick="sqedit(<?php echo $record['id']?>)" class="e-btn">
                <input type="submit" value="Delete" onclick="sqdel(<?php echo $record['id']?>)" class="d-btn">
              <?php } ?>
              </td>
            </tr>
            <?php }
            }else{
              ?>
              <p id="message">Question is not here</p>
              <?php
            }
            ?>
          </table>
        </div>
      </div>
      <?php
      if(isset($_GET['aQusList'])){ ?>
      <script type="text/javascript">
        function backH(){
            window.location="./aView.php?list=atest";
        }
      </script>
      <?php }else if(isset($_GET['sQusList'])){?>
        <script type="text/javascript">
          function backH(){
              window.location="./aView.php?list=stest";
          }
        </script>
      <?php }
    }else if(isset($_GET['aques']) || isset($_GET['sques'])){
      ?>
      <div class="ques">
        <div class="qbox">
          <?php
          if(isset($_GET['aques'])){
            $q="select * from question where id=$_GET[aques]";
            $q1="select createAt,updateAt,updateBy,adminId from question where id=$_GET[aques]";
          }else if(isset($_GET['sques'])){
            $q="select * from question where id=$_GET[sques]";
            $q1="select createAt,updateAt,updateBy,adminId from question where id=$_GET[sques]";
          }
          $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
          $result1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
          $record=mysqli_fetch_array($result);
          $row=mysqli_fetch_array($result1);
          if($row['updateBy']=='admin' && isset($_GET['sques'])){
            $res=mysqli_query($con,"select name from admin where id=$row[adminId]");
            $admin=mysqli_fetch_array($res);
          }
          ?>
          
          <h3>Question : <?php echo $record['question']?></h3>
          <hr/>
          <h3> A <?php echo $record['opt1']?></h3>
          <h3> B <?php echo $record['opt2']?></h3>
          <h3> C <?php echo $record['opt3']?></h3>
          <h3> D <?php echo $record['opt4']?></h3>
          <h3>Answer : <?php echo $record['answer']?></h3>
          <hr/>
          <h3>Create on: <?php echo $row['createAt'];?>, update on:  <?php echo $row['updateAt'];?> by  <?php echo $row['updateBy']=='self'?'User':$row['updateBy'];?>  <?php echo $row['updateBy']=='admin'?$admin['name']:''?></h3>  
        </div>
      </div>
      <?php
      if(isset($_GET['aques'])){
        ?>
        <script type="text/javascript">
          function backH(){
              window.location="./aView.php?aQusList=<?php echo $record['category']?>";
          }
        </script>
        <?php
      }else if(isset($_GET['sques'])){
        ?>
        <script type="text/javascript">
          function backH(){
              window.location="./aView.php?sQusList=<?php echo $record['category']?>";
          }
        </script>
        <?php
      }
    } 
  } ?>

  <script type="text/javascript" src="./route.js"></script>
</body>
</html>