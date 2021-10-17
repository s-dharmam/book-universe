<?php include "style.php";
include "navbar.php";
?>

<div class="frm .form-inline text-center body">
    <h1 class="display-1 head">Login</h1>
    <form action="" method="post">

        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">username</h2>
        <input type="string" class="form-control " style="width: 40%; margin-left: 30%;" name="username"><br>
        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">password</h2>
        <input type="password" class="form-control" style="width: 40%; margin-left: 30%;" name="password"><br>
        <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 40%;">submit</button>
    </form>    
</div>

<body>
<div class="main" style="background-color: burlywood; font-size:40px; color:white;" class="border border-warning">
</body>


<?php
    include "database.php";
    session_start();
    
    if (isset($_POST['username'])) {
        $uname = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $query    = "SELECT * FROM `user` WHERE username='$uname' AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $_SESSION['username'] = $uname;
            $_SESSION['books'] = "all";
            echo "<script>alert('log in successful')</script>";
            header('Location:home.php');
        } else {
            echo "<script>alert('login failure try again')</script>";
        }
    }
    
?>




