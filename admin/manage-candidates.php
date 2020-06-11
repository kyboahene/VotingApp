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
    <div class="container " style="  margin: 14.5rem auto; ">
        <div class="row text-center ">
            <h2 class="font-weight-bold">Ghana Polling System</h2>
        </div>

        <div class="row text-center" style="margin-top: 30px;">
            <h4 class="font-weight-bold">Manage Candidates</h4>
            <div class="">
                <a href="updateCandidates.php"><button class="btn">Update candidates</button></a>
                <a href="insertCandidates.php"><button class="btn">Add candidates</button></a>
            </div>
        </div>
        <div class="row text-center">
			<a href="admin.php" class="text-dark mt-3">
				<h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
			</a>
		</div>
    </div>
    <?php include_once '../includes/footer.php' ?>

    <?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>