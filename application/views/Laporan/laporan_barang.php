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
					<!-- <img src="<?=base_url()?>assets/images/uin.png" width="80px" height="80px"> -->
				</td>
				<td align="center">
					<font face="Arial" color="black" size="5"> <p align="center"> MULIA KARYA MOTOR </p></font>
					<font face="Arial" color="black" size="5"> <p align="center"> Jln A.H Nasution No. 28 </p></font>
					<font face="Arial" color="black" size="5"> <p align="center"> Cibiru Bandung </p></font>
				</td>
			</tr>
		</table>
		<hr>
		<div class="center">
			<h3><b><?php echo $title ?></b></h3>
			<h3><b></b></h3>
		</div>

		<table border="1" class="table table-bordered table-striped" align="center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Harga Beli Satuan</th>
                  <th>Harga Jual Satuan</th>
                  <th>Diskon</th>
                  <th>PPN</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(!empty($barang)){
                  $no = 1;
                  foreach ($barang as $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nama_barang; ?></td>
                      <td><?php echo $value->satuan_barang; ?></td>
                      <td><?php echo $value->harga_beli_satuan; ?></td>
                      <td><?php echo $value->harga_jual_satuan; ?></td>
                      <td><?php echo $value->diskon; ?></td>
                      <td><?php echo $value->ppn; ?></td>
                      <td><?php echo $value->stock_barang; ?></td>
                    </tr>
                <?php endforeach;
                } ?>
              </tbody>
            </table>

		
	</body>
</html>
