<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/header.php' ?>
</head>

<body>
    <?php
    session_start();
    ?>
    <?php include_once 'includes/navbar.php' ?>
    <?php include('connection.php') ?>
    <div class="center row" style="border: 1px black solid; padding-left: 0; padding-top: 30px; padding-bottom: 30px; margin-top: 50px;  ">
        <h1>Add candidates</h1>
        <form name="form1" method="POST">
            <div style="margin-top: 20px; ">
                <label>Candidate Name :</label>
                <input type="text" name="candidate_name" required />
            </div>
            <div style="margin-top: 20px">
                <label>Candidate Image</label>
                <input name="img1" type="file" class="form-control" required>
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
                <label>Party Logo :</label>
                <input name="img2" type="file" class="form-control" required>
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
            <div>
                <input type="submit" name="submit" value="submit" class="btn" />
            </div>
        </form>
    </div>
    <?php include_once 'includes/js.php' ?>
</body>

</html>

<?php
require('connection.php');
if (isset($_POST['submit'])) {

    $name =  $_POST['candidate_name'];
    $party_name_id =  $_POST['party'];
    $position = $_POST['position'];

    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];

    move_uploaded_file($_FILES['img1']['tmp_name'], "images/$img1");
    move_uploaded_file($_FILES['img2']['tmp_name'], "images/$img2");

    $num = 1;
    echo $img1;


    $insert = "INSERT INTO `candidates`( `candidate_name`, `candidate_img`, `party_id`, `party_logo`, `position_id`, `candidate_cvotes`) VALUES ('$name',  '$img1', '$party_name_id', '$img2', '$position', 0)";
    $run_insert = mysqli_query($con, $insert);

    if ($run_insert) {
        echo "<script>alert('Candidates has been added successfully')</script>";
    } else {
        echo "<script>alert('not successful')</script>";
        echo "<script>header(location:insertCandidates.php)</script>";
    }
}


?>