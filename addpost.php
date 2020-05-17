<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
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
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<?php

require('config.php');
require('class.php');

if (isset($_REQUEST['title'], $_REQUEST['text'])){
    
  $post = new POST();

  $post->title = stripslashes($_REQUEST['title']);
  $post->title = mysqli_real_escape_string($conn, $post->title); 

  $post->content = stripslashes($_REQUEST['text']);
  $post->content = mysqli_real_escape_string($conn, $post->content);

  $post->user_id = $_SESSION['id'];
  
  $date_now = date('Y-m-d H:i:s');
  $post->date = $date_now;



    $query = "INSERT into `post` (title, content, date, id_user)
              VALUES ('$post->title', '$post->content', '$post->date','$post->user_id')";

    $res = mysqli_query($conn, $query);
    if($res){
      header("Location: index.php");
    }
}else{
?>
<h1 class="title">Ajoute ta publication !</h1>
<div class="form-container">
<form class="text-center border border-light p-5" action="" method="post">
    
    <input type="text" class="form-control mb-4" name="title" placeholder="Titre" required />
    <textarea name="text"  class="form-control rounded-0">Ta publication</textarea>
    <input type="submit" name="submit" value="Publier !" class="btn btn-info btn-block my-4" />
    


</div>
<?php } ?>
</body>
</html>



	<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->