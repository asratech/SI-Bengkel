

<html>
<head>
<title>Faktur Pembayaran</title>
<style>
body{
	font-size: 20px;
}
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center><table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>MULIA KARYA MOTOR</b></span></br>Jln A.H Nasution No. 28 Bandung </br>Telp : 0594094545
</td>
<?php foreach($transaksi as $value): ?>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
No Trans. : <?php echo $value->nomor_bukti_transaksi ?></br>
Tanggal : <?php echo date('d-m-Y')?></br>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Nama Costumer : <?php if($value->id_costumer==1){ echo 'Pelanggan'; }else{ echo $value->nama_costumer; } ?></br>
Alamat : -
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : -
</td>
<?php endforeach; ?>
</table>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

<tr align='center'>
		<td width='10%'>No.</td>
		<td width='20%'>Item</td>
		<td width='13%'>Banyaknya</td>
		<td width='4%'>Harga</td>
		<td width='7%'>Diskon</td>
		<td width='13%'>Total Harga</td>
</tr>
<?php $no=1; foreach($transaksi_barang as $value1){ ?>
	<tr align="center">
		<td><?php echo $no++?></td>
		<td><?php echo $value1->nama_barang?></td>
		<td><?php echo $value1->jumlah_barang?></td>
		<td><?php echo $value1->harga_jual?></td>
		<td><?php echo $value1->diskon?></td>
		<td style='text-align:right'><?php echo $value1->sub_total?></td>
	</tr>
<?php } ?>
<tr align='center'>
		<td width='10%'>No.</td>
		<td width='20%'>Jasa</td>
		<td width='13%'>Banyaknya</td>
		<td width='4%'>Harga</td>
		<td width='7%'>Diskon</td>
		<td width='13%'>Total Harga</td>
</tr>
<?php $no=1; foreach($transaksi_jasa as $value2){ ?>
	<tr align="center">
		<td><?php echo $no++?></td>
		<td><?php echo $value2->nama_jasa?></td>
		<td>-</td>
		<td><?php echo $value2->harga_jual?></td>
		<td><?php echo $value2->diskon?></td>
		<td style='text-align:right'><?php echo $value2->sub_total?></td>
	</tr>
<?php } ?>
<?php foreach($transaksi as $value4): ?>
<tr>
		<td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td>
		<td style='text-align:right'>Rp. <?php echo number_format($value4->jumlah_bayar, 2) ?></td>
</tr>
<tr>
		<td colspan = '5'><div style='text-align:right'>Bayar : </div></td>
		<td style='text-align:right'>Rp. <?php echo number_format($value4->bayar, 2) ?></td>
</tr>
<tr>
		<td colspan = '5'><div style='text-align:right'>Kembalian : </div></td>
		<td style='text-align:right'>Rp. <?php echo number_format($value4->kembalian, 2) ?></td>
</tr>
<?php endforeach; ?>

</table>
<table style='width:650; font-size:7pt;' cellspacing='2'><tr><td align='center'>Diterima Oleh,</br></br><u>( <?php echo $this->session->userdata('nama') ?> )</u></td>
<td style='border:1px solid black; padding:5px; text-align:left; width:30%'>Catatan : </td>
<td align='center'>TTD,</br></br><u>( <?php if($value->id_costumer==1){ echo 'Pelanggan'; }else{ echo $value->nama_costumer; } ?> )</u></td>
</tr></table></center>
</body>
</html>
<script>
window.print();
</script>