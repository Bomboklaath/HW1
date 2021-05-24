<?php

$conn = mysqli_connect("localhost","root","","web") or die(mysqli_error($conn));


$query = "SELECT componente,cod,costo,immagine,descrizione FROM prodotto" ;

// Esecuzione
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
    while($entry = mysqli_fetch_assoc($res)) {
        $prod[] = array( "comp" => $entry["componente"], 
                            "id" => $entry["cod"], "costo" => $entry["costo"], "immagine" => $entry["immagine"], "desc" => $entry["descrizione"]);
    }
}
mysqli_close($conn);
echo json_encode($prod);
exit;
?>