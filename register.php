<?php session_start() ?>
<!DOCTYPE html>

<head>
    <?php include_once 'includes/header.php' ?>
    <?php include_once 'includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="register">
        <h2>Sign Up </h2>
        <form name="form1" method="POST">
            <input type="text" name="first_name" placeholder="First name" required />
            <input type="text" name="last_name" placeholder="Last Name" required />
            <input type="text" name="id_number" placeholder="Voter's ID Number" required />
            <input type="text" name="constituency" placeholder="Constituency" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Sign Up" class="btn" />
        </form>
        <div class="question">
            <p>
                Already have an account?&nbsp;&nbsp; <a href="index.php">Sign In</a>
            </p>
        </div>
    </div>

    <?php include_once 'includes/footer.php' ?>

    <?php include_once 'includes/bootstrapJs.php' ?>
</body>

</html>

<?php
require('connection.php');
//Process
if (isset($_POST["submit"])) {

    $fname = mysqli_real_escape_string($con, $_POST["first_name"]);
    $lname = mysqli_real_escape_string($con, $_POST["last_name"]);
    $constituency = mysqli_real_escape_string($con, $_POST["constituency"]);
    $id_number = mysqli_real_escape_string($con, $_POST["id_number"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $_SESSION['new'] = 0;

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO `voters`(registered_date, first_name, last_name, ID_number, constituency, voter_password) VALUES( NOW() ,'$fname', '$lname', '$id_number', '$constituency' ,'$pass')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $run = "SELECT * FROM voters WHERE ID_number='$id_number' and first_name='$fname'";
        $res = mysqli_query($con, $run);
        $rows = mysqli_fetch_array($res);
        $_SESSION['constituency'] = $rows['constituency'];
        $_SESSION['member_id'] = $rows['member_id'];
        $_SESSION['fname'] = $rows['first_name'];

        $_SESSION['new'] = $_SESSION['new'] + 1;

        echo "<script>window.open('selectPosition.php', '_self')</script> ";
    } else {
        echo "<script>alert('failed')</script>";
        header('location: register.php');
    }
}

?>