<?php 
include "../admin/koneksi.php";

$NIP = $_GET['NIP'];
$sql="DELETE FROM dosen WHERE NIP = '$NIP'";
$prepare = ociparse($koneksi, $sql);
ociexecute($prepare);
oci_commit($koneksi);
header("location: dosen.php?pesan=hapus");
 ?>