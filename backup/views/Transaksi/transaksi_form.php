<!-- Content Wrapper. Contains page content -->
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
        <form class="form-horizontal" action="<?php echo $action ?>" method="POST">
            <div class="form-group">
              <label for="nobukti" class="col-sm-2 control-label">No. Bukti Transaksi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nobukti" id="nobukti" value="<?php echo $no_bukti; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="nopolisi" class="col-sm-2 control-label">No. Polisi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nopolisi" id="nopolisi" placeholder="nopolisi">
              </div>
            </div>
            <div class="form-group">
              <label for="tipe" class="col-sm-2 control-label">Tipe</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
              </div>
            </div>
            <div class="form-group">
              <label for="id_costumer" class="col-sm-2 control-label">Costumer</label>
              <div class="col-sm-10">
                <select id="id_costumer" name="id_costumer" class="form-control select2" style="width: 100%;">
                  <option selected="selected">--Pilih--</option>
                  <?php foreach($costumer as $array){ ?>
                      <option value="<?php echo $array->id_costumer?>"><?php echo $array->nama_costumer?></option>
                  <?php } ?>
                </select>
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