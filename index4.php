<?php
$koneksi     = mysqli_connect("localhost", "root", "", "kaligarangIkom");
$event       = mysqli_query($koneksi, "SELECT event FROM data order by id desc limit 30");
//$suhu = mysqli_query($koneksi, "SELECT temperatur FROM data order by id desc limit 30");
?>

<fieldset>
    <legend>Settings Time</legend>
<form action="http://localhost/data/tinggi.php"method="get">
    <div>
        <label for="muali">Waktu Mulai:</label>
        <input type="datetime-local" id="mulai"
               name="mulai" value="2018-07-27 00:10:30"
               min="2018-07-23 00:00:00" max="2018-07-28 00:00:00" />
    </div>
 <div>
        <label for="selesai">Waktu Selesai:</label>
        <input type="datetime-local" id="selesai"
               name="selesai" value="2018-07-27 01:19:30"
               min="2018-07-23 00:00:00" max="2018-07-28 00:00:00" />
    </div>

   <p><input type = "submit" value = "Tampilkan" /></p>

</form>
</fieldset>
<script>
legend {
    background-color: #000;
    color: #fff;
    padding: 3px 6px;
}

.output {
    font: 1rem 'Fira Sans', sans-serif;
}

input,
select {
    margin: .4rem;
}

label {
    display: inline-block;
    text-align: right;
    width: 30%;
}
</script>
<html>
<head>
<style>
body {
    background-color: lightblue;
}
</style>
</head>
<body>

</body>
</html>
