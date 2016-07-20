<?php
require 'connect.php';
ob_start();
session_start();
 function check_valid_user()
    {
       
       if (isset($_SESSION['valid_user'])&&(!empty($_SESSION['valid_user'])))
          {
          return true;
          }
             else
           { 

           return false;
           }
     }
   ?>
