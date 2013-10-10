<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www/w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Data Checkbox</title>
</head>

<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
		Pekerjaan : <br />
		<input type="checkbox" name="Game[]" value="PES2010"  
		<?php
			if($_POST['Game[]']="PES2010"){
				echo 'checked="checked"';
			}
		?>		
		/>PES2010 <br /> <!--memeriksa apakah yang dipilih "PES2010"-->
		
		<input type="checkbox" name="Game[]" value="DOTA2"  
		<?php
			if($_POST['Game[]']="DOTA2"){
				echo 'checked="checked"';
			}
		?>		
		/>DOTA2 <br /> <!--memeriksa apakah yang dipilih "DOTA2"-->
		
		<input type="checkbox" name="Game[]" value="HON"  
		<?php
			if($_POST['Game[]']="HON"){
				echo 'checked="checked"';
			}
		?>		
		/>HON <br /> <!--memeriksa apakah yang dipilih "HON"-->

		<input type="submit" value="ok" />
	</form>
<?php
	// Ekstraksi nilai
	if (isset($_POST['Game'])) {
		foreach ($_POST['Game'] as $key => $val) {
		echo $key . ' -> ' .$val . '<br />';
		}
	}
?>
</body>
</html>