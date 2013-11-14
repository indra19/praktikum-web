<html>
<head>
	<title>Latihan 1:Pencarian Data</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
	Kata Kunci : <input type="text" name="nama" size=40 value="" placeholder="<?php echo isset($_GET['nama'])?$_GET['nama']: ''; ?>"/>
	<input type="submit" value="Cari" name="cari" />
</form>

<?php 
if (isset($_GET['nama'])) {
	
	include_once("koneksi.php");
	$key=$_GET['nama'];

	$res=mysql_query("select * from mahasiswa where nama LIKE '%".$key."%' or nim='".$key."' or alamat LIKE '%".$key."%'");

	if (mysql_num_rows($res)!=0) {
		echo "Data ditemukan!!";
		?>
		<table border=1>
			<thead>
				<tr>
					<td>No.</td>
					<td>Nama.</td>
					<td>NIM.</td>
					<td>Alamat.</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$i=1;
				while($data=mysql_fetch_row($res))
				{
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $data[0]; ?></td>
					<td><?php echo $data[1]; ?></td>
					<td><?php echo $data[2]; ?></td>
				</tr>
				<?php
				$i++;
				}
			 ?>
			</tbody>
		</table>
		<?php
	}
	else
	{
		echo "Maaf, data tidak ditemukan!!";
	}
}
 ?>

</body>
</html>