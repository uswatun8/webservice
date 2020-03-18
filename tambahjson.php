<html>
<head>
<title>Rest Web Services</title>
</head>
<body>
	<?php
		if (isset ($_POST['nim'])) {
			$url = 'https://uswatun82.000webhostapp.com/jsonmhs.php';
			//$data = "[{\"nim\":\".$_POST['nim'].\",\"nama\":\".$_POST['nama'].\",\"prodi\":\".$_POST['progdi'].\"}]";//
			$data="{\"nim\":\"".$_POST['nim']."\",\"nama\":\"".$_POST['nama']."\",\"tempat\":\"".$_POST['tempat']."\",\"judul\":\"".$_POST['judul']."\",\"dosbing\":\"".$_POST['dosbing']."\"}";
			echo "datanya ".$data;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			echo "response ".$response;
			curl_close($ch);
		}
	?>
	<form method="POST" action="tambahjson.php">
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim" id="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" id="nama"></td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td><input type="text" name="tempat" id="tempat"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" id="judul"></td>
			</tr>
			<tr>
				<td>Dosen Bimbingan</td>
				<td><input type="text" name="dosbing" id="dosbing"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" id="submit" value="Tambah"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>
