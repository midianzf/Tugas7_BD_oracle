<?php 
include "../admin/koneksi.php";

$ID_MHS = $_GET['ID_MHS'];
$sql="DELETE FROM MAHASISWA WHERE ID_MHS = '$ID_MHS'";
$prepare = ociparse($koneksi, $sql);
ociexecute($prepare);
oci_commit($koneksi);
header("location: mahasiswa.php?pesan=hapus");
 ?>