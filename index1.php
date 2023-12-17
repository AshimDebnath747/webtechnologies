<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="script1.js"></script>
    <title>Document</title>
</head>
<body>
   
    
    <NAV>
     <p id="name"><strong>Inweave</strong></p>
    <a href="index1.php">HOME</a>
    <a href="post.php">POST</a>
    <a href="index.php" class="login1_a">LOGIN</a>
    <a href="logout.php" class="logout1_a">LOGOUT</a>
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
//        if(!empty($_POST['name'])){
//         $server = "localhost";
//         $username = "root";
//         $password = "";
    
//         $con = mysqli_connect($server,$username,$password);
//        $sql1 = "SELECT * from `register`.`register` where name='$name';";
//        $query = mysqli_query($con,$sql1);
//        $val = mysqli_fetch_assoc($query);
//        $con->close();
//        echo $val['name'];
// }
         ?>
</NAV>
<div class="contents">
   <?php 
   $comment = NULL;
   $con = mysqli_connect("localhost","root","");
   $sql = "SELECT * FROM `wesite`.`vlog`";
   $sql01 = "SELECT * FROM `wesite`.`comment`";
   $result = mysqli_query($con,$sql);
   $result01 = mysqli_query($con,$sql01);
  
   while($row = mysqli_fetch_assoc($result)){
        echo "<article class=vlog".$row['slno']."><h3>".$row['name']."</h3>
        <p>".$row['vlog']."</p>
        <form method='post'>
        <input name=input".$row['slno']." type='text' placeholder='enter a comment'><br>
        <button type='submit' name=submit".$row['slno'].">Submit</button></form>
        <ul>
        <li>";
        $sl = $row['slno'];
        $sql01 = "SELECT * FROM `wesite`.`comment` WHERE userid ='$sl';";
        $result01 = mysqli_query($con,$sql01);
        while($row01 = mysqli_fetch_assoc($result01)){
        echo "<h4>".$row01['name']."</h4>";
        echo "<p>".$row01['comments']."</p><br>";
        }
        echo "</li>
        </article>";
     
    
   
}

$result2 = mysqli_query($con,$sql);
while($row2 = mysqli_fetch_assoc($result2)){
    if(isset($_POST['submit'.$row2['slno']])){
        $userid = $row2['slno'];
        $comment = $_POST['input'.$row2['slno']];
        $name = $_COOKIE['user'];
       $sql2 = "INSERT INTO `wesite`.`comment` ( `userid`, `name`, `comments`) 
       VALUES ('$userid', '$name', '$comment'); ";
       mysqli_query($con,$sql2);
   }
}
   ?>
</div>

      <footer>
        <span>
        <p>contact us</p>
        <a href="">ashimdebnath6767@gmail.com</a>
        <p>8451317631</p>
    </span>
    <span>
        <p>privacy and security</p>
        <a href="">terms and conditions</a>
        <p>having any privacy issues?</p>
    </span>
    <span>
        <p>membership</p>
        <a href="">be a member of inweave</a>
    </span>
      </footer>

</body>
</html>
