<?php
$insert_var = FALSE;
if(isset($_POST['submit'])){
   
if(!empty($_POST['vlog'])){
    
    if($_COOKIE['user'] ==0){
        echo "YOU HAVE TO LOGIN FIRST!";
       }
       else{
        $con = mysqli_connect('localhost','root','');
        if(!$con){
            echo "connection failed";
        }
        else{
        $vlog = $_POST['vlog'];
        $user = $_COOKIE['user'];
        $gmail =$_COOKIE['gmail'];
        setcookie("vlog_post",$vlog,time()+3600,"/");
        $sql = "INSERT INTO `wesite`.`vlog` (`name`, `gmail`, `vlog`) 
        VALUES ('$user', '$gmail', '$vlog');";
        mysqli_query($con,$sql);
        $con->close();
        }
       }
    }
    else{
        $insert_var = TRUE;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="post.css">
    <title>Document</title>
</head>
<body>
    <!-- navbar start -->
<NAV>
        <p id="name"><strong>Inweave</strong></p>
       <a href="index1.php">HOME</a>
       <a href="post.php">POST</a>
       <a href="logout.php" class="logout_a">LOGOUT</a>
       <a href="index.php" class="login1_a">LOGIN</a>
       <input type="search" value="" placeholder="SEARCH">
       <?php
      if($_COOKIE['user'] ==0){
        echo "<style> 
        .login1_a{
            display:block;
        }
        .logout1_a{
            display:none;
        }
     </style>";
      }
      else {
        echo "<style> 
        .login1_a{
            display:none;
        }
        .logout1_a{
            display:block;
        }
     </style>";
     echo "<p class='profile'>Hi!" .$_COOKIE['user'] ."</p>";
     echo "<style>
     .profile{
        color : white;
        background-color: black;
        margin: auto;
        padding: 10px;
     }
     </style>";
      }
      ?>
</nav>
<!-- nav end -->
<p class="vlog_p">Enter Your Vlog</p>
<?php
if($insert_var){
    Echo "<p class='alert_red'>Enter some Text!</p>";
}
?>
<form action="" method="post" class="vlog_form">
    <textarea name="vlog" id="vlog" cols="30" rows="10"></textarea>
<button type="submit" name="submit" value="submit">SUBMIT</button>
</form>
</body>


</html>