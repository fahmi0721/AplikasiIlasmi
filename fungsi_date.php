<?php
function tgl($date){
	$thn = substr($date, 0,4);
	$bulan = getBulan(substr($date, 5,2));
	$tgl = substr($date, 8,2);
	$jam = substr($date, 11,5);
	return  array('tahun' => $thn,'bulan'=>$bulan,'tanggal'=>$tgl,'jadwal'=>$jam );
}
function getBulan($bln){
	switch ($bln) {
		case "01":
			return "Januari";
			break;
		case "02":
			return "Februari";
			break;
		case "03":
			return "Maret";
			break;
		case "04":
			return "April";
			break;
		case "05":
			return "Mei";
			break;
		case "06":
			return "Juni";
			break;
		case "07":
			return "Juli";
			break;
		case "08":
			return "Agustus";
			break;
		case "09":
			return "September";
			break;
		case "10":
			return "Oktober";
			break;
		case "11":
			return "November";
			break;
		case "12":
			return "Desember";
			break;
		
		default:
			return "No";
			break;
	}
}
?>