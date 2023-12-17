<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <!-- navbar start -->
<NAV>
        <p id="name"><strong>Inweave</strong></p>
       <a href="index1.php">HOME</a>
       <a href="post.php">POST</a>
       <a href="logout.php" class="logout_a">LOGOUT</a>

       <input type="search" value="" placeholder="SEARCH">
</nav>
<!-- nav end -->
<p class="logout_p">Are you sure you want to logout?</p>

<form action="" method="post">
<button type="submit" name="submit" value="submit">YES</button>
</form>
<?php
    if(isset($_POST['submit'])){
        $user_name = 0;
       setcookie('user',$user_name,time()+3600,"/");
       header("location:index1.php");
    }
    ?>
</body>
</html>