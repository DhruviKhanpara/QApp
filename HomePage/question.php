<?php
    include "../connection.php";

    ?>
    <script type="text/javascript">
    let questions = [
    <?php
        if(isset($_GET['quiz'])){
            $quiz=$_GET['quiz'];
        
            $q="select question,opt1,opt2,opt3,opt4,answer from question where category=$quiz";
            $result=mysqli_query($con,$q) or die("database error:".mysqli_error($con));
            $length=mysqli_num_rows($result);
        
            $count=0;
            while($record=mysqli_fetch_assoc($result)){
                $count++;
            ?>
                {
                    numb: <?php echo $count?>,
                    question: "<?php echo $record['question']?>",
                    answer: "<?php echo $record['answer']?>",
                    options: [
                        "<?php echo $record['opt1']?>",
                        "<?php echo $record['opt2']?>",
                        "<?php echo $record['opt3']?>",
                        "<?php echo $record['opt4']?>"
                    ]
                },
            <?php }
        } ?>
    ];
</script>