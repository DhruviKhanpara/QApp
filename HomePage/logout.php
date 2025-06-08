<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['category']);
    unset($_SESSION['msg']);
    ?>
    <script type="text/javascript">
        window.location="../IndexPage/index.php";
    </script>
    <?php
?>