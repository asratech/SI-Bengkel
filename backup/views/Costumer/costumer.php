<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Costumer
      <small>View</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Costumer/')?>">Costumer</a></li>
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
            <h3 class="box-title">Costumer</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <!-- search all-->
                <form method="POST" action="<?php echo site_url('Costumer/ViewAll')?>">
                  <input type="submit" value="Lihat Semua" class="btn btn-primary">
                </form>
              </div>
            </div>
            <br />
            <table id="table1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Provinsi</th>
                  <th>Kota</th>
                  <th>Kode POS</th>
                  <th>Telp</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(!empty($costumer)){
                  $no = 1;
                  foreach ($costumer as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nama_costumer; ?></td>
                      <td><?php echo $value->alamat; ?></td>
                      <td><?php echo $value->provinsi; ?></td>
                      <td><?php echo $value->kota; ?></td>
                      <td><?php echo $value->kode_pos; ?></td>
                      <td><?php echo $value->telepon; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?=base_url('index.php/Costumer/edit/'.$value->id_costumer)?>" class="btn btn-default">Edit</a>
                          <a href="<?=base_url('index.php/Costumer/delete/'.$value->id_costumer)?>" onclick="return confirm('Apakah yakin akan dihapus ?')" class="btn btn-default">Hapus</a>
                        </div>
                      </td>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kode POS</th>
                <th>Telp</th>
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