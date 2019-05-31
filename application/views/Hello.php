<!DOCTYPE html>
<html>
<head>
	<title>Aamiin</title>
</head>
<body>

<h1>Bismillah Fullstack <?php echo $apa; ?> </h1>
<p>
	<?php
		foreach ($baru as $data => $isi) {
			echo $data." - ".$isi['NRP']." - ".$isi['Nama'];
			echo "<br><br>";
		}
	?>

</p>

</body>
</html>
