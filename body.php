<div>
<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="float:left;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="sell.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  sell books <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home.php?books=choice">

                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  People's choice
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="home.php?books=new" >

                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  New Arrivals
                </a>
              </li>
            </ul>
          </div>
        </nav>
</div>
<div style=" width:70%; float:right; margin:10px; margin-right:80px;">
<div class="card-deck"style=" height: 50%;">
  
<?php
    if (isset($_GET['books'])) {
      if($_GET['books']=="new"){
      $query    = "SELECT * FROM book  WHERE available=1 ORDER BY id DESC";}
      elseif($_GET['books']=="choice"){
        $query    = "SELECT * FROM book  WHERE available=1 ORDER BY rating DESC";
      }
      else
      {
        $query    = "SELECT * FROM book WHERE available=1 ORDER BY RAND() ";
      }
      }
    else
    {
    $query    = "SELECT * FROM book WHERE available=1 ORDER BY RAND() ";
    }
    include "retrive_books.php";  

?>

</div>
</div>