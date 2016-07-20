<?php
 require_once ('connect.php');
 require_once ('core.inc.php');


  
 if(isset($_POST['username'])&&isset($_POST['passwd']))
 {
   $username=$_POST['username'];
   $passwd=$_POST['passwd'];
   if(!empty($username)&&!empty($passwd))
    {
      if(login1($username,$passwd,$conn)){
        $_SESSION['valid_user']=$username;
        header('Location:login2.php');
        
        }
      else
        {
         require_once('index.php');
         echo "<script>alert('What rubbish!! thats not registered username/password.');</script>";
         echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
        }
       
    }
    else
     {
      require('index.php');
     echo "<script>alert('Come on dude.Fill it atleast!!');</script>";
      
     }
 }
?>
<?php
 function login1($username,$password,$conn)
   {
     $ps=md5($password);
     $ps1=substr($ps,0,16);
     $result="select * from user where username='$username' and passwd='$ps1'";
     if($re=mysqli_query($conn,$result))
      {
       if(mysqli_num_rows($re))
        return true;
       else
         return false;
    }}
  ?>
    
   
