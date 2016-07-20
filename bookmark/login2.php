
<html>
<head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="mycss/login2.css" rel="stylesheet">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      
	<link rel="stylesheet" href="footer/footer.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>
<body>
<div class="jumbotron">
<h1 id="welcome"><?php
  require_once ('core.inc.php');
  if(check_valid_user())
    {
       echo 'Hello, '.$_SESSION['valid_user'].'.';
       echo "<br>";
       
       /*echo 'Click <a href="logout.php">here</a> to logout';
       echo "<br>"; 
       echo 'Click to <a href="#change_pd">change</a> your password';
        echo "<br>";
        echo 'Click to <a href="#add1">add</a>  a new bookmark';*/
    }
  else
    {
      header('Location:index.php');
    }
 ?></h1>
 </div>
<div class="container">
<div id="g1">
<h1 id="dis"><a href="login3.php">View your bookmarks:)</a></h1>
</div>
<div id="g2"> <h1 id="recom"><a href="login3.php">View your recommended bookmarks:)</a></h1>
</div>
</div>
<div class="container1">
<div id="add">
<h1 id="add8">Add new bookmarks</h1>
<form class="form-horizontal" role="form" action="login3.php" method="POST">
           <div class="form-group">
  <lable for="firstname" class="control-lable col-sm-2" >New Bookmark:</lable>
           <div class="col-sm-5">
              <input type="text" id="mname" class="form-control" name="book"placeholder="Enter new bookmark">
           </div>
           </div>
      <div class="form-group">
           <lable  class="control-lable col-sm-2"  ></lable>
           <div class="col-sm-5">
              <input type="submit" id="password" name="add"class="btn btn btn-success" value="Add new bookmark">
           </div>
           </div>
       </form>
</div>
</div>
<div class="container1">
<div id="add3">
<h1 id="add8">Change your password</h1>
<form class="form-horizontal" role="form" action="login2.php" method="POST">
           <div class="form-group">
  <lable for="firstname" class="control-lable col-sm-2" >Old password:</lable>
           <div class="col-sm-5">
              <input type="password" id="mname" class="form-control" name="old"placeholder="Enter your old password">
           </div>
           </div>
           <div class="form-group">
  <lable for="firstname" class="control-lable col-sm-2" >New Password:</lable>
           <div class="col-sm-5">
              <input type="password" id="mname" class="form-control" name="new"placeholder="Enter new password">
           </div>
           </div>
           <div class="form-group">
  <lable for="firstname" class="control-lable col-sm-2" >Confirm new password:</lable>
           <div class="col-sm-5">
              <input type="password" id="mname" class="form-control" name="conf"placeholder="Re-enter new password">
           </div>
           </div>
      <div class="form-group">
           <lable  class="control-lable col-sm-2"  ></lable>
           <div class="col-sm-5">
              <input type="submit" id="password1" name="add"class="btn btn btn-success" value="Change your password">
           </div>
           </div>
           </form>
</div>
</div>
<div id="kuchbhi">
 <?php
require_once('login.php');
require_once('connect.php');
$user1=$_SESSION['valid_user'];
if(isset($_POST['old'])&&isset($_POST['new'])&&isset($_POST['conf']))
  {
    $old=$_POST['old'];
    $new=$_POST['new'];
    $conf=$_POST['conf'];
    $old1=substr(md5($old),0,16);
    $new1=substr(md5($new),0,16);
    $conf1=substr(md5($conf),0,16);
   
     if(!empty($old)&&!empty($new)&&!empty($conf))
       {
       
         if($new1==$conf1)
          {
          $sq="select * from user where username='$user1' and passwd='$old1'";
          if($re=mysqli_query($conn,$sq))
           {
             $rows=mysqli_fetch_assoc($re);
             $exist=$rows['passwd'];
             if($old1==$exist)
              {
              $result = mysqli_query($conn, "update user set passwd ='$new1' where username = '$user1'"); 
              if($result)
               echo "<script>alert('Password updated :)');</script>";
    /*iske bina bhi sahi hai lekin rehne do */echo "<script>setTimeout(\"location.href='login2.php';\",50);</script>";
              }
              else
               {
               echo "<script>alert('Please enter your correct old password :(')</script>";
               echo "<script>setTimeout(\"location.href='login2.php';\",50);</script>";
               }
           }
          
       }
       else
         {
           echo "<script>alert('Please enter same passwords :(');</script>";
           echo "<script>setTimeout(\"location.href='login2.php';\",50);</script>";
         }
       }
      else
        {
         echo "<script>alert('Please fill the form correctly :(');</script>";
         echo "<script>setTimeout(\"location.href='login2.php';\",50);</script>";
         
        }
    }
?>
</div>

 <footer class="footer-basic-centered">

			<!--<p class="footer-company-motto">The quieter you become,the more you are able to hear..</p>-->
                       
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
