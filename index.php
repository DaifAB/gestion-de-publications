<!DOCTYPE html>
<html>
  <head>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
  <link rel="stylesheet" href="css/style1.css" />
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark black">
  <a class="navbar-brand" href="index.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Mes publications</a>
      </li>
    </ul>
    <span class="navbar-text white-text">
          <?php
        
        session_start();
        
        
        if(!isset($_SESSION["username"])){
         
          echo '<a href="login.php"> Se connecter !</a>';
          
        }else {
          
          echo '<a href="logout.php"> Déconnexion</a>';
        }
      ?>
    </span>
  </div>
</nav>

<center><h1 class="title text-center">Bienvenue dans notre Blog !</h1></center>

<div class="container">
<div class="row">
    <!-- Section: Blog v.3 -->
    <section class="my-5">

<!-- Section heading -->
<h2 class="h1-responsive font-weight-bold text-center my-5">Dernières publications</h2>




<?php

require('config.php');
require('class.php');


$sql = "SELECT post.*, user.username FROM post JOIN user ON post.id_user = user.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>
  
  <section>

<!-- Grid row -->
<div class="row">

  <!-- Grid column -->
  <div class="col-lg-5 col-xl-4">

    <!-- Featured image -->
    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
      <img class="img-fluid" src="img/28140.png" alt="Sample image">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="col-lg-7 col-xl-8">

    <!-- Post title -->
    <h3 class="font-weight-bold mb-3"><strong><?php echo $row["title"] ?> </strong></h3>
    <!-- Excerpt -->
    <p class="dark-grey-text"><?php echo $row["content"] ?></p>
    <!-- Post data -->
    <p>Par <a class="font-weight-bold"><?php echo $row["username"] ?></a>, <?php echo $row["date"] ?></p>
   

  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

<hr class="my-5">




</section>







  <?php
  // echo "username: " . $row["username"]. " <br /> " . $row["date"]. " <br /> title: " . $row["title"]. " <br /> content: " . $row["content"]. "<br>";
}
} else {
echo "<p>Pas de publication ! </p>";
}

 ?>

 
</div>
<br> <br> <br> <br>
<center><p class="addpub"><a href='addpost.php'> Clique ici</a> pour ajouter une publication </p></center>



</div>


</div>


  </body>
</html>


<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->