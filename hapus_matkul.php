<?php 
include "../admin/koneksi.php";

$KD_MK = $_GET['KD_MK'];
$sql="DELETE FROM matkul WHERE KD_MK = '$KD_MK'";
$prepare = ociparse($koneksi, $sql);
ociexecute($prepare);
oci_commit($koneksi);
header("location: matkul.php?pesan=hapus");
 ?>