<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hutang
      <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Hutang/')?>">Hutang</a></li>
      <li class="active">Edit Hutang</li>
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
        <form class="form-horizontal" method="post" action="<?=base_url('index.php/Hutang/Update/'.$hutang->id_hutang_supplier)?>">
          <input type="hidden" name="bayar" value="<?=$hutang->bayar?>">
          <br>
          <div class="form-group">
            <label for="keterangan" class="col-sm-2 control-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" min="0" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" value="<?=$hutang->jumlah?>">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="keterangan" id="keterangan"><?=$hutang->keterangan?></textarea>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="keterangan" class="col-sm-2 control-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" name="tanggal" id="tanggal" value="<?=$hutang->tanggal?>" class="form-control">
            </div>
          </div>
          <br />
          <div class="form-group">
            <label for="stok" class="col-sm-2 control-label">Supplier</label>
            <div class="col-sm-10">
              <select name="id_supplier" class="form-control select2" style="width: 100%;">
                <option selected="selected">--Pilih--</option>
                <?php foreach($supplier as $array){ ?>
                    <?php if ($hutang->id_supplier == $array->id_supplier): ?>
                      <option value="<?php echo $array->id_supplier?>" selected=""><?php echo $array->nama_supplier?></option>
                    <?php else: ?>
                      <option value="<?php echo $array->id_supplier?>"><?php echo $array->nama_supplier?></option>
                    <?php endif ?>
                <?php } ?>
              </select>
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