<?php
session_start();
$_SESSION = array();

if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}
session_destroy();

if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/'); 
}
header("Location: index.php");
exit();
?>