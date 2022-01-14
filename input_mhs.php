<?php 
include "../admin/koneksi.php"; 

$NAMA_MHS    = $_POST['NAMA_MHS'];
$EMAIL       = $_POST['EMAIL'];
$JURUSAN   	 = $_POST['JURUSAN'];
$NIM   	     = $_POST['NIM'];

$sql="INSERT INTO MAHASISWA VALUES ('','$NAMA_MHS','$EMAIL','$JURUSAN','$NIM')";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:mahasiswa.php?pesan=input');
	}
	else {echo "gagal";}



 ?>