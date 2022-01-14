<?php 
include "../admin/koneksi.php"; 

$NAMA_ADMIN     = $_POST['NAMA_ADMIN'];
$JK_ADMIN       = $_POST['JK_ADMIN'];
$ALAMAT_ADMIN   = $_POST['ALAMAT_ADMIN'];
$USERNAME   	= $_POST['USERNAME'];
$PASSWORD   	= $_POST['PASSWORD'];

$sql="INSERT INTO ADMIN VALUES ('','$NAMA_ADMIN','$JK_ADMIN','$ALAMAT_ADMIN','$USERNAME','$PASSWORD')";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:admin.php?pesan=input');
	}
	else {echo "gagal";}



 ?>