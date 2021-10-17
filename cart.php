<?php
session_start();
include "navbar.php";
include "database.php";
if (isset($_POST['buy'])) {
  $_SESSION['cart']=array();
}
?>




<h1 class="display-1 head">Cart</h1>
<table class="table">     
    <tr>
      <th>id</th>
      <th>bookname</th>
    </tr>

    <tr>
     <?php for($i = 0 ; $i < count($_SESSION['cart']) ; $i++) {
            echo '<tr><td>'.$_SESSION['cart'][$i][0].'</td>';
            echo '<td>'.$_SESSION['cart'][$i][1].'</td></tr>';
     }  ?>
    </tr>
</table>



<form method="post">
<button  type="submit" class="btn btn-primary" name="buy">Place Order</button>
</form>



<?php 

  if(count($_SESSION['cart'])>0){  
  $x=$_SESSION['cart'][count($_SESSION['cart'])-1][0];
  
  $query ="SELECT * FROM book ORDER BY ID DESC LIMIT 1";
  $result = mysqli_query($con, $query) or die(mysql_error());
  while ($row = mysqli_fetch_array($result)) {
  $size=$row['id'];
  }

  
  $confidence=array_fill(0,$size+1,0);
  $query    = "SELECT * FROM transactions ";
  $result = mysqli_query($con, $query) or die(mysql_error());
  
  $count_x=0;
  while ($row = mysqli_fetch_array($result)) {
          $temp = json_decode($row['array'], true);
        
                
        
          if(in_array($x,$temp['array']))
          {
            
            $count_x=$count_x+1;
            //print_r($temp['array']); echo ("<br>");
            foreach($temp['array'] as $key => $val) {
            
                //print("x");
                $confidence[$val]=$confidence[$val]+1;
              
            }
          
          }
   }  

for($i=0;$i<count($_SESSION['cart']);$i++)
  {
    $confidence[$_SESSION['cart'][$i][0]]=-1;
  }
for($i=0;$i<10;$i++)
{
  $confidence[$i]=-1;
}
arsort($confidence);
//print_r($confidence);

$keys = array_keys($confidence);

$query=  "SELECT * FROM book WHERE  id=$keys[0] or id=$keys[1] or id=$keys[2] or id=$keys[3]";



$result = mysqli_query($con, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      
      $i=0;
      
      if ($rows > 0) {
      echo "<table><tr>";
       while($arr=$result->fetch_assoc())
       {
        //print_r($arr);
           $i+=1;
           if($i<=4){
           $id_of_book=$arr["id"];
          echo ('
            <td>
            <div class="card-deck bg-light border">
            <img class="card-img-top" src="images/'.$arr["id"].'.jpg" alt="Card image cap" style="width: auto; max-height:250px; margin-left:50px;">
            <div class="card-body">
                <h5 class="card-title " style=" font-size: 15px;">'.$arr["bname"].'  <br><i>by "'.$arr["author"].'"</i><br> price: RS '.$arr["price"].'</h5>
                <a href="rating.php?id2='.$arr['id'].'&name='.$arr['bname'].'" class="card-link" style=" ">buy</a>
                <a href="rating.php?id='.$arr['id'].'" class="card-link" style=" ">like</a>
                <span></span>
            
                <span style="color:red align:right"; >');$rate='SELECT rating from book WHERE id='.$arr["id"] ;   $like= mysqli_query($con, $rate);  while ($row = mysqli_fetch_array($like)){echo($row['rating']);} echo('</span>
                <span> &#10084;&#65039 </span>
            </div></div></td>
            ');
           }
          }
        }




      }    
            
?>

