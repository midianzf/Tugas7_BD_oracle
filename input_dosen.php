<?php 
include "../admin/koneksi.php"; 

$NIP   	     = $_POST['NIP'];
$NAMA_DOS    = $_POST['NAMA_DOS'];
$TELP        = $_POST['TELP'];
$EMAIL   	 = $_POST['EMAIL'];

$sql="INSERT INTO dosen VALUES ('$NIP','$NAMA_DOS','$TELP','$EMAIL')";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:dosen.php?pesan=input');
	}
	else {echo "gagal";}



 ?>