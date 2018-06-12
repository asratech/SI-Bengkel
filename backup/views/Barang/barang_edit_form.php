<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Barang
      <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Barang/')?>">Barang</a></li>
      <li class="active">Edit Barang</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Barang</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <?=$this->session->flashdata("msg");?>
        <form class="form-horizontal" action="<?php echo $action ?>" method="POST">
          <?php foreach ($barang as $value) { ?>  
            <input type="hidden" name="id" value="<?php echo $value->id_barang?>">
            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $value->nama_barang?>" placeholder="Nama Barang">
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Satuan Barang</label>
              <div class="col-sm-10">
                <select name="satuan" class="form-control" name="satuan" id="satuan">
                  <option>--Pilih--</option>
                  <option value="pcs" <?php if($value->satuan_barang=="pcs"){ echo 'selected'; }?>>Pcs</option>
                  <option value="box" <?php if($value->satuan_barang=="box"){ echo 'selected'; }?>>Box</option>
                  <option value="unit" <?php if($value->satuan_barang=="unit"){ echo 'selected'; }?>>Unit</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="harga_beli" class="col-sm-2 control-label">Harga Beli</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="harga_beli" id="harga_beli" value="<?php echo $value->harga_beli_satuan?>" placeholder="Harga Beli">
              </div>
            </div>
            <div class="form-group">
              <label for="harga_jual" class="col-sm-2 control-label">Harga Jual</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="harga_jual" id="harga_jual" value="<?php echo $value->harga_jual_satuan?>" placeholder="Harga Jual">
              </div>
            </div>
            <div class="form-group">
              <label for="diskon" class="col-sm-2 control-label">Diskon</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="diskon" id="diskon" value="<?php echo $value->diskon?>" placeholder="Diskon (%)">
              </div>
            </div>
            <div class="form-group">
              <label for="ppn" class="col-sm-2 control-label">PPN</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="ppn" id="ppn" value="<?php echo $value->ppn?>" placeholder="PPN (%)">
              </div>
            </div>
            <div class="form-group">
              <label for="stok" class="col-sm-2 control-label">Stok</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="stok" id="stok" value="<?php echo $value->stock_barang?>" placeholder="Stok">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default"><?php echo $button ?></button>
              </div>
            </div>
          <?php } ?>
        </form>
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