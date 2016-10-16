<?php
session_start();
include 'admin/inc/db.php';
include 'metode_neagle.php';
include 'fungsi_date.php';
include 'admin/inc/filter.php';
$act = $_POST['act'];
if($act == "getkalkulasi"){
	$cek = cekBln($_POST['hpht']);
	if($cek <= 3){
		$tgl = getTglPlus7($_POST['hpht']);
		$bln = getBlnPlus9($_POST['hpht']);
		$thn = getThnPlus0($_POST['hpht']);
		$prediksiTglLahir = $thn."-".$bln."-".$tgl;
	}else{
		$tgl = json_decode(getTglPlus7($_POST['hpht']),true);
		$bln = json_decode(getBlnMinus3($tgl['newdate']),true);
		$thn = getThnPlus1($bln['newdate']);
		$prediksiTglLahir = $thn."-".$bln['bln']."-".$tgl['tgl'];
	}
	

	$pembuahan = getPembuahan($_POST['hpht']);
	$siapLahir = getSiapLahir($prediksiTglLahir);
	$usiaJanin = datediff($_POST['hpht'],date("Y-m-d"));
	$tri2 = getTri2($_POST['hpht']);
	$tri3 = getTri3($_POST['hpht']);
	$pemb = tgl($pembuahan);
	$spl = tgl($siapLahir);
	$prd = tgl($prediksiTglLahir);
	$tre1 = tgl($_POST['hpht']);
	$tre2 = tgl($tri2);
	$tre3 = tgl($tri3);
	$pembuahan = $pemb['tanggal']." ".$pemb['bulan']." ".$pemb['tahun'];
	$lahir = $spl['tanggal']." ".$spl['bulan']." ".$spl['tahun'];
	$pred = $prd['tanggal']." ".$prd['bulan']." ".$prd['tahun'];
	$tri1 = $tre1['tanggal']." ".$tre1['bulan']." ".$tre1['tahun'];
	$tri2 = $tre2['tanggal']." ".$tre2['bulan']." ".$tre2['tahun'];
	$tri3 = $tre3['tanggal']." ".$tre3['bulan']." ".$tre3['tahun'];
	
	echo "<table class='table table-hover table-striped table-responsive'>";
		echo "<tr>";
			echo "<th colspan='2'><center><b><font color='red'>Detail Data</font></b></center></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Perkiraan Terjadinya Pembuahan</th>";
			echo "<td>: ".$pembuahan."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Perkiraan Tanggal Siap dilahirkan</th>";
			echo "<td>: ".$lahir."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Perkiraan Usia Janin</th>";
			echo "<td>: ".$usiaJanin['week_total']." Minggu ".$usiaJanin['day']." Hari</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th class='text-danger'>Perkiraan Tanggal Kelahiran</th>";
			echo "<td class='text-danger'>:<b><font size='+1'> ".$pred."</font></b></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Trisemester 1</th>";
			echo "<td>: ".$tri1."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Trisemester 2</th>";
			echo "<td>: ".$tri2."</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Trisemester 3</th>";
			echo "<td>: ".$tri3."</td>";
		echo "</tr>";
		
	echo "</table>";
}elseif ($act == "login") {
	$username = injeksi($_POST['username']);
	$password = injeksi($_POST['password']);
	$pass = sha1("appislami".$password);
	$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$pass."' AND level = 'member'";
	$qry = $db->query($sql);
	$dt = $qry->fetch(PDO::FETCH_LAZY);
	if($qry->rowCount() <= 0){
		echo "100";
	}else{
		$_SESSION['username'] = $dt->username;
		$_SESSION['password'] = $dt->password;
		$_SESSION['level'] = $dt->level;
		echo "200";
	}
}elseif($act == "komen"){
	$sql = $db->query("INSERT INTO komen SET id_berita = '".$_POST['id_berita']."', nama = '".$_POST['nama']."', email = '".$_POST['email']."', komentar = '".$_POST['komen']."', created = '".date("Y-m-d H:i:s")."'");
	if($sql){
		$sqlq = $db->query("SELECT * FROM komen WHERE id_berita = '".$_POST['id_berita']."' ORDER BY created DESC");
		$cek = $sqlq->rowCount();
		if($cek <= 0){
			echo "<center><b><font size='+2' color='red'>Komentar Masih Kosong.</font></b></center>";
		}else{ 
			while($dt = $sqlq->fetch(PDO::FETCH_LAZY)){ 
			$jadwal = tgl($dt->created);

		?>
				<div class="media">
				  <div class="media-left">
				    <a href="#">
				      <img class="media-object" style="width:80px; height:auto" src="image/example.jpeg" alt="Image">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><?php echo $dt->nama; ?></h4>
				    <div class="line-news">
				    	<small class="line-content">
				    		<b><i class="fa fa-calendar"></i> <?php echo $jadwal['tanggal']." ".$jadwal['bulan']." ".$jadwal['tahun']; ?> </b>
				    	</small>
				    	<small class="line-content">
				    		<b><i class="fa fa-clock-o"></i> <?php echo $jadwal['jadwal']; ?></b>
				    	</small>
					</div>
				    <p class="news-content text-justify">
				    	<?php echo $dt->komentar; ?>
				    </p>
				  </div>
				</div>
		<?php } }
	}
}
?>