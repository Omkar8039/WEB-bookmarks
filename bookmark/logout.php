<?php
require_once('login.php');
require_once('login2.php');
$old_user = $_SESSION['valid_user'];
unset($_SESSION);
$result_dest = session_destroy();
if (!empty($old_user))
{
if ($result_dest)
{
echo "<script>alert('Bye Bye,logging out');</script>";
echo "<script>setTimeout(\"location.href='index.php';\",50);</script>";
}
}
?>
