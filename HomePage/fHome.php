<?php
include "../connection.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Times</title>
    <link rel="stylesheet" href="./fStyle.css">
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
          <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
          <li class="links"><a href="./profileView.php?fpview=<?php echo $_SESSION['user']?>">Account</a></li>
          <li><input type="submit" value="Add Test" onclick="ftadd()" id="outbtn"></li>
          <li><input type="submit" value="Logout" onclick="logout()" id="outbtn"></li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
    <div class="container">
        <div class="top">
            <img id="img1" src="../Images/img1.jpg">
            <img id="img2" src="../Images/img14.jpg">
            <img id="img3" src="../Images/img1.jpg">
        </div>
        <div class="table">
            <table>
                <tr>
                    <td>Title</td>
                    <td>Total Question</td>
                    <td>Creater</td>
                    <td></td>
                </tr>
                <?php
                
                if(!isset($_SESSION['msg'])){
                    ?>
                    <script type="text/javascript">
                      window.location="../LoginPage/userLogin.php";
                    </script>
                    <?php
                    unset($_SESSION['msg']);
                }else{
                $q="select * from assessment";
                $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
                while($record=mysqli_fetch_assoc($result)){
                    $q1="select name from faculty where id=$record[creater]";
                    $res=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
                    while($ans=mysqli_fetch_assoc($res)){
                    if($record['creater']!=$_SESSION['user']){
                ?>
                <tr>
                    <td><?php echo $record['title']?></td>
                    <td><?php echo $record['qTotal']?></td>
                    <td><?php echo $ans['name']?></td>
                    <td>
                        <input type="submit" value="View" onclick="nftview(<?php echo $record['id']?>)" class="v-btn">
                        <input type="submit" value="Edit" class="e-btn" disabled>
                        <input type="submit" value="Delete" class="d-btn" disabled>
                    </td>
                </tr>
                <?php }else{ ?>
                <tr>
                    <td><?php echo $record['title']?></td>
                    <td><?php echo $record['qTotal']?></td>
                    <td><?php echo $ans['name']?></td>
                    <td>
                        <input type="submit" value="View" onclick="ftview(<?php echo $record['id']?>)" class="v-btn">
                        <input type="submit" value="Edit" onclick="ftedit(<?php echo $record['id']?>)" class="e-btn">
                        <input type="submit" value="Delete" onclick="ftdel(<?php echo $record['id']?>)" class="d-btn">
                    </td>
                </tr>
                <?php }}}} ?>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="./route.js"></script>
</body>
</html>