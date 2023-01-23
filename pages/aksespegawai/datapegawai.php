<?php
include('koneksi.php');
?>
<h1> Data Pegawai </h1>
<p>
<table width="492" border="1" class="table table-striped">
  <tr>
    <td width="21">
      <div align="center"><strong>Nip</strong></div>
    </td>
    <td width="105">
      <div align="center"><strong>Nama </strong></div>
    </td>
    <td width="120">
      <div align="center"><strong>Email </strong></div>
    </td>
    <td width="105">
      <div align="center"><strong>No Hp</strong></div>
    </td>
    <td width="105">
      <div align="center"><strong>Alamat</strong></div>
    </td>
    <td width="105">
      <div align="center"><strong>Jabatan</strong></div>
    </td>
    <td width="105">
      <div align="center"><strong>Jenis Kelamin</strong></div>
    </td>
  </tr>
  <?php
  $tampil = mysql_query("select * from pegawai where nip='$_GET[username]';");
  while ($data = mysql_fetch_array($tampil)) {
  ?>
    <tr>
      <td>
        <div align="center"><?php echo $data['nip']; ?></div>
      </td>
      <td>
        <div align="center"><?php echo $data['nama']; ?></div>
      <td>
        <div align="center"><?php echo $data['email']; ?></div>
      </td>
      <td>
        <div align="center"><?php echo $data['nohp']; ?></div>
      </td>
      <td>
        <div align="center"><?php echo $data['alamat']; ?></div>
      </td>
      <td>
        <div align="center"><?php echo $data['jabatan']; ?></div>
      </td>
      <td>
        <div align="center"><?php echo $data['jenis_kelamin']; ?></div>
      </td>
    </tr>
  <?php

  }
  ?>
</table>