<?php include "style.php";
include "navbar.php";
?>
<body>
<div class="main" style="background-color: burlywood; font-size:40px; color:white;" class="border border-warning">


<div class="frm .form-inline text-center body">
    <h1 class="display-5 head">make book unavailable</h1>
    <form action="" method="post">

        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">enter id of book</h2>
        <input type="number" class="form-control " style="width: 20%; margin-left: 40%;" name="id"><br> 
        <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 20%;">submit</button>
    </form>    

    <h1 class="display-5 head">make book available</h1>
    <form action="" method="post">

        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">enter id of book</h2>
        <input type="number" class="form-control " style="width: 20%; margin-left: 40%;" name="id1"><br> 
        <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 20%;">submit</button>
    </form>  
    <h1 class="display-5 head">delete book</h1>
    <form action="" method="post">

        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">enter id of book</h2>
        <input type="number" class="form-control " style="width: 20%; margin-left: 40%;" name="id2"><br> 
        <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 20%;">submit</button>
    </form>    
</div>
</div>

</body>


<?php
    include "database.php";
    session_start();
    
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $query    = "UPDATE book SET available=0 WHERE id=$id ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        if ($result) {
            echo "<script>alert('book will be temporary unavailable')</script>";
            
        } else {
            echo "<script>alert('failure in operation')</script>";
        }
    }
    if (isset($_POST['id1'])) {
        $id1 = mysqli_real_escape_string($con,$_POST['id1']);
        $query    = "UPDATE book SET available=1 WHERE id=$id1 ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        if ($result) {
            echo "<script>alert('book is now available')</script>";
            
        } else {
            echo "<script>alert('failure in operation')</script>";
        }
    }
    if (isset($_POST['id2'])) {
        $id2 = mysqli_real_escape_string($con,$_POST['id2']);
        $query    = "DELETE FROM book  WHERE id=$id2 ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        if ($result) {
            echo "<script>alert('book is now available')</script>";
            
        } else {
            echo "<script>alert('failure in operation')</script>";
        }
    }
?>






