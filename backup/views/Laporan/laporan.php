<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan
      <small>View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Laporan/')?>">Laporan</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php
          if(!empty($this->session->flashdata("msg"))){ ?>
            <div class="alert alert-success" role="alert"><?=$this->session->flashdata("msg");?></div>
        <?php } ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Laporan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Laporan Barang</td>
                  <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Excel</a> | <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Costumer</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Hutang</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Jasa</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Supplier</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Transaksi</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan Piutang</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
                <tr>
                  <td>Laporan User</td>
                  <td><a href="#">Excel</a> | <a href="#">PDF</a></td>
                </tr>
              </tbody>
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

<!-- modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Laporan Excel Barang</h4>
      </div>
      <div class="modal-body">
        <a class="btn btn-default" href="<?=base_url('index.php/Barang/Laporan_excel_all')?>" role="button">Semua</a>
        <a class="btn btn-default" href="<?=base_url('index.php/Barang/Laporan_excel_harian')?>" role="button">Harian</a>
        <a class="btn btn-default" href="<?=base_url('index.php/Barang/Laporan_excel_bulanan')?>" role="button">Bulanan</a>
        <a class="btn btn-default" href="<?=base_url('index.php/Barang/Laporan_excel_tahunan')?>" role="button">Tahun</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->