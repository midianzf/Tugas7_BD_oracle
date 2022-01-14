<?php 
include "../admin/koneksi.php";

$ID_MHS = $_POST['ID_MHS'];
$NAMA_MHS = $_POST['NAMA_MHS'];
$EMAIL  = $_POST['EMAIL'];
$JURUSAN  = $_POST['JURUSAN'];
$NIM  = $_POST['NIM'];

$sql = "UPDATE MAHASISWA SET NAMA_MHS='$NAMA_MHS', EMAIL='$EMAIL', JURUSAN='$JURUSAN', NIM='$NIM' WHERE ID_MHS='$ID_MHS'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
		header('location: mahasiswa.php?pesan=update');
	}
	else {echo "gagal";}
 ?>