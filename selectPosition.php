<?php
require('connection.php');

session_start();
if (empty($_SESSION['fname'])) {
    header("location:index.php");
}
?>
<html>

<head>
    <?php include_once 'includes/header.php' ?>
    <?php include_once 'includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="container " style=" margin: 14.5rem auto; ">
        <div class="row text-center ">
            <h2 class="font-weight-bold">Ghana Polling System</h2>
        </div>

        <div class="row text-center" style="margin-top: 30px;">
            <h4>Choose position to vote on</h4>
            <div class="">
                <a href="presidentialVote.php"><button class="btn">Presidential</button></a>
                <a href="parlimentaryVote.php"><button class="btn">Parlimentary</button></a>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>

    <?php include_once 'includes/bootstrapJs.php' ?>
</body>

</html>