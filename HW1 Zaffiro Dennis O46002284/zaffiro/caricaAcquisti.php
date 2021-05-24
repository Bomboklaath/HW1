<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login1.php");
   exit;
}
$cliente=$_SESSION["username"];
$conn = mysqli_connect("127.0.0.1","root","","web") or die(mysqli_error($conn));

$query = "SELECT tipologia,prodotto,quantità FROM acquisto where cliente='$cliente' "  ;
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));



// Esecuzione

if (mysqli_num_rows($res) > 0) {
    // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
    while($entry = mysqli_fetch_assoc($res)) {
        $acquisti[] = array(  "tipologia" => $entry["tipologia"], 
                            
                            "prodotto" => $entry["prodotto"],
                            "quantità" => $entry["quantità"]);
    }
}
else{
    print_r("Collegamento fallito");
}
mysqli_close($conn);
echo json_encode($acquisti);
exit;
?>