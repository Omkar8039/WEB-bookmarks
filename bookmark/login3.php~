<html>
<head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
     
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
         <link rel="stylesheet" href="mycss/login3.css">
	<link rel="stylesheet" href="mycss/footer3.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<?php require_once('login.php');?>
<h1 id="dis"><?php echo $_SESSION['valid_user'];?>,your bookmarks</h1>
<?php
 require_once('login.php');
 $user=$_SESSION['valid_user'];
 $result=mysqli_query($conn,"select bm_URL from bookmark where username='$user'");
 while($row=mysqli_fetch_array($result))
 {
 echo '<a href="'.$row['bm_URL'].'">'.$row['bm_URL'].'</a>';
  echo "<br>";

 } 
 ?>
 <h1 id="dis"><?php echo $_SESSION['valid_user'];?>,pleople also visits these,<p><form class="form-horizontal" role="form" action="recommend.php" method="POST">
           <div class="form-group">
           <lable  class="control-lable col-sm-2"  ></lable>
           <div class="col-sm-5">
              <input type="submit" id="password1" name="add"class="btn btn btn-success" value="Get recommendations">
           </div>
           </div>
     </form></p></h1>
  <?php
 $user=$_SESSION['valid_user'];
 $result=mysqli_query($conn,"select bm_URL from recommend where username='$user'");
 
 while($row=mysqli_fetch_array($result))
 {

  
  echo '<a href="'.$row['bm_URL'].'">'.$row['bm_URL'].'</a>';
  echo "<br>";
 

 }
?>



<?php

 require_once('connect.php');
 if(isset($_POST['book']))
  {
    $url=$_POST['book'];
    $user=$_SESSION['valid_user'];
    if(!empty($url))
     {
      $re="select * from bookmark where username='$user' and bm_URL='$url'";
      if($rq=mysqli_query($conn,$re))
       {
        if(mysqli_num_rows($rq)==0)
          {
         
           if (mysqli_query( $conn,"insert into bookmark values
                            ('$user', '$url')"))
                            {
                             echo "<script>alert('Bookmark added :)');</script>";
           echo "<script>setTimeout(\"location.href='login3.php';\",50);</script>";
          }
          }
         else
         {
         echo "<script>alert('Bookmark already exists :)');</script>";
           echo "<script>setTimeout(\"location.href='login3.php';\",50);</script>";
         }
          
       }
     }
    else
     {
     echo "<script>alert('Please enter a valid url :(');</script>";
           echo "<script>setTimeout(\"location.href='login3.php';\",50);</script>";
     }
   }

?>


<footer class="footer-basic-centered" style="margin-top:174px";>

			<p class="footer-company-motto">The quieter you become,the more you are able to hear..</p>

			<p class="footer-links">
				
				<a href="#">Home</a>
				·
				 <a href="#"><?php echo $_SESSION['valid_user'];?></a> 
				·
				<a href="logout.php">Logout</a>
				·
				<a href="#">FAQ</a>
				·
				<a href="#">Contact</a>
			</p>

			<p class="footer-company-name"><i>bookmarks</i>&copy; 2016<br></p>

		</footer>

</body>
</html>
