<head>
<title>search</title>

</head>


<?php include "navbar.php";?>
<body>
<nav class="navbar navbar-light bg-light">
<div class="container-fluid">
<form action="" method="post" class="d-flex">
<input type="search" class="form-control me-2" style="width: 80%; align:center;" placeholder="Search" name="search"><br> 
<button type="submit" class="btn btn-outline-success" style="">submit</button>
    </form>
  </div>
</nav>



</body>

<table class="table">     
    <tr>
      <th>bookname</th>
      <th>author</th>
    </tr>

    


<?php
    include "style.php";
    include "auth.php";
    
    include "database.php";
    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($con,$_POST['search']);
        $query    = "SELECT * FROM book WHERE bname LIKE '$search' OR author LIKE '$search'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        
        
        while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>'.$row['bname'].'</td>';
                echo '<td>'.$row['author'].'</td></tr>';
         }  
        
    }
?>


</table>
