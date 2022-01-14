<?php 
include "../admin/koneksi.php"; 

$GEDUNG    = $_POST['GEDUNG'];
$LANTAI        = $_POST['LANTAI'];
$FAKULTAS   = $_POST['FAKULTAS'];

$sql="INSERT INTO ruang VALUES ('','$GEDUNG','$LANTAI','$FAKULTAS')";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:ruang.php?pesan=input');
	}
	else {echo "gagal";}



 ?>