 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="home.php">home</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">login </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">register</a>
      </li>
      <?php 
      if(isset($_SESSION["username"])) {
        ?>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="manage.php">manage books</a>
      </li>
      <?php
      }
      ?>
      
    </ul>
      </div>
</nav>