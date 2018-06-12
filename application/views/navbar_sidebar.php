  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/images/')?>users.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Kancil Programming</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-barcode"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Barang/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Barang</span></a></li>
            <li><a href="<?=base_url('index.php/Barang/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Barang</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-male"></i> <span>Jasa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Jasa/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Jasa</span></a></li>
            <li><a href="<?=base_url('index.php/Jasa/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Jasa</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-md"></i> <span>Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Supplier/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Supplier</span></a></li>
            <li><a href="<?=base_url('index.php/Supplier/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Supplier</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Hutang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Hutang/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Hutang</span></a></li>
            <li><a href="<?=base_url('index.php/Hutang/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Hutang</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-md"></i> <span>Costumer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Costumer/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Costumer</span></a></li>
            <li><a href="<?=base_url('index.php/Costumer/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Costumer</span></a></li>
          </ul>
        </li>
        <li><a href="<?=base_url('index.php/Piutang/')?>"><i class="fa fa-credit-card"></i> <span>Piutang</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/Transaksi/')?>"><i class="fa fa-circle-o"></i> <span>Lihat Transaksi Lunas</span></a></li>
            <li><a href="<?=base_url('index.php/Transaksi/ViewBefore')?>"><i class="fa fa-circle-o"></i> <span>Lihat Transaksi Belum Lunas</span></a></li>
            <li><a href="<?=base_url('index.php/Transaksi/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah Transaksi</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target=".modal_pdf_barang"><i class="fa fa-circle-o"></i> <span>Laporan Barang</span></a></li>
            <li><a href="#" data-toggle="modal" data-target=".modal_pdf_costumer"><i class="fa fa-circle-o"></i> <span>Laporan Costumer</span></a></li>
            <li><a href="#" data-toggle="modal" data-target=".modal_pdf_jasa"><i class="fa fa-circle-o"></i> <span>Laporan Jasa</span></a></li>
            <li><a href="#" data-toggle="modal" data-target=".modal_pdf_supplier"><i class="fa fa-circle-o"></i> <span>Laporan Supplier</span></a></li>
            <li><a href="#" data-toggle="modal" data-target=".modal_pdf_transaksi"><i class="fa fa-circle-o"></i> <span>Laporan Transaksi</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('index.php/User/')?>"><i class="fa fa-circle-o"></i> <span>Lihat User</span></a></li>
            <li><a href="<?=base_url('index.php/User/Add')?>"><i class="fa fa-circle-o"></i> <span>Tambah User</span></a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Laporan Barang -->
  <div class="modal fade modal_pdf_barang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Laporan Barang</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url('index.php/Barang/Laporan_perperiode')?>">
            <div class="row" class="pull-center">
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="awal"></div>
              <div class="col-md-1 text-center">s/d</div>
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="akhir"></div>
              <div class="col-md-3 text-center"><button type="submit" class="btn btn-default btn-block" role="button">Cetak</button></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Laporan Costumer -->
  <div class="modal fade modal_pdf_costumer" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Laporan Costumer</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url('index.php/Costumer/Laporan_perperiode')?>">
            <div class="row" class="pull-center">
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="awal"></div>
              <div class="col-md-1 text-center">s/d</div>
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="akhir"></div>
              <div class="col-md-3 text-center"><button type="submit" class="btn btn-default btn-block" role="button">Cetak</button></div>
            </div>  
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Laporan Jasa -->
  <div class="modal fade modal_pdf_jasa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Laporan Jasa</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url('index.php/Jasa/Laporan_perperiode')?>">
            <div class="row" class="pull-center">
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="awal"></div>
              <div class="col-md-1 text-center">s/d</div>
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="akhir"></div>
              <div class="col-md-3 text-center"><button type="submit" class="btn btn-default btn-block" role="button">Cetak</button></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Laporan Supplier -->
  <div class="modal fade modal_pdf_supplier" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Laporan Supplier</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url('index.php/Supplier/Laporan_perperiode')?>">
            <div class="row" class="pull-center">
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="awal"></div>
              <div class="col-md-1 text-center">s/d</div>
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="akhir"></div>
              <div class="col-md-3 text-center"><button type="submit" class="btn btn-default btn-block" role="button">Cetak</button></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Laporan Supplier -->
  <div class="modal fade modal_pdf_transaksi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Laporan Transaksi</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?=base_url('index.php/Transaksi/Laporan_perperiode')?>">
            <div class="row" class="pull-center">
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="awal"></div>
              <div class="col-md-1 text-center">s/d</div>
              <div class="col-md-4 text-center"><input class="form-control" type="date" name="akhir"></div>
              <div class="col-md-3 text-center"><button type="submit" class="btn btn-default btn-block" role="button">Cetak</button></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>