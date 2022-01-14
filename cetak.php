<!DOCTYPE html>
<html>
<head>
  <?php 
  include'../fungsi/fungsi_rupiah.php';
  include'../fungsi/fungsi_indotgl.php';
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>admin kelapa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

     <?php 
  if(isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "<script>
          alert('Data berhasil ditambahkan!');
          </script>
      ";
    }else if($pesan == "update"){
      echo "<script>
          alert('Data berhasil di edit!');
          </script>
      ";
    }else if($pesan == "hapus"){
      echo "<script>
          alert('Data berhasil di hapus!');
          </script>
      ";
    }
  }

   ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Kelapa</h3>
            </div>
          <div class="#">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="#">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pembeli </th>
            <th>Jenis Kelapa</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th> 
                </tr>
                </thead>
                <tbody>
          <?php 
          include "../admin/koneksi.php";
          $no = 1;
          $total_semua = 0;
          $stid = oci_parse($koneksi, 'SELECT pembeli.*, kelapa.*, transaksi.* FROM transaksi 
transaksi INNER JOIN pembeli pembeli ON transaksi.id_pembeli = pembeli.id_pembeli 
INNER JOIN kelapa kelapa ON transaksi.id_kelapa = kelapa.id_kelapa ORDER BY transaksi.id_tran ASC');

          oci_execute($stid);

          while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
          $total = $row["HARGA_KELAPA"] * $row["JUMLAH"];
          $total_semua += $total; 
            
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= tgl_indo($row['TANGGAL_TRAN']); ?></td>
              <td><?= $row['NAMA_PEMBELI']; ?></td>
              <td><?= $row['JENIS_KELAPA']; ?></td> 
              <td><?= rupiah($row['HARGA_KELAPA']); ?></td> 
              <td><?= $row['JUMLAH']; ?></td> 
              <td><?= rupiah($total); ?></td> 
              
            </tr>
            </thead>              
            </tbody>
           <?php 
            }
          ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
		window.print();
	</script>
</body>
</html>
