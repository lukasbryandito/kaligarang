<?php
$koneksi     = mysqli_connect("localhost", "root", "", "kaligarangIkom");
$event       = mysqli_query($koneksi, "SELECT event FROM data order by id asc");
//$lokasi = mysqli_query($koneksi, "SELECT lokasi FROM data order by id asc limit 0,1");
$lokasi = mysqli_query($koneksi, "SELECT lokasi FROM data order by id asc limit 1");
while ($data = mysqli_fetch_array($lokasi)){
$map = $data['lokasi'];
$url = 'http://www.google.com/maps/place/';
//echo "www.google.com/maps/place/$map";
//Echo "<a href=www.google.com/maps/place/$map>cari</a>";
header("Location: $url$map");
exit;


}?>

