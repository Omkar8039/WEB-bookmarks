<html>
<head>
<style>
body{
 background-color:black;
 text-align:center;
 }
 h1
  {
   color:#f2f2f2;
   font-size:50px;
  }
 </style>
</head>
<body>
<h1>
<?php
 require('login.php');
  echo "Error!!!";
  echo "<br>";
  echo "Error!!!";
  echo "<br>";
   echo "Error!!!";
   echo "<br>";
   
  echo 'Already logged in as '.$_SESSION['valid_user'].'.';
  echo 'Please <a href="logout.php"> logout</a>  to continue :)';
?></h1>
<body>
