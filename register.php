<?php include "style.php";
include "navbar.php";
?>

<div class="frm .form-inline text-center body">
    <h1 class="display-1 head">Register</h1>
        <form action="" method="post">
            <h2 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">username</h2>
            <input type="string" class="form-control " style="width: 40%; margin-left: 30%;" name="username"><br>
            <h2 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">password</h2>
            <input type="password" class="form-control" style="width: 40%; margin-left: 30%;" name="password"><br>
            <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 40%;">submit</button>
        </form>    
</div>


<?php
    include "database.php";
    if (isset($_REQUEST['username'])) {
        $uname = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $allow=1;
        include "validate.php";
        
        $sql_query = "INSERT INTO user (username,password) VALUES ('$uname','$password')";
        
        if ($con->query($sql_query) === TRUE and $allow==1) {
            echo "<script>alert('New record created successfully')</script>";
        
        } else {
            if($allow==0){echo "<script>alert('enter valid username or password')</script>";}
            else{echo "<script>alert('database failure')</script>";}
        }
    }
    
?>

