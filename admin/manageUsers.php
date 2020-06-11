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
    <div class="container" style="  margin-right: 11rem ; margin-left: 11rem ; margin-bottom: 15rem ; margin-top: 10rem ;"  >
        <div class="row text-center">
            <h2 class="font-weight-bold">Ghana Polling System</h2>
        </div>
          
        <h4 class="font-weight-bold text-center">Manage Users</h4>
        <div class="" style="margin-top: 30px; display: flex">
            <div class="col-lg-3 card px-4 py-3" >
            <?php 
                $get_voters = mysqli_query($con, "SELECT * FROM voters");
                $count_voters = mysqli_num_rows($get_voters);
                $voted = 0;
                $not_voted = 0;
                $today_date = date("Y-m-d");
                $new = 0;
                
                while ($row = mysqli_fetch_array($get_voters)){
                    if ($row['pres_voted'] == 1 && $row['par_voted'] == 1){
                        $voted = $voted + 1; 
                    } 
                    if($row['pres_voted'] == 0 && $row['par_voted'] == 0){
                        $not_voted = $not_voted + 1;
                    }
                    if(substr($today_date, 8, 2) - substr($row['registered_date'], 8, 2) <= 2){
                        $new = $new + 1;
                    }
                }


                
            ?>
                <h5 class="font-weight-bold float-left">VOTERS</h5>
                <p style="font-size: 30px;">
                    <i class="fas fa-users float-left"></i><span class="counter text-success float-right"><?php echo $count_voters ?></span>
                </p>
            </div>
            <div class="col-lg-3 card px-4 py-3 mx-3" >
                <h5 class="font-weight-bold float-left">NEW VOTERS</h5>
                <p style="font-size: 30px;">
                    <i class="fas fa-users float-left"></i><span class="counter text-success float-right"><?php echo $new ?></span>
                </p>
            </div>
            <div class="col-lg-3 card px-4 py-3 mr-3">
                <h5 class="font-weight-bold float-left">VOTING</h5>
                <p style="font-size: 30px;">
                    <i class="fas fa-chart-bar float-left"></i><span class="counter text-success float-right"><?php echo $not_voted ?></span>
                </p>
            </div>
            <div class="col-lg-3 card px-4 py-3">
                <h5 class="font-weight-bold float-left">VOTED</h5>
                <p style="font-size: 30px;">
                    <i class="fas fa-users float-left"></i><span class="counter text-success float-right"><?php echo $voted ?></span>
                </p>
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