<?php
$mulai=$_GET["mulai"];
$selesai=$_GET["selesai"];
//echo "$mulai";
//echo "$selesai";


$koneksi     = mysqli_connect("localhost", "root", "", "kaligarangIkom");
$event       = mysqli_query($koneksi, "SELECT event FROM data where event between '$mulai' and '$selesai' order by id asc limit 30");
$ntu = mysqli_query($koneksi, "SELECT ntu FROM data order by id asc limit 30");

//$lokasi = mysqli_query($koneksi, "SELECT lokasi FROM data order by id desc limit 1");
//while ($data = mysqli_fetch_array($lokasi)){
//$map = $data['lokasi'];
//echo "$map";

?>
<html>
    <head>
        <title>Kaligarang-IoT</title>
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
<li><a href="index5.php">kekeruhan</a></li>
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
                    labels: [<?php while ($t = mysqli_fetch_array($event)) { echo '"' . $t['event'] . '",';}?>],
                    datasets: [{
                            label: '',
			    data: [<?php while ($n = mysqli_fetch_array($ntu)) { echo '"' . $n['ntu'] . '",';}?>],
                            backgroundColor:'#ff6384',                                                   
                            borderColor:'#ff6384',
                            borderWidth: 1,
			    maxBarThickness:10,
			    fontSize: 25,
				
				
}]
                	},
                options: {
			responsive:true,
			maintainAspectRatio: false,
			title: {
            		display: true,
            		text: 'Grafik Keruh',
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
	max: 1000
	},


      gridLines: {
        color: "black",
        borderDash: [2, 5],
	
      
	},

      scaleLabel: {
        display: true,
        labelString: "Kekeruhan(NTU)",
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
