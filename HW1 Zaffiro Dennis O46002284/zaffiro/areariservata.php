<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: login2.php");
 exit;
}


$conn = mysqli_connect("127.0.0.1","root","","web") or die(mysqli_error($conn));


        if (!empty($_POST["tipologia"]) && !empty($_POST["cliente"]) && !empty($_POST["prodotto"])  && !empty($_POST["quantità"]))
    {
        // Preparazione 
        $tipologia = mysqli_real_escape_string($conn, $_POST["tipologia"]);
        $cliente = mysqli_real_escape_string($conn, $_POST["cliente"]);
        $prodotto = mysqli_real_escape_string($conn, $_POST["prodotto"]);
        $quantità = mysqli_real_escape_string($conn, $_POST["quantità"]);
        $query1 = "INSERT INTO acquisto values('$tipologia','$cliente', '$prodotto','$quantità')";
        // Esecuzione
        $res1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
        }
    else    {
        // Se solo uno dei due è impostato
        $error = "Compilare tutti i campi!!!";
    }
?>



<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>AREA RISERVATA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="area.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
   </head>
   <body>
   <header>
    <nav>
<div id="Logo">
   <img src="ns.png"/>
</div>

    <div id="Links">
        
    <a href='logout.php' class="button">Home</a>
</div>
<div id="menu">
    <div></div>
    <div></div>
    <div></div>
  </div>
</nav>


</header>
      <section id= "commesso">
<section id= "nuovo_acquisto">
      <form name='nuovo_acquisto'class='nuovo_acquisto' method='post'>
                
                <h1>INSERISCI ACQUISTO</h1>
                <div class="tipologia">
                    <div><label for='tipologia'>TIPOLOGIA </label></div>
                    <div><input type='text' name='tipologia' <?php if(isset($_POST["tipologia"])){echo "value=".$_POST["tipologia"];} ?>></div>
                </div>
                <div class="cliente">
                    <div><label for='cliente'>ID CLIENTE </label></div>
                    <div><input type='text' name='cliente' <?php if(isset($_POST["cliente"])){echo "value=".$_POST["cliente"];} ?>></div>
                </div>
                <div class="prodotto">
                    <div><label for='prodotto'>ID PRODOTTO </label></div>
                    <div><input type='text' name='prodotto' <?php if(isset($_POST["prodotto"])){echo "value=".$_POST["prodotto"];} ?>></div>
                </div>
                <div class="quantità">
                    <div><label for='quantità'>QUANTITA' </label></div>
                    <div><input type='text' name='quantità' <?php if(isset($_POST["quantità"])){echo "value=".$_POST["quantità"];} ?>></div>
                </div>
              
                 <div>
                    <input type='submit' value="Inserisci">
                </div>
</form>
</section>

</section>


</body>
</html>