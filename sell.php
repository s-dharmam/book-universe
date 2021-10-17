<?php include "style.php";
include "navbar.php";
?>

<div class="frm .form-inline text-center body" >
    <h1 class="display-1 head">sell books</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%; float:left;">book name</h2>
        <input type="string" class="form-control " style="width: 40%; margin-left: 30%;" name="bname"><br>
        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">author</h2>
        <input type="string" class="form-control" style="width: 40%; margin-left: 30%;" name="author"><br>
        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">price</h2>
        <input type="string" class="form-control" style="width: 40%; margin-left: 30%;" name="price"><br>
        <h1 class="display-5" style="color: white; opacity: 70%; width: 40%; margin-left: 30%;">upload image of book</h2>
        <input type="file" class="form-control" style="width: 40%; margin-left: 30%;" name="bimage"><br>
        <button type="submit" class="btn btn-warning display-5" style="margin-top: 50px;  width: 40%;">submit</button>
    </form>    
</div>

<body>
<div class="main" style="background-color: burlywood; font-size:40px; color:white; " class="border border-warning">
</body>



<?php  
include "database.php";
if (isset($_POST['bname'])) {
    $bname = mysqli_real_escape_string($con,$_POST['bname']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $author = mysqli_real_escape_string($con,$_POST['author']);
    $sql_query = "INSERT INTO book (bname,price,author) VALUES ('$bname','$price','$author')";
    $type=  $_FILES['bimage']['type']; 
    if($type!="image/jpeg")
        {
            echo "<script>alert('jpeg type image only allowed')</script>";  
        }
        else{
            if ($con->query($sql_query) === TRUE) {
                $last_id = $con->insert_id;
                $target_path = "C:/xampp/htdocs/book/images/"; 
                
                $old_name = $target_path.basename( $_FILES['bimage']['name']); 
                $new_name = ltrim(stristr($old_name, '.'), '.'); 
                $target_pat=$target_path.$last_id.".".$new_name; 
                
                if(move_uploaded_file($_FILES['bimage']['tmp_name'], $target_pat)) {  
                    echo "<script>alert('New book added successfully')</script>";
                } else{  
                    echo "Sorry, image not uploaded, please try again!";  
                }
            }
    
    } 
}


?>
