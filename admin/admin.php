<?php
require('../connection.php');

session_start();
if (empty($_SESSION['admin'])) {
    header("location:index.php");
}
?>
<html>

<head>
    <?php include_once '../includes/header.php' ?>
    <?php include_once '../includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <div class="container " style="  margin: 14.3rem auto; ">
        <div class="row text-center ">
            <h2 class="font-weight-bold">Ghana Polling System</h2>
        </div>

        <div class="row text-center" style="margin-top: 30px;">
            <h4>Overview of the election</h4>
            <div class="">
                <a href="results.php"><button class="btn">Results</button></a>
                <a href="manageUsers.php"><button class="btn">Manage Users</button></a>
                <a href="manage-candidates.php"><button class="btn">Manage candidates</button></a>
            </div>
        </div>
    </div>
    <?php include_once '../includes/footer.php' ?>

    <?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>