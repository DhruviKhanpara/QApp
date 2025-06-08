<?php
    include '../connection.php';

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

        if(isset($_GET['question'])){
            mysqli_query($con,"DELETE FROM question WHERE id=$_GET[question]") or die("database error:".mysqli_error($con));

            $id1=$_SESSION['category'];
            mysqli_query($con,"update assessment set qTotal=qTotal-1 where id=$id1");

            ?>
            <script type="text/javascript">
                window.location.href="./fView.php"+'?display='+<?php echo $id1?>;
            </script>
            <?php
        }else if(isset($_GET['test'])){
            $id1=$_SESSION['category'];

            mysqli_query($con,"DELETE FROM question WHERE category=$id1") or die("database error:".mysqli_error($con));
        
            mysqli_query($con,"DELETE FROM assessment WHERE id=$_GET[test]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./fView.php";
            </script>
            <?php
        }else if(isset($_GET['atdel'])){

            mysqli_query($con,"DELETE FROM question WHERE category=$_GET[atdel]") or die("database error:".mysqli_error($con));
        
            mysqli_query($con,"DELETE FROM assessment WHERE id=$_GET[atdel]") or die("database error:".mysqli_error($con));
        
            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=atest";
            </script>
            <?php
        }else if(isset($_GET['stdel'])){
            mysqli_query($con,"DELETE FROM question WHERE category=$_GET[stdel]") or die("database error:".mysqli_error($con));
        
            mysqli_query($con,"DELETE FROM assessment WHERE id=$_GET[stdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=stest";
            </script>
            <?php
        }else if(isset($_GET['aqdel'])){
            $q="select category from question where id=$_GET[aqdel]";
            $res=mysqli_query($con,$q) or die("database error:".mysqli_erre($con));
            $row=mysqli_fetch_array($res);
        
            mysqli_query($con,"update assessment set qTotal=qTotal-1 where id=$row[category]");
            mysqli_query($con,"DELETE FROM question WHERE id=$_GET[aqdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?aQusList="+<?php echo $row['category']?>;
            </script>
            <?php
        }else if(isset($_GET['sqdel'])){
            $q="select category from question where id=$_GET[sqdel]";
            $res=mysqli_query($con,$q) or die("database error:".mysqli_erre($con));
            $row=mysqli_fetch_array($res);

            mysqli_query($con,"update assessment set qTotal=qTotal-1 where id=$row[category]");
            mysqli_query($con,"DELETE FROM question WHERE id=$_GET[sqdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?sQusList="+<?php echo $row['category']?>;
            </script>
            <?php
        }else if(isset($_GET['sfdel'])){
            mysqli_query($con,"DELETE FROM faculty WHERE id=$_GET[sfdel]") or die("database error:".mysqli_error($con));
        
            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=sfaculty";
            </script>
            <?php

        }else if(isset($_GET['ssdel'])){
            mysqli_query($con,"DELETE FROM student WHERE number=$_GET[ssdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=student";
            </script>
            <?php

        }else if(isset($_GET['sadel'])){
            mysqli_query($con,"DELETE FROM admin WHERE id=$_GET[sadel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=admin";
            </script>
            <?php
        }else if(isset($_GET['careq'])){
            mysqli_query($con,"DELETE FROM admin WHERE id=$_GET[careq]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=adminReq";
            </script>
            <?php
        }else if(isset($_GET['smsgdel'])){
            mysqli_query($con,"DELETE FROM message WHERE id=$_GET[smsgdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./aView.php?list=msglist";
            </script>
            <?php
        }else if(isset($_GET['amsgdel'])){
            mysqli_query($con,"DELETE FROM message WHERE id=$_GET[amsgdel]") or die("database error:".mysqli_error($con));

            ?>
            <script type="text/javascript">
                window.location="./profileView.php?apview=<?php echo $_SESSION['user'];?>";
            </script>
            <?php
        }
    }
?>