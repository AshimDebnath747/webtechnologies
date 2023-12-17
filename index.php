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
       <a href="index.php" class="login_a">LOGIN</a>
       <input type="search" value="" placeholder="SEARCH">
</nav>
<!-- nav end -->
<form action="" method="post" class="login">
    <label>
        <p>G-mail</p>
        <input type="text" name="gmail" placeholder="e.g: deyashinipaul100&gmail.com" class="gmail">
    </label>
    <label for="">
        <p>password</p>
        <input type="number" name="password" id="" class="password">
    </label>
    <label>
        <button class="btn" name="btn">Submit</button>
        <a href="register.php">new user?</a>
</label>
    <?php
    if(isset($_POST['gmail'])){
           $server = "localhost";
            $username = "root";
            $password = "";
        
            $con = mysqli_connect($server,$username,$password);
            
    if(!$con){
        echo "connection error:".$con;
    }
    else{
        
        $user_mail = $_POST["gmail"];
        $user_password = $_POST["password"];
       $sql2 = "select * from `wesite`.`register` where gmail='$user_mail';";
       $result = mysqli_query($con , $sql2);
       
       if(mysqli_num_rows($result)==0){
        echo "<br>user not registered!";
       }
       else{
        $val=mysqli_fetch_assoc($result);
        if($val['password']==$user_password){
        $user_name = $val['name'];
        $user_gmail = $val['gmail'];
        setcookie("user",$user_name,time()+3600,"/");
        setcookie("gmail",$user_gmail,time()+3600,"/");
        echo "<style>
        label{
         display:none;
        }
        .login_a{
            display:none;
        }
     </style>";
     echo "<p>LOGGED IN SUCCESSFULLY</p>";
        }
        else{
            echo "<p>wrong password!</p>";
        }
    }
    }
    }
    ?>
    </label>
  </form>
</body>
</html>