<?php 
include "../admin/koneksi.php";

$ID_ADMIN = $_GET['ID_ADMIN'];
$sql="DELETE FROM ADMIN WHERE ID_ADMIN = '$ID_ADMIN'";
$prepare = ociparse($koneksi, $sql);
ociexecute($prepare);
oci_commit($koneksi);
header("location: admin.php?pesan=hapus");
 ?>