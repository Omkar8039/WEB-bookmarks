<?php
 require('connect.php');
 require_once('core.inc.php');
 
 if(check_valid_user())
  {
    header("Location:already.php");
  }
  else
   {
 if(isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['passwd']))
   {
   
     $email=$_POST['email'];
     $username=$_POST['username'];
     $passwd=$_POST['passwd'];
   
     if(!empty($email)&&!empty($username)&&!empty($passwd))
       {
    
      if(strlen($passwd)>=6 && strlen($passwd) <=20)
          {
          
         regi($username,$passwd,$email,$conn);
          }
          else
           {
           require_once('index.php');
           echo "<script>alert('Your password must be between 6 and 20');</script>";
           echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
        }}
       else
        {
         require_once('index.php');
         echo "<script>alert('You have not filled the form correctly');</script>";
          echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
        }
      }
        
    } 
?>
<?php
  function regi($username,$passwd,$email,$conn)
    {
      $result="select * from user where username='$username'";
      if($re=mysqli_query($conn,$result))
       {
         if(mysqli_num_rows($re)>0){
          require_once('index.php');
         echo "<script>alert('That username is already taken.Please choose another');</script>";
        echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
       }}
        
          
      $result1 ="insert into user values('$username',md5('$passwd'), '$email')";
          if (mysqli_query($conn,$result1))
          {
          require_once('index.php');
        echo "<script>alert('Your registration was successful');</script>";
         echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
      }}
 ?>
 
 
