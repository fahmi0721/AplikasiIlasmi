<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['level']);
session_destroy();
echo "<script>window.location='index.php'</script>";
?>