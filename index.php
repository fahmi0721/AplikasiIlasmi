<?php
date_default_timezone_set("Asia/Makassar");
session_start();
include 'admin/inc/db.php';
include 'fungsi_date.php';
include 'admin/inc/fungsi_paging.php';
include 'fungsi_paging.php';
include 'admin/inc/filter.php';
if(isset($_SESSION['username'])){
	include 'data.akun.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap-material-datetimepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Kehamilan Islami</title>
	<link rel="shourcut icon" href="image/favicon.png">
</head>
<body>
	<div class="container">

		<?php include 'navbar.php'; ?>
		<?php include 'slider.php'; ?>
		<div class="row"><div class="col-md-12"><div class="text-run"><marquee>Text Runn</marquee></div></div></div>
		<div class="row" style="margin-top:15px;">
			<?php include 'sidebar.php'; ?>
			<?php include 'konten.php'; ?>
		</div>
		<?php include 'footer.php'; ?>
	</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="admin/js/moment.min.js"></script>
<script src="admin/js/bootstrap-material-datetimepicker.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
	
	$('.carousel').carousel();
	function showTime() {
		var a_p = "";
		var today = new Date();
		var curr_hour = today.getHours();
		var curr_minute = today.getMinutes();
		var curr_second = today.getSeconds();
		if (curr_hour < 12) {
						a_p = "AM";
		} else {
						a_p = "PM";
		}
		if (curr_hour == 0) {
						curr_hour = 12;
		}
		if (curr_hour > 12) {
						curr_hour = curr_hour - 12;
		}
		curr_hour = checkTime(curr_hour);
		curr_minute = checkTime(curr_minute);
		curr_second = checkTime(curr_second);	
		document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
	}
	function checkTime(i) {
		if (i < 10) {
		   i = "0" + i;
		}
		return i; 	
	}
	setInterval(showTime, 500);

	$('#date').bootstrapMaterialDatePicker({ time: false,format : 'YYYY-MM-DD' }); 
	$('#hpht').bootstrapMaterialDatePicker({ time: false,format : 'YYYY-MM-DD' }); 

	function login() {
		var datas = $("#formLogin").serialize();
		$.ajax({
			type: "POST",
			url: "proses.php",
			data: datas,
			success: function(res){
				if(res == 100){
					alert('Anda belum terdaftar sebagai member!.');
					window.location='index.php?module=registrasi';
				}else{
					location.reload();
				}
			}
		});
	}

	function koment(){
		var datas = $("#formKomen").serialize();
		$.ajax({
			type: "POST",
			url: "proses.php",
			data: datas,
			success: function(res){
				$("#listKomen").focus();
				$("#listKomen").html(res);
				$("#nama").val("");
				$("#email").val("");
				$("#komen").val("");
			}
		}); 
	}
</script>
</html>