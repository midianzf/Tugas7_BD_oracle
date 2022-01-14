<?php 
include "../admin/koneksi.php";

$NO_RUANG = $_GET['NO_RUANG'];
$sql="DELETE FROM ruang WHERE NO_RUANG = '$NO_RUANG'";
$prepare = ociparse($koneksi, $sql);
ociexecute($prepare);
oci_commit($koneksi);
header("location: matkul.php?pesan=hapus");
 ?>