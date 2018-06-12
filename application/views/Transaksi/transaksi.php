<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Transaksi/')?>">Transaksi</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($this->session->flashdata('type_massage'))): ?>
          <div class="alert alert-<?=$this->session->flashdata('type_massage')?> alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=$this->session->flashdata('massage')?>
          </div>
        <?php endif ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Transaksi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <!-- search all-->
                <form method="POST" action="<?php echo site_url('Transaksi/ViewAll')?>">
                  <input type="submit" value="Lihat Semua" class="btn btn-primary">
                </form>
              </div>
            </div>
            <br />
            <table id="table1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nomor Bukti Transaksi</th>
                  <th>Nomor Polisi</th>
                  <th>Tipe Kendaraan</th>
                  <th>Costumer</th>
                  <th>Jumlah Bayar</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if (!empty($transaksi)) {
                  $no = 1;
                  foreach ($transaksi as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nomor_bukti_transaksi; ?></td>
                      <td><?php echo $value->nomor_polisi; ?></td>
                      <td><?php echo $value->tipe_kendaraan; ?></td>
                      <td><?php echo $value->nama_costumer; ?></td>
                      <td>Rp. <?php echo number_format($value->jumlah_bayar, 2); ?></td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td>
                        <div class="btn-group-vertical">
                          <a href="<?=base_url('index.php/Transaksi/Detail/'.$value->id_transaksi.'')?>" target="_blank" class="btn btn-default"><i class="fa fa-arrow-circle-o-up"></i> Detail</a>
                          <a href="<?=base_url('index.php/Transaksi/Faktur/'.$value->id_transaksi.'')?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                          <!-- <a  onclick="return confirm('Apakah yakin akan dihapus?')" href="<?=base_url('index.php/Transaksi/Delete/'.$value->id_transaksi.'')?>" target="_blank" class="btn btn-default"><i class="fa fa-close"></i> Hapus</a> -->
                        </div>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Nomor Bukti Transaksi</th>
                <th>Nomor Polisi</th>
                <th>Tipe Kendaraan</th>
                <th>Costumer</th>
                <th>Jumlah Bayar</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
              </tfoot>
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