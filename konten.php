<?php
if(!isset($_GET['module'])){
	include 'modul/home.php';
}else{
	$modul = str_replace("../", "", $_GET['module']);
	$module = "modul/".$modul.".php";
	if(file_exists($module)){
		include $module;
	}else{
		echo "404";
	}
}
?>
