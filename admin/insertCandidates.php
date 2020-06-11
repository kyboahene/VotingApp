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
        header("location:index.php");
    }
    ?>
    <?php include_once '../includes/navbar.php' ?>
    <?php include('../connection.php') ?>
    <div class="container" style=" padding-left: 0; padding-top: 30px; padding-bottom: 30px; margin-top: 40px;  margin-bottom: 100px">
        <h1 class="font-weight-bold text-center">Add candidates</h1>
        <form name="form1" method="POST">
            <div class="form-group" style="margin-top: 10px; ">
                <label class="font-weight-bold">Candidate Name :</label>
                <input type="text" class="form-control"name="candidate_name" />
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label class="font-weight-bold">Candidate Image</label>
                <input name="image" type="file" class="form-control" />
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label class="font-weight-bold">Party Name </label>
                <select name="party" class="form-control">
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
            <div class="form-group" style="margin-top: 20px">
                <label class="font-weight-bold">Position: </label>
                <select name="position" class="form-control">
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
            <div class="form-group" style="margin-top: 20px; ">
                <label class="font-weight-bold">Constituency :</label>
                <select name="constituency" class="form-control">
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
            <div class="form-group">
                <input type="submit" name="submit" value="submit" class="btn form-control" />
            </div>
        </form>
        <a href="manage-candidates.php" class="text-dark mt-3">
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
     
    // $img = rand(10, 1000). "-" .$_FILES['image']['name'];
    // $tName = $_FILES['images']['tmp_name'];
    
    // $dir = '/images';   
    // move_uploaded_file($tName, $dir. '/' .$img);

    $num = 2;

    if (!$position == 2) {
        $insert = "INSERT INTO `pres_candidates`( `candidate_name`, `party_id`, `position_id`, `candidate_votes`) VALUES ('$name', '$party_name_id', '$position', 0)";
        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {
            echo "<script>alert('Candidates has been added successfully')</script>";
        } else {
            echo "<script>alert('not successful')</script>";
            echo "<script>header(location:insertCandidates.php)</script>";
        }
    } else {
        $insert = "INSERT INTO `par_candidates`(`candidate_name`, `party_id`, `position_id`, `const_id`, `candidate_votes`) VALUES ('$name','$party_name_id', '$position', '$constituency', 0)";
        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {
            echo "<script>alert('Candidates has been added successfully')</script>";
        } else {
            echo "<script>alert('it was not successful')</script>";
            echo "<script>header(location:insertCandidates.php)</script>";
        }
    }
}


?>