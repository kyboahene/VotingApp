<?php
require('connection.php');

session_start();
// if (empty($_SESSION['fname'])) {
//     header("location:access-denied.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('includes/header.php'); ?>
    <?php include_once 'includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <div class="container">
        <div class="row center" style="margin-top: 30px; margin-bottom: 30px ">
            <div style="margin-left: 45px">
                <h1 class="font-weight-bold">ELECTION <?php echo Date('Y') ?></h1>
                <h4>PRESIDENTIAL BALLOT</h4>
            </div>
            <div class="">
                <form method="POST">
                    <table style="margin-top: 30px">
                        <thead>
                            <tr>
                                <th scope="col">Candidate</th>
                                <th scope="col">Party</th>
                                <th scope="col"> Vote</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('connection.php');
                            $sql = "SELECT * from pres_candidates WHERE position_id= 1";
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_array($result)) {
                                $name = $row['candidate_name'];
                                $partyLogo = $row['party_logo'];
                                $img = $row['candidate_img'];
                                $party = $row['party_id'];
                                $can_id = $row['candidate_id'];

                                $run_id = "SELECT * FROM party WHERE party_id = '$party'";
                                $run = mysqli_query($con, $run_id);
                                $array = mysqli_fetch_array($run);

                                echo "<tr>
                            <td name='name'> $name</td>
                            <td> " . $array['party_name'] . "&nbsp; $partyLogo</td>
                            <td ><input type='submit' name='vote' value='Vote' class='btn'/></td>
                    </tr> ";
                            }
                            ?>

                        </tbody>
                    </table>
                </form>
            </div>
            <a href="selectPosition.php" class="text-dark mt-3">
                <h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
            </a>
        </div>
    </div>

    <?php include_once 'includes/footer.php' ?>

    <?php include_once 'includes/bootstrapJs.php' ?>
    <?php include_once('includes/js.php'); ?>
</body>

</html>


<?php
require('connection.php');

if (isset($_POST['vote'])) {
    $can_name = $_POST['_name'];

    if (isset($_SESSION['twin'])) {
        echo "<script>alert('You have already voted')</script>";
    } else {
        $sql = "UPDATE `candidates` SET `candidate_votes` = candidate_votes + 1   WHERE candidate_name= '$can_name'";
        $run = mysqli_query($con, $sql);

        if ($run) {
            $_SESSION['twin'] = $_SESSION['fname'];
            echo "<script>alert('You casted your vote for $name')</script>";
            echo  "<script>window.open('selectPosition.php', '_self')</script>";
        } else {
            echo "<script>alert('Your vote didn't go through...Please vote again')</script>";
        }
    }
}

?>