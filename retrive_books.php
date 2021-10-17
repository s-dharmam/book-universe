<?php
  include "database.php";
  //session_start();
  
  if (isset($_SESSION['username'])) {
    
      
      
      
      $result = mysqli_query($con, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      $i=0;
      
      if ($rows > 0) {
      echo "<table><tr>";
       while($arr=$result->fetch_assoc())
       {
           $i+=1;
           if($i<=4){
           $id_of_book=$arr["id"];
          echo ('
            <td>
            <div class="card-deck bg-light border">
            <img class="card-img-top" src="images/'.$arr["id"].'.jpg" alt="Card image cap" style="width: auto; max-height:250px; margin-left:50px;">
            <div class="card-body">
                <h5 class="card-title " style=" font-size: 15px;">'.$arr["bname"].'  <br><i>by "'.$arr["author"].'"</i><br> price: RS '.$arr["price"].'</h5>
                <a href="rating.php?id1='.$arr['id'].'&name='.$arr['bname'].'" class="card-link" style=" ">buy</a>
                <a href="rating.php?id='.$arr['id'].'" class="card-link" style=" ">like</a>
                <span></span>
            
                <span style="color:red align:right"; >');$rate='SELECT rating from book WHERE id='.$arr["id"] ;   $like= mysqli_query($con, $rate);  while ($row = mysqli_fetch_array($like)){echo($row['rating']);} echo('</span>
                <span> &#10084;&#65039 </span>
            </div></div></td>
            ');
            
           }
           if($i==4)
           {echo "</tr><tr>";}
           if($i>4 and $i<9){
            echo ('
              <td>
              <div class="card-deck bg-light border">
              <img class="card-img-top" src="images/'.$arr["id"].'.jpg" alt="Card image cap" style="max-height:250px; width:auto; margin-left:50px;">
              <div class="card-body">
                  <h5 class="card-title " style=" font-size: 15px;">'.$arr["bname"].'  <br><i>by "'.$arr["author"].'"</i><br> price: RS '.$arr["price"].'</h5>
                  <a href="rating.php?id1='.$arr['id'].'&name='.$arr['bname'].'" class="card-link" style=" ">buy</a>
                  <a href="rating.php?id='.$arr['id'].'" class="card-link" style=" ">like</a>
                  
                  <span>');$rate='SELECT rating from book WHERE id='.$arr["id"] ;   $like= mysqli_query($con, $rate);  while ($row = mysqli_fetch_array($like)){echo($row['rating']);} echo('</span>
                  <span> &#10084;&#65039 </span>
            </div>
              </td>');
              
             }
        }

         
       }
      } else {
          echo "</tr><script>alert('fail to load books')</script>";
      }

?>