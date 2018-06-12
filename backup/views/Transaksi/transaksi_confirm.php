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
      Konfirmasi Transaksi
      <small>View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Transaksi/')?>">Transaksi</a></li>
      <li><a href="#">Tambah Transaksi</a></li>
      <li><a href="#">Konfirmasi Transaksi</a></li>
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
            <?php foreach($transaksi_jasa as $value): ?>
              <div id="danger<?php echo $value->id_jasa?>" class="callout">
                <h4><?php echo $value->nama_jasa?> <div id="text<?php echo $value->id_jasa?>">Belum Dilakukan !</div></h4>
                <button onclick="myFunctionSuccess<?php echo $value->id_jasa?>()" class="btn btn-success"><span class="fa fa-check"></span></button>
                <a href="<?=base_url('index.php/Transaksi/Add_sub/'.$id_tmp);?>" class="btn btn-danger"><span class="fa fa-close"></span></a>
              </div>
              <script type="text/javascript">
                var x = document.getElementById("btnBayar");
                        x.style.display = "none";
                function myFunctionSuccess<?php echo $value->id_jasa?>() {
                    var element = document.getElementById("danger<?php echo $value->id_jasa?>");
                    var element2 = document.getElementById("text<?php echo $value->id_jasa?>").innerHTML = "Sudah Dilakukan !";
                    element.style.backgroundColor = "#43A047";
                    var x = document.getElementById("btnBayar");
                        x.style.display = "block";
                }
              </script>
            <?php endforeach; ?>
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
              </div>

              <div class="row">
                <div class="col-xs-6">
                  &nbsp;
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead">Amount Due <?php echo date('d-m-Y')?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Subtotal:</th>
                        <td>Rp. <?php echo number_format($jumlah_sub_total_jasa+$jumlah_sub_total_barang, 2) ?></td>
                      </tr>
                      <tr>
                        <th>Bayar:</th>
                        <td>Rp. <?php echo number_format($bayar, 2)?></td>
                      </tr>
                      <tr>
                        <th>Kembalian</th>
                        <td>Rp. <?php echo number_format($bayar - ($jumlah_sub_total_jasa+$jumlah_sub_total_barang), 2) ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12">
                  <form class="form-horizontal" method="POST" action="<?php echo $action.'/'.$id_tmp; ?>">
                      <input type="hidden" name="bayar" value="<?php echo $bayar; ?>">
                      <input type="hidden" name="sub_total" value="<?php echo $jumlah_sub_total_jasa+$jumlah_sub_total_barang?>">
                      <input type="hidden" name="id_costumer" value="<?php echo $transaksi->id_costumer ?>">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="bukti" class="col-sm-2 control-label">No. Bukti</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="bukti" id="bukti" placeholder="bukti" value="<?php echo $transaksi->nomor_bukti_transaksi; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="tipe" class="col-sm-2 control-label">Tipe</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?php echo $transaksi->tipe_kendaraan?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nopolisi" class="col-sm-2 control-label">No. Polisi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nopolisi" id="nopolisi" placeholder="nopolisi" value="<?php echo $transaksi->nomor_polisi; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="costumer" class="col-sm-2 control-label">Costumer</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="costumer" id="costumer" placeholder="Costumer" value="<?php echo $transaksi->nama_costumer?>" readonly>
                          </div>
                        </div>
                      </div>
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit
                      </button>
                    </div>
                  </form>
                </div>
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