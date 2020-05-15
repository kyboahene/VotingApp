<?php session_start() ?>
<!DOCTYPE html>

<head>
    <?php include_once('includes/header.php'); ?>
    <?php include_once 'includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>

    <div class='login'>
        <h1 class='font-weight-bold'>
            Update Credentials
        </h1>
        <form action="" method="POST">
            <?php
            require('connection.php');
            $run_sql = mysqli_query($con, "SELECT * FROM voters WHERE member_id = '$_SESSION[member_id]'");
            if ($run_sql) {
                $rows = mysqli_fetch_array($run_sql);
                $id = $rows['member_id'];
                $fname = $rows['first_name'];
                $lname = $rows['last_name'];
                $id_number = $rows['ID_number'];
                echo "
                      <input type='text' name='first_name' value = '$fname'  placeholder='First Name'/>
                      <input type='text' name='last_name' value = '$lname'  placeholder='Last Name'/>
                      <input type='text' name='id_number' value = '$id_number'  placeholder='Voter's ID Number'/>
                      <input type='password' name='password' placeholder='New password'  />
                      <input type='submit' name='update' value=Update class='btn' />
                           ";
            }

            ?>
        </form>
        <a href="selectPosition.php" class="text-dark">
            <h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
        </a>
    </div>

    <?php include_once 'includes/footer.php' ?>

    <?php include_once 'includes/bootstrapJs.php' ?>
</body>

</html>

<?php
require('connection.php');

if (empty($_SESSION['fname'])) {
    header('location:index.php');
}
if (isset($_POST['update'])) {
    $myFirstName = $_POST['first_name'];
    $myLastName = $_POST['last_name'];
    $myID = $_POST['id_number'];
    $myPassword = $_POST['voter_password'];

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = mysqli_query($con, "UPDATE voters SET first_name='$myFirstName', last_name='$myLastName', ID_number='$myID', voter_password='$pass' WHERE member_id = '$id'");

    if ($sql) {
        $_SESSION['fname'] = $myFirstName;
        echo "<script>alert('Update successful')</script>";
        header('Location: manage-profile.php');
    } else {
        echo "<script>alert('Profile couldn't be updated')</script>";
    }
}
?>