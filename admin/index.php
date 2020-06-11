<?php session_start() ?>
<html>

<head>
    <?php include_once '../includes/header.php' ?>
    <?php include_once '../includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <div class="main">
        <div class="login">
            <h1>Login</h1>
            <form name="form1" method="POST">
                <input type="text" name="id_number" placeholder="Admin's ID Number" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="sign in" class="btn" />
            </form>
            <div class="question">
            </div>
        </div>
    </div>
    
    <?php include_once '../includes/footer.php ' ?>
    
    <?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>

<?php
require('../connection.php');

if (isset($_POST['submit'])) {

    $id_number = mysqli_escape_string($con, $_POST['id_number']);
    $password = mysqli_escape_string($con, $_POST['password']);


    $sql = "SELECT * FROM `administrators` WHERE ID_number= '$id_number'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    
    echo $row['password'];

    if ($row['password'] == $password) {
        $id= $row['admin_id'];
        $_SESSION['admin'] = $id;

        echo " <script>window.open('admin.php', '_self')</script>";
    } else {
        echo "<script>alert('Invalid credentials')</script>
                  <script>header(location: index.php)</script>";
    }
}
