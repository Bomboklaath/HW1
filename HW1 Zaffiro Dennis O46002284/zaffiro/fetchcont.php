<?php

$conn = mysqli_connect("localhost","root","","web") or die(mysqli_error($conn));


$query = "SELECT matricola,città,indirizzo,piano FROM ubicazione" ;

// Esecuzione
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
    while($entry = mysqli_fetch_assoc($res)) {
        $ak[] = array( "city" => $entry["città"],"key" => $entry["matricola"], 
                            "via" => $entry["indirizzo"], "piano" => $entry["piano"]);
    }
}
mysqli_close($conn);
echo json_encode($ak);
exit;
?>