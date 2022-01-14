<?php 
include "../admin/koneksi.php"; 

$NAMA_MK    = $_POST['NAMA_MK'];
$SKS        = $_POST['SKS'];
$SEMESTER   = $_POST['SEMESTER'];

$sql="INSERT INTO matkul VALUES ('','$NAMA_MK','$SKS','$SEMESTER')";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:matkul.php?pesan=input');
	}
	else {echo "gagal";}



 ?>