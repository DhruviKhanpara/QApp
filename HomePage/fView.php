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
    <link rel="stylesheet" href="./fStyle.css">
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
                        <li><input type="submit" value="Back" onclick="back()" id="outbtn"></li>
                        <?php if(isset($_GET['display'])){?>
                        <li><input type="submit" value="Add Q" onclick="fqadd()" id="outbtn"></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="heading">
                    <img src="../Images/icon.png" height="40px" width="60px">
                    QA Times
                </div>
            </nav>
        </div>
        <div class="container">
            <?php
            $count=0;

            if(isset($_GET['view'])){
                $id1=$_GET['view'];
                $_SESSION['category']=$id1;
                $q="select id,question from question where category=$id1";
                $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
                $question=mysqli_num_rows($result);
                if($question>0){
                    ?>
                    <h1>Available Questions</h1>
                    <div class="table">
                        <table>
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
                                        <input type="submit" value="View" onclick="fqview(<?php echo $record['id']?>)" class="v-btn">
                                        <input type="submit" value="Edit" class="e-btn" disabled>
                                        <input type="submit" value="Delete" class="d-btn" disabled>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php 
                }else{
                    ?>
                    <p id="message">Question is not here</p>
                    <?php
                }
                ?>
                <script type="text/javascript">
                    function back(){
                        window.location="./fHome.php";
                    }
                </script>
                        
                <?php
            }else if(isset($_GET['display'])){
                $id2=$_GET['display'];
                $_SESSION['category']=$id2;
                $q="select id,question from question where category=$id2";
                $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
                $question=mysqli_num_rows($result);
                if($question>0){
                    ?>
                    <h1>Available Questions</h1>
                    <div class="table">
                        <table>
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
                                        <input type="submit" value="View" onclick="fqview(<?php echo $record['id']?>)" class="v-btn">
                                        <input type="submit" value="Edit" onclick="fqedit(<?php echo $record['id']?>)" class="e-btn">
                                        <input type="submit" value="Delete" onclick="fqtdel(<?php echo $record['id']?>)" class="d-btn">
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php 
                }else{ ?>
                    <p id="message">Question is not here</p>
                <?php } ?>
                    <script type="text/javascript">
                        function back(){
                            window.location="./fHome.php";
                        }
                    </script>
            <?php } ?>
            <?php
            if(isset($_GET['question'])){
                ?>
                <div class="ques">
                    <div class="qbox">
                        <?php
                        $id2=$_GET['question'];
                        $q="select * from question where id=$id2";
                        $q1="select createAt,updateAt,updateBy from question where id=$_GET[question]";
                        $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
                        $result1=mysqli_query($con,$q1) or die("database error:".mysqli_error($con));
                        $record=mysqli_fetch_array($result);
                        $row=mysqli_fetch_array($result1);
                        ?>
                        <h3>Question : <?php echo $record['question']?></h3>
                        <hr/>
                        <h3> A <?php echo $record['opt1']?></h3>
                        <h3> B <?php echo $record['opt2']?></h3>
                        <h3> C <?php echo $record['opt3']?></h3>
                        <h3> D <?php echo $record['opt4']?></h3>
                        <h3>Answer : <?php echo $record['answer']?></h3>
                        <hr/>
                        <h3>Create on: <?php echo $row['createAt'];?>, update on:  <?php echo $row['updateAt'];?> by  <?php echo $row['updateBy']=='self'?'User':$row['updateBy'];?></h3>
                    </div>
                </div>
                <script type="text/javascript">
                    function back(){
                        window.location="./fView.php?display=<?php echo $record['category']?>";
                    }
                </script>
                <?php
            } ?>
        </div>
    <?php } ?>
    <script type="text/javascript" src="./route.js"></script>
</body>
</html>