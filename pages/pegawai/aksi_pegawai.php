<?php

include('../koneksi.php');
if ($_GET['proses'] == 'entri') {
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$nohp = $_POST['nohp'];
	$alamat = $_POST['alamat'];
	$jabatan = $_POST['jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$level = $_POST['level'];

	$simpan = mysql_query("insert into pegawai(nip,nama,email,nohp,alamat,jabatan,jenis_kelamin) values ('$nip','$nama','$email','$nohp','$alamat','$jabatan','$jenis_kelamin')"); {
		echo "<script>top.location='../index.php?p=pegawai'</script>";
	}
}
if ($_GET['proses'] == 'edit') {
	$update = mysql_query("update pegawai set nama='$_POST[nama]',
												  email='$_POST[email]',
												  nohp='$_POST[nohp]',
												  alamat='$_POST[alamat]',
												  jabatan='$_POST[jabatan]',
												  jenis_kelamin='$_POST[jenis_kelamin]'
												  where nip='$_POST[nip]'");
	if ($update) {
		header("location:../index.php?p=pegawai");
	}
}
if ($_GET['proses'] == 'hapus') {
	$hapus = mysql_query("delete from pegawai where nip = '$_GET[nip]'");
	if ($hapus) {
		header("location:../index.php?p=pegawai");
	}
}
