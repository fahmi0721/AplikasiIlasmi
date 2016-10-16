<?php
date_default_timezone_set("Asia/Makassar");
function cekBln($date){
	$dt = explode("-", $date);
	return $dt[1];
}
function getTglPlus7($date){
	$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$dt = explode("-", $newdate);
	$tgl = array('tgl' => $dt[2],'newdate' => $newdate );
	return json_encode($tgl);
}

function getBlnPlus9($date){
	$newdate = strtotime ( '+9 month' , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$dt = explode("-", $newdate);
	return $dt[1];
}

function getBlnMinus3($date){
	$newdate = strtotime ( '-3 month' , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$dt = explode("-", $newdate);
	$bln = array('bln' => $dt[1],'newdate' => $newdate );
	return json_encode($bln);
}
function getThnPlus1($date){
	$newdate = strtotime ( '+1 year'  , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$dt = explode("-", $newdate);
	return $dt[0];
}

function getPembuahan($date){
	$newdate = strtotime ( '+2 week'  , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	return $newdate;
}

function getThnPlus0($date){
	$dt = explode("-", $date);
	return $dt[0];
}


function getSiapLahir($date){
	$newdate = strtotime ( '-3 week' , strtotime ( $date ) ) ;
	$dt = date ( 'Y-m-d' , $newdate );
	return $dt;
}

function getTri2($date){
	$newdate = strtotime ( '+3 month' , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$newdate = strtotime ( '+3 day' , strtotime ( $newdate ) ) ;
	$dt = date ( 'Y-m-d' , $newdate );

	return $dt;
}

function getTri3($date){
	$newdate = strtotime ( '+6 month' , strtotime ( $date ) ) ;
	$newdate = date ( 'Y-m-d' , $newdate );
	$newdate = strtotime ( '+5 day' , strtotime ( $newdate ) ) ;
	$dt = date ( 'Y-m-d' , $newdate );
	return $dt;
}

function datediff($tgl1, $tgl2){
	$tgl1 = strtotime($tgl1);
	$tgl2 = strtotime($tgl2);
	$diff_secs = abs($tgl1 - $tgl2);
	$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);

	return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)),"week_total" => floor(($diff_secs / (3600 * 24))/7),"day" => ($diff_secs / (3600 * 24))%7, "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
}
?>