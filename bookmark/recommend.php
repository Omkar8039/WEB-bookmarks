<?php
require('connect.php');
require('login.php');
require('login3.php');
$user2=$_SESSION['valid_user'];
$confirm='undone';
$popularity=1;
$result="select distinct(b2.username) from bookmark b1,bookmark b2 where b1.username='$user2' and b1.username!=b2.username and b1.bm_URL=b2.bm_URL";
if($re=mysqli_query($conn,$result))
    {
      $obj=mysqli_fetch_object($re);
      $sim_users = "('".($obj->username)."'";
      
      while($obj= mysqli_fetch_object($re))
        {
        $sim_users .= ", '".($obj->username)."'";
     
       
        }
        
        $sim_users.=')';
        
      
       
       
    }
    else{echo "Getsugatenshoue..";}
    $result="select bm_URL from bookmark where username='$user2'";
 if($re=mysqli_query($conn,$result)) 
    {
      $row = mysqli_fetch_object($re);
      $user_urls = "('".($row->bm_URL)."'";
      while ($row = mysqli_fetch_object($re))
          {
           $user_urls .= ", '".($row->bm_URL)."'";
           
          }
          $user_urls.=')';
          
         
          
    }
  else{echo "<script>alert('Error');</script>";}
  
      $result="select bm_URL from bookmark where username in $sim_users and bm_URL not in $user_urls group by bm_URL
having count(bm_URL)>$popularity";
          if($re=mysqli_query($conn,$result))
           {
             $url=array();
             $count=0;
             while ($obj = mysqli_fetch_object($re))
             {
             $url[$count]=$obj->bm_URL;
             $count+=1;
             }
            
           
             for($count=0;$count<count($url);$count++)
              {
         
               $sq="select username,bm_URL from recommend where username='$user2' and bm_URL='$url[$count]'";  
               if($re=mysqli_query($conn,$sq))
                 {
                   
                   if(mysqli_num_rows($re)==0)
                      {
                         
                         $result="insert into recommend values('$user2','$url[$count]')";
                            if(mysqli_query($conn,$result))
                              {
                                $confirm='done';
                                
                              }
                      }
                 }
              }
             if($confirm=='done')
              {
               echo "<script>alert('Recommendations added')</script>";
               echo "<script>setTimeout(\"location.href='login3.php';\",50);</script>";
              } 
            
            else if($confirm=='undone')
             {
              echo "<script>alert('No new recommendations')</script>";
              echo "<script>setTimeout(\"location.href='login3.php';\",50);</script>";
              
             }
          }
       
       
       
      ?>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
 
 
