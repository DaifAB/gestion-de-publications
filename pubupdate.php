
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


<h1 class="title">Modifier ta publication !</h1>
<div class="form-container">
<form class="text-center border border-light p-5" action="" method="post">
    
    <input type="text" class="form-control mb-4" name="title" placeholder="Titre" required />
    <textarea name="text"  class="form-control rounded-0">Ta publication</textarea>
    <input type="submit" name="submit" value="Publier !" class="btn btn-info btn-block my-4" />
    


</div>

<?php
require('config.php');
require('class.php');

    if(isset($_POST['title']) && isset($_POST['text'])){



        $post = new POST();

        $post->title = stripslashes($_REQUEST['title']);
        $post->title = mysqli_real_escape_string($conn, $post->title); 

        $post->content = stripslashes($_REQUEST['text']);
        $post->content = mysqli_real_escape_string($conn, $post->content);
        $date_now = date('Y-m-d H:i:s');
        $post->date = $date_now;

        $post->id = $_GET['id'];
        $update_query = mysqli_query($conn,"UPDATE post SET title = '" . $post->title . "', content = '" . $post->content . "', date = '" . $post->date . "' WHERE id = '" . $post->id . "'");
        header('location: dashboard.php');

}

?>

</body>
</html>



	<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->