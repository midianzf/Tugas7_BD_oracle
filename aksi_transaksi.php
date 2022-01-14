<?php
include("../admin/koneksi.php");
$hari_ini = date("dmY");

$act=$_GET['act'];

if ($act=='input'){
echo	$ID_TRAN = $_POST['ID_TRAN'];
echo	$ID_PEMBELI = $_POST['ID_PEMBELI'];
echo	$ID_KELAPA = $_POST['ID_KELAPA'];
echo	$JUMLAH = $_POST['JUMLAH'];

	$sql = "INSERT INTO transaksi VALUES ('$ID_TRAN','$ID_PEMBELI','$ID_KELAPA', '$JUMLAH', '$hari_ini')";
	$prepare = ociparse($koneksi, $sql);
    ociexecute($prepare);
    oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";} 

}

?>
