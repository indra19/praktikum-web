<html>
<head>
	<title>Latihan 2:Membatasi Tampilan Data</title>
</head>
<body>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<?php $jum=(isset($_POST['jum'])?$_POST['jum']: 5) ; ?>
		Tampilkan sebanyak : 	<select name="jum">
									<option value="5" <?php echo $jum==5?"selected": ''; ?>>5</option>
									<option value="10" <?php echo $jum==10?"selected": ''; ?>>10</option>
									<option value="15" <?php echo $jum==15?"selected": ''; ?>>15</option>
									<option value="20" <?php echo $jum==20?"selected": ''; ?>>20</option>
									<option value="25" <?php echo $jum==25?"selected": ''; ?>>25</option>
								</select>
		<input type="submit" value="Tampilkan" />
	</form>
<?php 

if (isset($_POST['jum'])) {
	require_once("koneksi.php");

	$jum=$_POST['jum'];

	$res=mysql_query("select * from mahasiswa limit 0, ".$jum." ");
	// var_dump($res);
	// echo $jum;
	if (mysql_num_rows($res)!=0) {
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
}

 ?>
</body>
</html>