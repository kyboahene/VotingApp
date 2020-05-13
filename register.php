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
    <?php include_once 'includes/js.php' ?>
</body>

</html>

<?php
require('connection.php');
//Process
if (isset($_POST["submit"])) {

    $fname = mysqli_real_escape_string($con, $_POST["first_name"]);
    $lname = mysqli_real_escape_string($con, $_POST["last_name"]);
    $id_number = mysqli_real_escape_string($con, $_POST["id_number"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO `voters`(first_name, last_name, ID_number,  voter_password) VALUES('$fname', '$lname', '$id_number', '$pass')";
    $result = mysqli_query($con, $sql);
    echo $count;

    if ($result) {
        $run = "SELECT * FROM voters WHERE ID_number='$id_number' and first_name='$fname'";
        $res = mysqli_query($con, $run);
        $rows = mysqli_fetch_array($res);
        $_SESSION['member_id'] = $rows['member_id'];
        $_SESSION['fname'] = $rows['first_name'];

        echo "<script>window.open('selectPosition.php', '_self')</script> ";
    } else {
        echo "<script>alert('failed')</script>
        <script>window.open('register.php', '_self')</script>";
    }
}

?>