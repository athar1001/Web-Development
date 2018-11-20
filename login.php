<?php
include 'mysql-connection.php';
session_start();
$user=$_REQUEST['uname'];
$pass=$_REQUEST['password'];
$rememberme=$_REQUEST['rememberme'];
$valid=  mysql_query("SELECT * FROM table");
$r=  mysql_fetch_object($valid);
$name=$r->uname;
$password=$r->password;
if($pass==$password && $name== $user)
{
    if($rememberme=="1")
    {
        setcookie('abcd', $user,  time()+259200);
        header('location:abcd.php');
    }
    else
    {
    $_SESSION['abcd']=$user;
    $_SESSION['pass']=$pass;
    header('location:admin.php');
    }
}
else
{
    header('location: index.php');
}
?>