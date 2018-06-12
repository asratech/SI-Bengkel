<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hutang
      <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Hutang/')?>">Hutang</a></li>
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
            <h3 class="box-title">Hutang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-responsive">
              <tr>
                <td>Nama Supplier</td>
                <td><?=$hutang->nama_supplier?></td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td><?=$hutang->provinsi?></td>
              </tr>
              <tr>
                <td>Kota</td>
                <td><?=$hutang->kota?></td>
              </tr>
              <tr>
                <td>Kode Pos</td>
                <td><?=$hutang->kode_pos?></td>
              </tr>
              <tr>
                <td>Nomor Telepon</td>
                <td><?=$hutang->telepon?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$hutang->alamat?></td>
              </tr>
              <tr>
                <td>Jumlah Hutang</td>
                <td><?=$hutang->jumlah?></td>
              </tr>
              <tr>
                <td>Bayar Hutang</td>
                <td><?=$hutang->bayar?></td>
              </tr>
              <tr>
                <td>Sisa Hutang</td>
                <td><?=$hutang->sisa?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><?=$hutang->keterangan?></td>
              </tr>
            </table>
            <br />
            <table id="table1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Bayar</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(!empty($hutang)){
                  $no = 1;
                  foreach ($sub_hutang as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->bayar; ?></td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td><?php echo $value->tanggal; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?=base_url('index.php/Hutang/DeleteSubHutang/'.$hutang->id_hutang_supplier.'/'.$value->id_sub_hutang_supplier)?>" onclick="return confirm('Apakah yakin akan dihapus ?')" class="btn btn-default">Hapus</a>
                        </div>
                      </td>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Bayar</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
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