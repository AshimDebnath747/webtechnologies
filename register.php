<?php
$exist = FALSE;
$insert = false;
// setcookie("user","Ashim",time()+3600,"/");
 if(isset($_POST['btn'])){
   if(isset($_POST['terms'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);
   
    
    if( empty($_POST['name']) or empty($_POST['gmail']) or empty($_POST['password'])){
        die ("Please enter all the fields");
    }
    else{

        $name = $_POST['name'];
        $gmail = $_POST['gmail'];
        $pass_word = $_POST['password'];
        $sql1 = "SELECT * from `wesite`.`register` WHERE gmail='$gmail'";
        $result = mysqli_query($con,$sql1);
        if(mysqli_num_rows($result)==0){
        setcookie("user",$name,time()+3600,"/");
        setcookie("gmail",$gmail,time()+3600,"/");
        $sql = "INSERT INTO `wesite`.`register` ( `name`, `gmail`, `password`) 
        VALUES ('$name', '$gmail', '$pass_word');";
        mysqli_query($con,$sql);
        $con->close();
        $insert=true;
        }
        else{
            $exist = TRUE;
        }
    }
    
}
else{
    echo "check the terms and conditions";
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="script1.js"></script>
</head>
<body>
    <NAV>
        <p id="name"><strong>Inweave</strong></p>
       <a href="index1.php">HOME</a>
       <a href="po">POST</a>
       <a href="index.php">LOGIN</a>
       <input type="search" value="" placeholder="SEARCH">
        <?php
      // if(!empty($_POST['name'])){
    //     $server = "localhost";
    //     $username = "root";
    //     $password = "";
    
    //     $con = mysqli_connect($server,$username,$password);
    //    $sql1 = "SELECT * from `register`.`register` where name='$name';";
    //    $query = mysqli_query($con,$sql1);
    //    $val = mysqli_fetch_assoc($query);
    //    $con->close();
    //    echo $val['name'];
//}
         ?> 
   </NAV>   
   <?php
  
     if($insert == true)
     {
      echo "<p class='alert'>You are successfully registered as: $name</p>";
     }
     elseif($exist == TRUE){
        echo "<p class='alert_red'>USER ALREADY EXISTS</p>";
     }
     else{

     }
   ?>
  <form action="" method="post">
    <label>
        <p>User name</p>
        <input type="text" name="name" placeholder="e.g: Deyashini Paul" id="name">
    </label>
    <label>
        <p>G-mail</p>
        <input type="text" name="gmail" placeholder="e.g: deyashinipaul100&gmail.com">
    </label>
    <label for="">
        <p>password</p>
        <input type="number" name="password" id="" placeholder="">
    </label><br>
    <label>
        <input type="checkbox" name="terms" id="" value="true">terms and conditions
    </label><br>
    <label for="">
        <button class="btn" name="btn">Submit</button>
    </label>
  </form>
</html>
