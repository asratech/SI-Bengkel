<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jasa
      <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Jasa/')?>">Jasa</a></li>
      <li class="active">Edit Jasa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Jasa</h3>

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
          <?php foreach ($jasa as $value) { ?>  
            <input type="hidden" name="id" value="<?php echo $value->id_jasa?>">
            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama Jasa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $value->nama_jasa?>" placeholder="Nama Barang">
              </div>
            </div>
            <div class="form-group">
              <label for="harga_pokok" class="col-sm-2 control-label">Harga Pokok</label>
              <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="harga_pokok" id="harga_pokok" value="<?php echo $value->harga_pokok?>" placeholder="Harga Pokok">
              </div>
            </div>
            <div class="form-group">
              <label for="harga_jual" class="col-sm-2 control-label">Harga Jual</label>
              <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="harga_jual" id="harga_jual" value="<?php echo $value->harga_jual?>" placeholder="Harga Jual">
              </div>
            </div>
            <div class="form-group">
              <label for="diskon" class="col-sm-2 control-label">Diskon</label>
              <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="diskon" id="diskon" value="<?php echo $value->diskon?>" placeholder="Diskon (%)">
              </div>
            </div>
            <div class="form-group">
              <label for="ppn" class="col-sm-2 control-label">PPN</label>
              <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="ppn" id="ppn" value="<?php echo $value->ppn?>" placeholder="PPN (%)">
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