<?php
$koneksi     = mysqli_connect("localhost", "root", "", "kaligarangIkom");
$event       = mysqli_query($koneksi, "SELECT event FROM data order by id asc");
$suhu = mysqli_query($koneksi, "SELECT temperatur FROM data order by id asc");
$lembab = mysqli_query($koneksi, "SELECT kelembaban FROM data order by id asc");

?>
<html>
    <head>
        <title>Kaligarang</title>
        <script src="Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
<a href="suhu.php">Suhu</a>
<a href="kelembaban.php">kelembaban</a>
<a href="ph.php">ph</a>
<a href="index.php">Ketinggian Air</a>
<a href="dht.php">DHT</a>
<a href="lokasi.php">lokasi</a>

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
                            label: 'chart temperatur',
                            data: [<?php while ($t = mysqli_fetch_array($suhu)) { echo '"' . $t['temperatur'] . '",';}?>],
			    //label: 'chart kelembaban',
                            //data: [<?php while ($l = mysqli_fetch_array($lembab)) { echo '"' . $l['kelembaban'] . '",';}?>],
				
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                   scales: {
    




xAxes: [{
      gridLines: {
        display: false,
        color: "black"
      },
      scaleLabel: {
        display: true,
        labelString: "Waktu",
        fontColor: "red"
      }
    }],
    yAxes: [{
	ticks: {
	beginAtZero: true,
	steps: 10,
	stepValue: 5,
	max: 50
	},


      gridLines: {
        color: "black",
        borderDash: [2, 5],
	
      
	},

      scaleLabel: {
        display: true,
        labelString: "Temperatur(°C)",
        fontColor: "green"


      }

    }]
  }
                }
            });
        </script>
    </body>
</html>
