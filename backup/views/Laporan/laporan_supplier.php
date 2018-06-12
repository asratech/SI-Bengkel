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
          <th>Alamat</th>
          <th>Provinsi</th>
          <th>Kota</th>
          <th>Kode POS</th>
          <th>Telp</th>
          <th>Tanggal Input</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if (!empty($supplier)) {
          $no = 1;
          foreach ($supplier as $value) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $value->nama_supplier; ?></td>
              <td><?php echo $value->alamat; ?></td>
              <td><?php echo $value->provinsi; ?></td>
              <td><?php echo $value->kota; ?></td>
              <td><?php echo $value->kode_pos; ?></td>
              <td><?php echo $value->telepon; ?></td>
              <td><?php echo $value->tanggal_input; ?></td>
            </tr>
        <?php endforeach;
        } ?>
      </tbody>
    </table>

		
	</body>
</html>
