<!DOCTYPE html>
<html>
<head><title>Tugas Praktikum Web</title></head>
<body>
<h1>Operator Aritmatika</h1>
<body bgcolor="white">
<form method="post">
<table>
	<tr>
		<td align="center"><b>Nilai 1<b></td>
		<td align="center"><b>Operator</b></td>
		<td align="center"><b>Nilai 2<b></td>
	</tr>
	<tr>
		<td><input type="number" name="angka1" value="" required placeholder= "Masukkan Nilai"/></td>
		<td align="center"><select name="operator">
		<option></option>
		<option value ="+">+</option>  /*penggunaan operator tambah*/
		<option value ="-">-</option>  /*penggunaan operator kurang*/
		<option value ="*">*</option>  /*penggunaan operator dikali*/
		<option value ="/">/</option>  /*penggunaan operator dibagi*/
		</select></td>
		<td><input type="number" name="angka2" value="" required placeholder= "Masukkan Nilai"/></td>
		<td>=</td>

		<?php
			if(isset($_POST['angka1']) or isset($_POST['angka2']) ){ /*Isset berfungsi untuk menyatakan apakah variable nilai 1 dan 2 tersebut sudah diset atau belum*/
			$angka1 = $_POST['angka1']; /* $_POST digunakan untuk mengembalikan angka 1*/
			$angka2 = $_POST['angka2']; /* $_POST digunakan untuk mengembalikan angka 2*/
			}else{
			$angka1 = "0"; /*ketentuan masukan yang bisa digunakan pada nilai 1*/
			$angka2 = "0"; /*ketentuan masukan yang busa digunakan pada nilai 2*/
			}
			if(isset($_POST['operator'])){ /*Isset berfungsi untuk menyatakan apakah variable operator tersebut sudah diset atau belum*/
			$operator =$_POST['operator']; /* $_POST merupakan code yang digunakan untuk mengembalikan operator*/ 
			}else{
			$operator ="";
			}
			switch($operator){ 
			case "+":
				$hasil = $_POST["angka1"] + $_POST["angka2"]; /*operasi penambahan nilai 1 dan nilai 2*/
			break;
			case "-":
				$hasil = $_POST["angka1"] - $_POST["angka2"]; /*operasi pengurangan nilai 1 dan nilai 2*/
			break;
			case "*":
				$hasil = $_POST["angka1"] * $_POST["angka2"]; /*operasi perkalian nilai 1 dan nilai 2*/
			break;
			case "/":
				$hasil = $_POST["angka1"] / $_POST["angka2"]; /*operasi pembagian nilai 1 dan nilai 2*/
			break;
			}
		?>
		<td><input type="text" name="hasil"  value="<?=$hasil;?>"></td>
		<td><input type="submit" name="Aritmatika" value="Hitung"></td>
	</tr>

</table>
</form>
</body>
</html>