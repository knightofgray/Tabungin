<?php

// $url = 'http://data.go.id/api/action/datastore_search?resource_id=1cdc41d4-7134-4579-b722-9d99129eb807&limit=1';
//
// $content = file_get_contents($url);
// $json = json_decode($content, true);
//
// var_dump($json);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Korban Kebakaran Bandung <?php echo date('Y') ?></title>
  </head>
  <body>
    <center><h1>Data Korban Kebakaran Bandung <?php echo date('Y') ?></h1></center>
    <table border=1>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kerugian</th>
        <th>Korban</th>
        <th>Selamat</th>
        <th>Keterangan</th>

      </tr>

<?php

$url = 'http://data.go.id/api/action/datastore_search?resource_id=1cdc41d4-7134-4579-b722-9d99129eb807';

$content = file_get_contents($url);
$json = json_decode($content, true);

foreach($json['result']['records'] as $data){
  $id = $data['_id'];
  $tgl = $data['Tanggal'];
  $selamat = $data['Yang_Terselamatkan'];
  $mati = $data['Korban_Mati'];
  $pemilik = $data['Nama_Pemilik'];
  $rugi = $data['Taksiran_Kerugian_IDR'];
  $rugine = str_replace(',', '', $rugi);
  $alamat = $data['Alamat'];
  $ket = $data['Keterangan'];
?>
      <tr align="center">
        <td><?= $id ?></td>
        <td align="left"><?= $pemilik ?></td>
        <td><?= $alamat ?></td>
        <td>
          <?= number_format($rugine) ?>
        </td>
        <td><?= $mati ?></td>
        <td><?= $selamat ?></td>
        <td><?= $ket ?></td>
      </tr>
<?php } ?>

  </table>
  <br>
</body>
</html>
