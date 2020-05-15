<?php
require('../connection.php');

session_start();
if (empty($_SESSION['admin'])) {
    header("location:access-denied.php");
}
?>
<html>

<head>
    <?php include_once '../includes/header.php' ?>
    <?php include_once '../includes/bootstrapCss.php' ?>

    <link rel="icon" href="../images/ecLogo.png" sizes="19x19">
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <div class="container " style="margin: 10rem auto; ">
        <div class="row text-center ">
            <h2 class="font-weight-bold">Ghana Polling System</h2>
        </div>

        <div class="row text-center" style="margin-top: 30px;">
            <h4>Overview of the election</h4>
            <div class="">
                <a href="results.php"><button class="btn">Results</button></a>
                <a href="manage-admins.php"><button class="btn">Manage Admins</button></a>
                <a href="insertCandidates.php"><button class="btn">Add candidates</button></a>
            </div>
        </div>
    </div>
    <?php include_once '../includes/footer.php' ?>

    <?php include_once '../includes/bootstrapJs.php' ?>
    <?php include_once '../includes/js.php' ?>
</body>

</html>