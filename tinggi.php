<?php
$mulai=$_GET["mulai"];
$selesai=$_GET["selesai"];
//echo "$mulai";

//echo "$selesai";


$koneksi     	= mysqli_connect("localhost", "root", "", "kaligarangIkom");
//$bulan       = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc");
$event       = mysqli_query($koneksi, "SELECT event FROM data where event between '$mulai' and '$selesai' order by id asc limit 30");
$tinggi 	= mysqli_query($koneksi, "SELECT tinggi FROM data where tinggi < '1.0' order by id asc limit 30");
//$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
?>
<html>
    <head>
        <title>Kaligarang-IOT</title>
        <script src="Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
		width: 100%;
                height:600px;
                margin: 15px auto;
            }
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
        </style>
    </head>
    <body>
<ul>
<li><a href="index.php">Suhu</a><li></li>
<li><a href="index2.php">kelembaban</a></li>
<li><a href="index3.php">ph</a></li>
<li><a href="index4.php">Ketinggian Air</a></li>
<li><a href="index5.php">Kekeruhan</a></li>
<li><a href="lokasi.php">lokasi</a></li>
</ul>

        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($e = mysqli_fetch_array($event)) { echo '"' . $e['event'] . '",';}?>],
                    datasets: [{
                            label: '',
                            data: [<?php while ($t = mysqli_fetch_array($tinggi)) { echo '"' . $t['tinggi'] . '",';}?>],
                            backgroundColor:'#3300FF',                                                   
                            borderColor:'#3300FF',
                            borderWidth: 1,
			    maxBarThickness:10,
                        }]
                	},
                options: {responsive:true,
			maintainAspectRatio: false,
			title: {
            		display: true,
            		text: 'Grafik Ketinggian Air',
			fontSize: 35,
			//legend:{display:false},
			//tooltips:{label: function(tooltipItem){
				//return tooltipItem.Label;}}
			},
                    scales: {
xAxes: [{
      gridLines: {
        display: false,
        color: "black"
      },
      scaleLabel: {
        display: true,
        labelString: "Waktu(Tahun-Bulan-Tanggal Jam:Menit:Detik)",
        fontColor: "red",
	fontSize: 35
      }
    }],

yAxes: [{ 
	ticks: {
	beginAtZero: true,
	steps: 10,
	stepValue: 5,
	max: 1.0
	},

	 gridLines: {
        color: "black",
        borderDash: [2, 5],
	
      
	},

      scaleLabel: {
        display: true,
        labelString: "Tinggi Air(meter)",
        fontColor: "green",
	fontSize: 35


            }

    }]
  }
                }
            });
        </script>
    </body>
</html>
