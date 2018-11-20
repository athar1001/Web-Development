<?php 
session_start();
if(isset($_SESSION['***']) && isset($_SESSION['***'])){ 
    
       session_destroy();
//  unset($_SESSION['password']);
     header('location:../abcd.php');
     
}
?>