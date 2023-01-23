<?php
include('koneksi.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'list';
switch ($page) {
  case 'list':
?>
    <h1> Data Gaji </h1>
    <a href="index.php?p=gaji&page=entri" class="btn btn-success"><span class="glyphicon glyphicon-plus"> Tambah</span></a>
    <a href="index.php?p=gaji&page=cari" class="btn btn-success"><span class="glyphicon glyphicon-download-alt" target="_blank"> Laporan</span></a>
    <p>
    <table width="492" border="1" class="table table-striped">
      <tr>

        <td width="105">
          <div align="center"><strong>Tgl Gaji </strong></div>
        </td>
        <td width="120">
          <div align="center"><strong>Nip </strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Gaji Harian</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Total Masuk</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Lembur</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Total Gaji</strong></div>
        </td>
        <td width="107">
          <div align="center"><strong>Aksi</strong></div>
        </td>
      </tr>
      <?php
      $tampil = mysql_query("select * from gaji");
      $no = 1;
      while ($data = mysql_fetch_array($tampil)) {
      ?>
        <tr>

          <td>
            <div align="left"><?php echo $data['tgl_gaji']; ?></div>
          <td>
            <div align="center"><?php echo $data['nip']; ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" . number_format($data['gaji_harian'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="center"><?php echo $data['total_masuk'] . " hari"; ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" .  number_format($data['lembur'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" . number_format($data['total_gaji'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="left"><a href="gaji/aksi_gaji.php?proses=hapus&id_gaji=<?php echo $data['id_gaji'] ?>"><span class="glyphicon glyphicon-floppy-remove"> Hapus</span></a><br />
              <a href="index.php?p=gaji&page=edit&id_gaji=<?php echo $data['id_gaji'] ?>"><span class="glyphicon glyphicon-edit"> Edit</span></a>
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

    <h1> Form Gaji </h1>
    <form id="form1" name="form1" method="post" action="gaji/aksi_gaji.php?proses=entri">
      <table width="311" border="0">

        <tr>
          <td>Tgl Gaji </td>
          <td><label>
              <input type="text" name="tgl_gaji" />
            </label></td>
        </tr>
        <tr>
          <td>Nip</td>
          <td><label>
              <select class="form-control" name="nip">
                <option value="<?php echo $data['nip']; ?>"></option>
                <?php
                $query = mysql_query("select nip from pegawai");
                while ($data = mysql_fetch_array($query)) {
                  echo "<option value=" . $data['nip'] . ">" . $data['nip'] . "</option>";
                }

                ?>
              </select>
            </label></td>
        </tr>
        <tr>
          <td>Gaji Harian</td>
          <td><label>
              <input type="text" name="gaji_harian" />
            </label></td>
        </tr>
        <tr>
          <td>Total Masuk</td>
          <td><label>
              <input type="text" name="total_masuk" />
            </label></td>
        </tr>
        <tr>
          <td>Lembur</td>
          <td><label>
              <input type="text" name="lembur" />
            </label></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td><label>
              <button name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk">Simpan</span></button>

            </label></td>
        </tr>
      </table>
      <p><a href="index.php?p=gaji">Tampilkan Tabel Gaji </a> </p>
    </form>
  <?php
    break;
  case 'edit':
    $tampil = mysql_query("select * from gaji where id_gaji='$_GET[id_gaji]'");
    $data = mysql_fetch_array($tampil);
  ?>
    <form id="form1" name="form1" method="post" action="gaji/aksi_gaji.php?proses=edit">
      <table width="311" border="0">
        <tr>
          <td colspan="2">
            <div align="center"><strong>DATA GAJI </strong></div>
          </td>
        </tr>
        <tr>
          <td width="94">Id Gaji </td>
          <td width="207"><label>
              <input type="text" name="id_gaji" value="<?php echo $data['id_gaji'] ?>" readonly />
            </label></td>
        </tr>
        <tr>
          <td>Tgl Gaji</td>
          <td><label>
              <input type="text" name="tgl_gaji" value="<?php echo $data['tgl_gaji'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Nip</td>
          <td><label>
              <input type="text" name="nip" value="<?php echo $data['nip'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Gaji Harian</td>
          <td><label>
              <input type="text" name="gaji_harian" value="<?php echo $data['gaji_harian'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Total Masuk</td>
          <td><label>
              <input type="text" name="total_masuk" value="<?php echo $data['total_masuk'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Lembur</td>
          <td><label>
              <input type="text" name="lembur" value="<?php echo $data['lembur'] ?>" />
            </label></td>
        </tr>
        <tr>
          <td>Total Gaji</td>
          <td><label>
              <input type="text" name="total_gaji" value="<?php echo $data['total_gaji'] ?>" />
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
  case 'cari':
    ob_start();
    $cari = mysql_query("SELECT * FROM gaji where month(tgl_gaji)='$_POST[bulan]'");
    $data = mysql_fetch_array($cari);
  ?>

    <h1> Laporan Gaji Pegawai </h1>
    <form id="form1" name="form1" method="post" action="">
      <tr>
        <td width="94">Bulan</td>
        <select name="bulan">
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>

        <select name="tahun">
          <?php
          $mulai = date('Y') - 10;
          for ($i = $mulai; $i < $mulai + 20; $i++) {
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
          }
          ?>
        </select>


      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
            <button name="cari" type="submit" id="submit" value="submit" class="btn btn-primary">
              <span class="glyphicon glyphicon-find">Cari</span></button>
          </label></td>
      </tr>
    </form>

    <table width="492" border="1" class="table table-striped">
      <tr>
        <td width="21">
          <div align="center"><strong>Id Gaji</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Tgl Gaji </strong></div>
        </td>
        <td width="120">
          <div align="center"><strong>Nip </strong></div>
        </td>
        <td width="120">
          <div align="center"><strong>Nama </strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Gaji Harian</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Total Masuk</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Lembur</strong></div>
        </td>
        <td width="105">
          <div align="center"><strong>Total Gaji</strong></div>
        </td>
        <td width="107">
          <div align="center"><strong>Aksi</strong></div>
        </td>
      </tr>
      <?php
      $gji = mysql_query("select * from gaji,pegawai where month(tgl_gaji)='$_POST[bulan]' and year(tgl_gaji) = '$_POST[tahun]' and gaji.nip=pegawai.nip");
      $no = 1;
      while ($data = mysql_fetch_array($gji)) {
      ?>
        <tr>
          <td>
            <div align="center"><?php echo $data['id_gaji']; ?></div>
          </td>
          <td>
            <div align="left"><?php echo $data['tgl_gaji']; ?></div>
          <td>
            <div align="center"><?php echo $data['nip']; ?></div>
          </td>
          <td>
            <div align="center"><?php echo $data['nama']; ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" . number_format($data['gaji_harian'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="center"><?php echo $data['total_masuk'] . " hari"; ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" .  number_format($data['lembur'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="center"><?php echo "Rp" . number_format($data['total_gaji'], 2, ',', '.'); ?></div>
          </td>
          <td>
            <div align="left"><a href="index.php?p=gaji&page=cetak&id_gaji=<?php echo $data['id_gaji'] ?>"><span class="glyphicon glyphicon-print"> Cetak</span></a><br />
        </tr>
        </tr>
      <?php
        $no++;
      }
      ?>
    </table>

  <?php
    break;
  case 'cetak':
    $tampil = mysql_query("SELECT * from gaji,pegawai where id_gaji='$_GET[id_gaji]' and gaji.nip=pegawai.nip");
    $data = mysql_fetch_array($tampil);
  ?>
    <h4> <B>SLIP GAJI </B></h4>
    <table width="311" border="0">

      <tr>
        <td width="150">Id Gaji</td>
        <td width="150"> : </td>
        <td width="160"><?php echo $data['id_gaji'] ?> </td>
        <td width="207"><label>
          </label></td>
      </tr>
      <tr>
        <td width="150">Tanggal Gaji </td>
        <td width="150"> : </td>
        <td width="150"><?php echo $data['tgl_gaji'] ?> </td>
        <td width="207"><label>
      </tr>
      <tr>
        <td width="150">NIP </td>
        <td width="150"> : </td>
        <td width="150"><?php echo $data['nip'] ?> </td>
        <td width="207"><label>
      </tr>
      <tr>
        <td width="150">Nama </td>
        <td width="150"> : </td>
        <td width="150"><?php echo $data['nama'] ?> </td>
        <td width="207"><label>
      </tr>
      <td width="150">No Hp </td>
      <td width="150"> : </td>
      <td width="150"><?php echo $data['nohp'] ?> </td>
      <td width="207"><label>
          </tr>
          <tr>
            <td width="150">Jabatan </td>
            <td width="150"> : </td>
            <td width="150"><?php echo $data['jabatan'] ?> </td>
            <td width="207"><label>
          <tr>
          <tr>
            <td width="150">Alamat </td>
            <td width="150"> : </td>
            <td width="150"><?php echo $data['alamat'] ?> </td>
            <td width="207"><label>
          <tr>
            <td width="150">Gaji Harian </td>
            <td width="150"> : </td>
            <td width="150"><?php echo "Rp " . number_format($data['gaji_harian'], 2, ',', '.') ?> </td>
            <td width="207"><label>
          </tr>
          <tr>
            <td width="150">Total Masuk </td>
            <td width="150"> : </td>
            <td width="150"><?php echo $data['total_masuk'] . " hari" ?> </td>
            <td width="207"><label>
          <tr>
            <td width="150">Lembur </td>
            <td width="150"> : </td>
            <td width="150"><?php echo "Rp " . number_format($data['lembur'], 2, ',', '.') ?> </td>
            <td width="207"><label>
          <tr>
            <td width="150">Total Gaji </td>
            <td width="150"> : </td>
            <td width="150"><?php echo "Rp " . number_format($data['total_gaji'], 2, ',', '.') ?> </td>
            <td width="207"><label>
    </table>


<?php
    break;
}
?>