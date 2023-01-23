 <?php
	include('../koneksi.php');

	/* PROSES ENTRI DATA GAJI */

	if ($_GET['proses'] == 'entri') {
		$cari = mysql_query("select * from gaji where nip='$_POST[nip]' and tgl_gaji='$_POST[tgl_gaji]' ");
		$ca = mysql_num_rows($cari);

		if (empty($ca)) {

			$tgl_gaji = $_POST['tgl_gaji'];
			$nip = $_POST['nip'];
			$gaji_harian = $_POST['gaji_harian'];
			$total_masuk = $_POST['total_masuk'];
			$lembur = $_POST['lembur'];
			$total_gaji = ($gaji_harian * $total_masuk) + $lembur;

			$simpan = mysql_query("insert into gaji(tgl_gaji,nip,gaji_harian,total_masuk,lembur,total_gaji) values ('$tgl_gaji','$nip','$gaji_harian','$total_masuk','$lembur','$total_gaji')");
			if ($simpan) {
				echo "<script>top.location='../index.php?p=gaji'</script>";
			}
		} elseif (!empty($ca)) {
			echo "<script>alert('Data Sudah Ada')</script>";
			echo "<script>top.location='../index.php?p=gaji'</script>";
		}
	}

	/* PROSES EDIT DATA GAJI */
	if ($_GET['proses'] == 'edit') {
		$update = mysql_query("update gaji set tgl_gaji='$_POST[tgl_gaji]',
												  nip='$_POST[nip]',
												  gaji_harian='$_POST[gaji_harian]',
												  total_masuk='$_POST[total_masuk]',
												  lembur='$_POST[lembur]',
												  total_gaji='$_POST[total_gaji]'
												  where id_gaji='$_POST[id_gaji]'");
		if ($update) {
			header("location:../index.php?p=gaji");
		}
	}


	/* PROSES HAPUS DATA GAJI */
	if ($_GET['proses'] == 'hapus') {
		$hapus = mysql_query("DELETE from gaji where id_gaji='$_GET[id_gaji]'");
		if ($hapus) {
			header("location:../index.php?p=gaji");
		}
	}

	?>