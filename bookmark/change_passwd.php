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
               echo "<script>setTimeout(\"location.href='login2.php';\",50);</script>";
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
<html>
<body >
Hiiiii
<body>
</html>
