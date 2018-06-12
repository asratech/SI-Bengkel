<style type="text/css">
  .callout {
      background-color: #e53935;
      color: whitesmoke;
      
  }
</style>
<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Transaksi
      <small>View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Transaksi/')?>">Transaksi</a></li>
      <li><a href="#">Detail Transaksi</a></li>
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
            <!-- Main content -->
            <section class="invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    <i class="fa fa-globe"></i> KPGarage
                    <small class="pull-right">Date: <?php echo date('Y-m-d H:i:s')?></small>
                  </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-md-6">
                <center><h3>List Barang</h3></center>
                  <table class="table border">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>PPN</th>
                        <th>Qty</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $jumlah_sub_total_barang = 0;
                        if(!empty($transaksi_barang)){
                          $no=1;
                          foreach($transaksi_barang as $value): ?>
                            <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $value->nama_barang?></td>
                              <td>Rp. <?php echo number_format($value->harga_jual, 2)?></td>
                              <td><?php echo $value->diskon?>%</td>
                              <td><?php echo $value->ppn?>%</td>
                              <td><?php echo $value->jumlah_barang?></td>
                              <td>Rp. <?php echo number_format($value->sub_total, 2)?></td>
                            </tr>
                          <?php
                          $jumlah_sub_total_barang += $value->sub_total;
                          endforeach;
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4">Total :</th>
                        <th>Rp. <?php echo number_format($jumlah_sub_total_barang);?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="col-md-6">
                <center><h3>List Jasa</h3></center>
                  <table class="table border">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Jasa</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $jumlah_sub_total_jasa = 0;
                        if(!empty($transaksi_jasa)){
                          $no=1;
                          foreach($transaksi_jasa as $value): ?>
                            <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $value->nama_jasa?></td>
                              <td>Rp. <?php echo number_format($value->harga_jual, 2)?></td>
                              <td><?php echo $value->diskon?>%</td>
                              <td><?php echo $value->ppn?>%</td>
                              <td>Rp. <?php echo number_format($value->sub_total, 2)?></td>
                            </tr>
                          <?php 
                          $jumlah_sub_total_jasa += $value->sub_total;
                          endforeach;
                        }
                      ?>
                      <tr></tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">Total :</th>
                        <th>Rp. <?php echo number_format($jumlah_sub_total_jasa, 2);?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <a href="<?=base_url('index.php/Transaksi/Faktur')?>/<?php echo $id?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              </div>
            </section>
            <!-- /.content -->
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
<!-- /.content-wrapper-->