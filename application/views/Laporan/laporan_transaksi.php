<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
		<style type="text/css">
			.center{
				width: 80%;
				margin: 0 auto;
				text-align: center;			}
		</style>
	</head>
	<body>
		<table align="center">
			<tr>
				<td>
					<img src="<?=base_url()?>assets/images/uin.png" width="80px" height="80px">
				</td>
				<td align="center">
					<font face="Arial" color="black" size="5"> <p align="center"> MULIA KARYA MOTOR </p></font>
					<font face="Arial" color="black" size="3"> <p align="center"> Jalan A.H. Nasution No. 28 Cibiru Bandung 40614 </p></font>
				</td>
			</tr>
		</table>
		<hr>
		<div class="center">
			<h3><b><?php echo $title ?></b></h3>
			<h3><b></b></h3>
		</div>

		<table border="1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nomor Bukti Transaksi</th>
                  <th>Nomor Polisi</th>
                  <th>Tipe</th>
                  <th>Nama Costumer</th>
                  <th>Jumlah Bayar</th>
                  <th>Bayar</th>
                  <th>Kembalian</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(!empty($transaksi)){
                  $no = 1;
                  foreach ($transaksi as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nomor_bukti_transaksi; ?></td>
                      <td><?php echo $value->nomor_polisi; ?></td>
                      <td><?php echo $value->tipe_kendaraan; ?></td>
                      <td><?php echo $value->nama_costumer; ?></td>
                      <td><?php echo $value->jumlah_bayar; ?></td>
                      <td><?php echo $value->bayar; ?></td>
                      <td><?php echo $value->kembalian; ?></td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td><?php echo $value->tanggal_input; ?></td>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
            </table>

		
	</body>
</html>
