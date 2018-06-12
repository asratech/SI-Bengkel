<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hutang
      <small>Bayar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url('Hutang/')?>">Hutang</a></li>
      <li class="active">Bayar Hutang</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Hutang</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="<?=base_url('index.php/Hutang/BayarAction/'.$hutang->id_hutang_supplier)?>">
          <input type="hidden" name="jumlah" value="<?=$hutang->jumlah?>">
          <input type="hidden" name="bayar2" value="<?=$hutang->bayar?>">
          <input type="hidden" name="sisa" value="<?=$hutang->sisa?>">
          <div class="form-group">
            <label for="bayar" class="col-sm-2 control-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" min="0" class="form-control" name="bayar" id="bayar" placeholder="Rp.">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="bayar" class="col-sm-2 control-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>
          </div>
          <br>
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