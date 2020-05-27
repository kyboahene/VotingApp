<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/header.php' ?>

    <link rel="icon" href="../images/ecLogo.png" sizes="19x19">
    <?php include_once '../includes/bootstrapCss.php' ?>
</head>

<body>
    <?php
    session_start();
    if (empty($_SESSION['admin'])) {
        header("location:access-denied.php");
    }
    ?>
    <?php include_once '../includes/navbar.php' ?>
    <?php include('../connection.php') ?>
    <div class="center row" style=" padding-left: 0; padding-top: 30px; padding-bottom: 30px; margin-top: 100px;  margin-bottom: 100px">
        <h1 class="font-weight-bold">Add candidates</h1>
        <form name="form1" method="POST">
            <div style="margin-top: 20px; ">
                <label>Candidate Name :</label>
                <input type="text" name="candidate_name" />
            </div>
            <div style="margin-top: 20px">
                <label>Candidate Image</label>
                <input name="can_image" type="file" class="form-control" />
            </div>
            <div style="margin-top: 20px">
                <label>Party Name </label>
                <select name="party">
                    <option>Select a party</option>
                    <?php
                    $get_party = "SELECT * FROM party";
                    $run_get_party = mysqli_query($con, $get_party);
                    while ($row = mysqli_fetch_array($run_get_party)) {
                        $party_id = $row['party_id'];
                        $party_name = $row['party_name'];
                        echo "<option value='$party_id'>$party_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div style="margin-top: 20px">
                <label>Position: </label>
                <select name="position">
                    <option>Select a position</option>
                    <?php
                    $sql = "SELECT * FROM positions";
                    $run_sql = mysqli_query($con, $sql);
                    while ($rows = mysqli_fetch_array($run_sql)) {
                        $position_id = $rows['position_id'];
                        $position_name = $rows['position_name'];
                        echo "<option value='$position_id'>$position_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div style="margin-top: 20px; ">
                <label>Constituency :</label>
                <select name="constituency">
                    <option>Select a constituency</option>
                    <?php
                    $con_sql = "SELECT * FROM constituency";
                    $run_conSql = mysqli_query($con, $con_sql);
                    while ($row = mysqli_fetch_array($run_conSql)) {
                        $const_id = $row['const_id'];
                        $constituency = $row['constituency'];
                        echo "<option value='$const_id'>$constituency</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" name="submit" value="submit" class="btn" />
            </div>
        </form>
        <a href="admin.php" class="text-dark mt-3">
            <h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
        </a>
    </div>

    <?php include_once '../includes/footer.php' ?>

    <?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>

<?php
require('../connection.php');
if (isset($_POST['submit'])) {

    $name =  $_POST['candidate_name'];
    $party_name_id =  $_POST['party'];
    $position = $_POST['position'];
    $constituency = $_POST['constituency'];

    $img1 = $_FILES['can_image'];

    move_uploaded_file($img1, "images/$img1");

    $num = 1;
    echo $party_name_id;

    if (!$position = 2) {
        $insert = "INSERT INTO `pres_candidates`( `candidate_name`, `candidate_img`, `party_id`, `position_id`, `candidate_votes`) VALUES ('$name',  '$img1', '$party_name_id', '$position', 0)";
        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {
            echo "<script>alert('Candidates has been added successfully')</script>";
        } else {
            echo "<script>alert('not successful')</script>";
            echo "<script>header(location:insertCandidates.php)</script>";
        }
    } else {
        $insert = "INSERT INTO `par_candidates`( `candidate_name`, `candidate_img`, `party_id`,`position_id`, `constituency`, `candidate_votes`) VALUES ('$name',  '$img1', '$party_name_id', '$position', '$constituency', 0)";
        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {
            echo "<script>alert('Candidates has been added successfully')</script>";
        } else {
            echo "<script>alert('not successful')</script>";
            echo "<script>header(location:insertCandidates.php)</script>";
        }
    }
}


?>