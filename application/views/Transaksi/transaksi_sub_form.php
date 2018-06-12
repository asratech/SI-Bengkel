<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Transaksi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Transaksi/')?>">Transaksi</a></li>
      <li class="active">Tambah Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Transaksi</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <?php if (!empty($this->session->flashdata('type_massage'))): ?>
          <div class="alert alert-<?=$this->session->flashdata('type_massage')?> alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=$this->session->flashdata('massage')?>
          </div>
        <?php endif ?>
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="<?php echo $actionBayar.'/'.$id_tmp?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nopolisi" class="col-sm-2 control-label">No. Polisi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nopolisi" id="nopolisi" placeholder="nopolisi" value="<?php echo $transaksi->nomor_polisi; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tipe" class="col-sm-2 control-label">Tipe</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?php echo $transaksi->tipe_kendaraan?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="id_costumer" class="col-sm-2 control-label">Costumer</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id_costumer" id="id_costumer" placeholder="Costumer" value="<?php echo $transaksi->nama_costumer?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jumlah_sub_total" class="col-sm-2 control-label">Jumlah Total</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jumlah_sub_total" id="jumlah_sub_total" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bayar" class="col-sm-2 control-label">Bayar</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="bayar" id="bayar" value="0">
                    </div>
                  </div>
                  <?php foreach ($bonus as $bonus) {
                    if($bonus->nomor_polisi==$transaksi->nomor_polisi && $bonus->jumlah_cuci==10){ ?>
                      <div class="form-group">
                        <label for="bonus" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="cekBonus" value="true" /> Gunakan Voucher Cuci Gratis
                            </label>
                          </div>
                        </div>
                      </div>
                    <?php 
                    }
                  }
                  ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Bayar</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <hr>
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
                  <th>Action</th>
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
                        <td><a onclick="return confirm('Apakah yakin akan dihapus?')" href="<?=base_url('index.php/Transaksi/deleteTmpBarang/'.$value->id_tmp_sub_transaksi_barang.'/'.$id_tmp.'/'.$value->id_barang.'/'.$value->jumlah_barang)?>">Hapus</a>
                      </tr>
                    <?php
                    $jumlah_sub_total_barang += $value->sub_total;
                    endforeach;
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="2">Total :</th>
                  <th colspan="5" class="text-right">Rp. <?php echo number_format($jumlah_sub_total_barang, 2);?></th>
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
                  <th>PPN</th>
                  <th>Total</th>
                  <th>Action</th>
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
                        <td><a onclick="return confirm('Apakah yakin akan dihapus?')" href="<?=base_url('index.php/Transaksi/deleteTmpJasa/'.$value->id_tmp_sub_transaksi_jasa.'/'.$id_tmp.'')?>">Hapus</a></td>
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
                  <th colspan="2">Total :</th>
                  <th colspan="4" class="text-right">Rp. <?php echo number_format($jumlah_sub_total_jasa, 2);?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <form class="form-horizontal" action="<?php echo $action_barang ?>" method="POST">
              <input type="hidden" class="form-control" name="id_tmp" value="<?php echo $id_tmp?>">
              <div class="form-group">
                <label for="id_barang" class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-10">
                  <select id="id_barang" name="id_barang" class="form-control select2" onchange="changeValueBarang(this.value)" style="width: 100%;">
                    <option selected="selected">--Pilih--</option>
                    <?php
                      $jsArray2 = "var barang = new Array();\n";
                      foreach($barang as $array){ ?>
                        <option value="<?php echo $array->id_barang?>"><?php echo $array->nama_barang.' - Rp.'.$array->harga_jual_satuan?></option>
                        <?php $jsArray2 .= "barang['" . $array->id_barang . "'] = {harga_jual_satuan:'" . addslashes($array->harga_jual_satuan) . "', diskon:'". addslashes($array->diskon) ."', ppn:'". addslashes($array->ppn). "'};\n"; ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="harga_barang" class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga" id="harga_barang" placeholder="Harga" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="diskon" class="col-sm-2 control-label">Diskon</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="diskon" id="diskon_barang" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="ppn" class="col-sm-2 control-label">PPN</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="ppn" id="ppn_barang" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="qty" class="col-sm-2 control-label">Qty</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="qty" id="qty" placeholder="Jumlah">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><?php echo $button ?></button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <form class="form-horizontal" action="<?php echo $action_jasa ?>" method="POST">
              <input type="hidden" class="form-control" name="id_tmp" value="<?php echo $id_tmp?>">
              <div class="form-group">
                <label for="id_jasa" class="col-sm-2 control-label">Jasa</label>
                <div class="col-sm-10">
                  <select id="id_jasa" name="id_jasa" class="form-control select2" onchange="changeValueJasa(this.value)" style="width: 100%;">
                    <option selected="selected">--Pilih--</option>
                    <?php
                      $jsArray = "var jasa = new Array();\n";
                      foreach($jasa as $array){ ?>
                        <option value="<?php echo $array->id_jasa?>"><?php echo $array->nama_jasa?></option>
                        <?php $jsArray .= "jasa['" . $array->id_jasa . "'] = {harga_jual:'" . addslashes($array->harga_jual) . "', diskon:'". addslashes($array->diskon) ."', ppn:'". addslashes($array->ppn). "', jasa_id:'". addslashes($array->id_jasa). "'};\n"; ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="jasa_id" id="jasa_id">
              <div class="form-group">
                <label for="harga" class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga" id="harga_jasa" placeholder="Harga" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="diskon" class="col-sm-2 control-label">Diskon</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="diskon" id="diskon_jasa" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="ppn" class="col-sm-2 control-label">PPN</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="ppn" id="ppn_jasa" readonly="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><?php echo $button ?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  <?php echo $jsArray; ?>
  <?php echo $jsArray2; ?>
  function changeValueJasa(id){
      document.getElementById('harga_jasa').value = jasa[id].harga_jual;
      document.getElementById('diskon_jasa').value = jasa[id].diskon;
      document.getElementById('ppn_jasa').value = jasa[id].ppn;
      document.getElementById('jasa_id').value = jasa[id].jasa_id;
  };
  function changeValueBarang(id){
      document.getElementById('harga_barang').value = barang[id].harga_jual_satuan;
      document.getElementById('diskon_barang').value = barang[id].diskon;
      document.getElementById('ppn_barang').value = barang[id].ppn;
  };
  document.getElementById('jumlah_sub_total').value = <?php echo $jumlah_sub_total_jasa+$jumlah_sub_total_barang ?>;
</script>