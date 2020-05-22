<?php session_start() ?>
<html>

<head>
    <?php include_once 'includes/header.php' ?>
    <?php include_once 'includes/bootstrapCss.php' ?>
    <link rel="stylesheet" href="css/css.css" />
</head>

<body>
    <?php include_once 'includes/navbar.php' ?>
    <div class="main">
        <div class="login">
            <h1>Login</h1>
            <form name="form1" method="POST">
                <input type="text" name="id_number" placeholder="Voter's ID Number" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="sign in" class="btn" />
            </form>
            <div class="question">
                <p>
                    Don't have an account?&nbsp;&nbsp; <a href="register.php">Sign Up</a>
                </p>
            </div>
        </div>
    </div>

    <?php include_once 'includes/footer.php ' ?>

    <?php include_once 'includes/bootstrapJs.php' ?>


</body>

</html>

<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $id_number = mysqli_escape_string($con, $_POST['id_number']);
    $password = mysqli_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM voters WHERE ID_number= '$id_number'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $num = 1;

    if ($count == $num) {
        $row = mysqli_fetch_array($result);
        $_SESSION['constituency'] = $row['constituency'];
        $fname = $row['first_name'];
        $_SESSION['member_id'] = $row['member_id'];
        $_SESSION['fname'] = $fname;

        echo " <script>window.open('selectPosition.php', '_self')</script>";
    } else {
        echo "<script>alert('Invalid credentials')</script>
                  <script>header(location: index.php)</script>";
    }
}
