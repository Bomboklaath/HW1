<?php
session_start();

$cliente=$_SESSION["username"];

$conn = mysqli_connect("127.0.0.1","root","","web") or die(mysqli_error($conn));


$query = "SELECT p.cf as cf,pr.componente,p.id,pr.costo,pr.immagine,pr.descrizione  FROM preferiti p join prodotto pr On p.id=pr.cod where p.cf='$cliente';" ;

// Esecuzione
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    // Se ci sono risultati, li scorro e riempio l'array che ritornerà al frontend
    while($entry = mysqli_fetch_assoc($res)) {
        $preferiti1[] = array("username" => $entry["cf"], 
                             "id" => $entry["componente"], 
                             "idP" => $entry["id"], 
                            "costo" => $entry["costo"],
                            "immagine" => $entry["immagine"],
                            "descrizione" => $entry["descrizione"]);
    }
    if (mysqli_num_rows($res) == 0) {
        echo json_encode(0);
        }
mysqli_close($conn);
echo json_encode($preferiti1);
exit;

}
?>