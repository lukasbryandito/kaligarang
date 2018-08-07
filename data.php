    <?php
    include ('connection.php');
    $sql_insert = "INSERT INTO data (temperatur, kelembaban, ph, volt, tinggi, lokasi, teg, ntu) VALUES ('".$_GET["temperatur"]."', '".$_GET["kelembaban"]."', '".$_GET["ph"]."', '".$_GET["volt"]."', '".$_GET["tinggi"]."', '".$_GET["lokasi"]."', '".$_GET["teg"]."', '".$_GET["ntu"]."')";
    if(mysqli_query($conn,$sql_insert))
    {
    echo "Done";
    mysqli_close($conn);
    }
    else
    {
    echo "error is ".mysqli_error($conn );
    }
    ?>
