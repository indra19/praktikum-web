<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www/w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Data Seleksi</title>
</head>

<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
		Status :
		<select name="job">
			<option value="Mahasiswa"
			<?php
				if(@$_POST['job'] == "Mahasiswa"){ 
					echo 'selected=selected';
				}
			?>
			>Mahasiswa <!--memeriksa apakah yang dipilih "Mahasiswa"-->
			
			<option value="Pelajar" 
			<?php
				if(@$_POST['job'] == "Pelajar"){ 
					echo 'selected=selected';
				}
			?>
			>Pelajar <!--memeriksa apakah yang dipilih "Pelajar"-->
			
			<option value="Bekerja" 
			<?php
				if(@$_POST['job'] == "Bekerja"){ 
					echo 'selected=selected';
				}
			?>
			>Bekerja <!--memeriksa apakah yang dipilih "Bekerja"-->
			
			<option value="Pengangguran" 
			<?php
				if(@$_POST['job'] == "Pengangguran"){ 
					echo 'selected=selected';
				}
			?>
			>Pengangguran <!--memeriksa apakah yang dipilih "Pengangguran"-->
		</select> <br />
		<input type="submit" value="ok" />
	</form>
<?php
	if (isset($_POST['job'])) {
	echo $_POST['job'];
}
?>
</body>
</html>