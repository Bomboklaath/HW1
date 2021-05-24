<?php 
    /*******************************************************
        Controlla che l'username sia unico
    ********************************************************/
   

    if (!isset($_GET["username"])) {
        echo "Non dovresti essere qui";
        exit;
    }

    header('Content-Type: application/json');
    
    $conn = mysqli_connect("127.0.0.1", "root","","web") or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_GET["username"]);

    $query = "SELECT cf FROM cliente
                WHERE cf = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>