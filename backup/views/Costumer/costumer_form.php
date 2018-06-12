<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Costumer
      <small>Costumer</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Costumer/')?>">Costumer</a></li>
      <li class="active">Tambah Costumer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Costumer</h3>

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
            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama Customer</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Customer">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
              </div>
            </div>
            <div class="form-group">
              <label for="kota" class="col-sm-2 control-label">Kota</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota">
              </div>
            </div>
            <div class="form-group">
              <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
              </div>
            </div>
            <div class="form-group">
              <label for="telp" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="telp" id="telp" placeholder="Telepon">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default"><?php echo $button ?></button>
              </div>
            </div>
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