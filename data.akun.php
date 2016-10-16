<?php
$dt_user = $db->query("SELECT * FROM member WHERE username = '".$_SESSION['username']."'")->fetch(PDO::FETCH_LAZY);

?>