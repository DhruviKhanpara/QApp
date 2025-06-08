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
  }else{
  $id=$_SESSION['category'];
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
          </div></li>
          <li class="links"><a href="../IndexPage/index.php">Home</a></li>
          <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
          <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
          <li>
            <div class="outbtn">
              <button onclick="backV(<?php echo $id?>)" id="outbtn">Back</button>
            </div>
          </li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
  <div class="main-box">
    <div class="card qus">
      <div class="container">
        <center>
          <h1 style="margin: 0;margin-bottom: 10px;">Add Question</h1>
        </center>
        <form action="" method="post" name="form2">
          <div class="row">
            <div class="col-25">
              <label>Question</label>
            </div>
            <div class="col-75">
              <input type="text" id="ques" name="ques" placeholder="Enter question..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Option1</label>
            </div>
            <div class="col-75">
              <input type="text" id="o1" name="o1" placeholder="First option..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Option2</label>
            </div>
            <div class="col-75">
              <input type="text" id="o2" name="o2" placeholder="Second option..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Option3</label>
            </div>
            <div class="col-75">
            <input type="text" id="o3" name="o3" placeholder="Thired option..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Option4</label>
            </div>
            <div class="col-75">
              <input type="text" id="o4" name="o4" placeholder="Fourth option..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Currect Answer</label>
            </div>
            <div class="col-75">
              <input type="text" id="ans" name="ans" placeholder="Right option..." required>
            </div>
          </div>
          <div class="row">
            <input id="addQ" name="addQ" type="submit" value="Add Question">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
    if(isset($_POST["addQ"])){
      
      mysqli_query($con,"insert into question values(NULL,'$_POST[ques]','$_POST[o1]','$_POST[o2]','$_POST[o3]','$_POST[o4]','$_POST[ans]',$_SESSION[category],now(),now(),'self',0)");

      mysqli_query($con,"update assessment set qTotal=qTotal+1 where id=$id");
      ?>
        <script type="text/javascript">
          alert("Question Added..")
          window.location.href="./fView.php"+'?display='+<?php echo $id?>;
        </script>
      <?php
    }
}
?>
  <script type="text/javascript">
    function backV(a){
      window.location.href="./fView.php"+'?display='+a;
    }
  </script>
</body>
</html>