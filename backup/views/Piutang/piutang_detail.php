<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Piutang
      <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?=base_url('Piutang/')?>">Piutang</a></li>
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
            <h3 class="box-title">Piutang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-responsive">
              <tr>
                <td>Nama Costumer</td>
                <td><?=$piutang->nama_costumer?></td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td><?=$piutang->provinsi?></td>
              </tr>
              <tr>
                <td>Kota</td>
                <td><?=$piutang->kota?></td>
              </tr>
              <tr>
                <td>Kode Pos</td>
                <td><?=$piutang->kode_pos?></td>
              </tr>
              <tr>
                <td>Nomor Telepon</td>
                <td><?=$piutang->telepon?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$piutang->alamat?></td>
              </tr>
              <tr>
                <td>Jumlah Piutang</td>
                <td><?='Rp. '.number_format($piutang->jumlah)?></td>
              </tr>
              <tr>
                <td>Bayar Piutang</td>
                <td><?='Rp. '.number_format($piutang->bayar)?></td>
              </tr>
              <tr>
                <td>Sisa Piutang</td>
                <td><?='Rp. '.number_format($piutang->sisa)?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><?=$piutang->keterangan?></td>
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
                if(!empty($piutang)){
                  $no = 1;
                  foreach ($sub_piutang as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo 'Rp. '.number_format($value->bayar,2); ?></td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td><?php echo $value->tanggal; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?=base_url('index.php/Piutang/DeleteSubPiutang/'.$piutang->id_piutang_costumer.'/'.$value->id_sub_piutang_costumer)?>" onclick="return confirm('Apakah yakin akan dihapus ?')" class="btn btn-default">Hapus</a>
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