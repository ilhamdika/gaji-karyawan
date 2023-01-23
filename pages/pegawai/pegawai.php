<?php
include('koneksi.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'list';
switch ($page) {
  case 'list':
?>
    <h1> Data Pekerja </h1>
    <a href="index.php?p=pegawai&page=entri" class="btn btn-success"><span class="glyphicon glyphicon-plus"> Tambah</span></a>
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
        <td width="107">
          <div align="center"><strong>Aksi</strong></div>
        </td>
      </tr>
      <?php
      $tampil = mysql_query("select * from pegawai ");
      $no = 1;
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
          <td>
            <div align="left"><a href="pegawai/aksi_pegawai.php?proses=hapus&nip=<?php echo $data['nip'] ?>"><span class="glyphicon glyphicon-floppy-remove"> Hapus</span></a><br />
              <a href="index.php?p=pegawai&page=edit&nip=<?php echo $data['nip'] ?>"><span class="glyphicon glyphicon-edit"> Edit</span></a>
            </div>
          </td>
        </tr>
      <?php
        $no++;
      }
      ?>
    </table>
  <?php
    break;
  case 'entri':
  ?>
    <h1> Form Pekerja </h1>
    <form id="form1" name="form1" method="post" action="pegawai/aksi_pegawai.php?proses=entri">
      <table width="311" border="0">
        <input type="hidden" name="level" value="pegawai" />
        <tr>
          <td width="94">Nip </td>
          <td width="207"><label>
              <input type="text" name="nip" />
            </label></td>
        </tr>
        <tr>
          <td>Nama </td>
          <td><label>
              <input type="text" name="nama" />
            </label></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><label>
              <input type="text" name="email" />
            </label></td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td><label>
              <input type="text" name="nohp" />
            </label></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><label>
              <input type="text" name="alamat" />
            </label></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td><label>
              <input type="text" name="jabatan" />
            </label></td>
        </tr>
        <tr>
          <td>Jenis Kekamin</td>
          <td><label>
              <input type="text" name="jenis_kelamin" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><label>
              <button name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk">Simpan</span> </button>

            </label></td>
        </tr>
      </table>
      <p><a href="index.php?p=pegawai">Tampilkan Tabel Pegawai </a> </p>
    </form>
  <?php
    break;
  case 'edit':
    $tampil = mysql_query("select * from pegawai where nip='$_GET[nip]'");
    $data = mysql_fetch_array($tampil);
  ?>
    <form id="form1" name="form1" method="post" action="pegawai/aksi_pegawai.php?proses=edit">
      <table width="311" border="0">
        <tr>
          <td colspan="2">
            <div align="center"><strong>DATA PEGAWAI </strong></div>
          </td>
        </tr>
        <tr>
          <td width="94">Nip </td>
          <td width="207"><label>
              <input type="text" name="nip" value="<?php echo $data['nip'] ?>" readonly />
            </label></td>
        </tr>
        <tr>
          <td>Nama </td>
          <td><label>
              <input type="text" name="nama" value="<?php echo $data['nama'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><label>
              <input type="text" name="email" value="<?php echo $data['email'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td><label>
              <input type="text" name="nohp" value="<?php echo $data['nohp'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><label>
              <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td><label>
              <input type="text" name="jabatan" value="<?php echo $data['jabatan'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><label>
              <input type="text" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><label>
              <input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-primary" />
            </label></td>
        </tr>
      </table>
    </form>

<?php
    break;
}
?>