<?php
 


    if (!empty($_POST["email"]) && !empty($_POST["nome"]) )
    {
        // Se mail e nome sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect("127.0.0.1", "root","","web") or die(mysqli_error($conn));
        // Preparazione 
        $mail = mysqli_real_escape_string($conn, $_POST['email']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
     
    
        $query = "INSERT into newsletter(mail, nome) values('$mail','$nome')";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        
      
     if (isset($_POST["email"]) || isset($_POST["nome"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }
    
        }

?>











<!DOCTYPE html>
<html>
<head>
    <script src="contents.js" defer></script>
<script src="mhw3.js" defer></script>
<script src="newsletter.js" defer></script>
<meta charset="utf-8">
<title>Layout Zaffiro</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mhw3.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
    <nav>
<div id="Logo">
   <img src="ns.png"/>
</div>
<!--<div id='searchbar'>Cerca<input type="text"> </div>-->
<div id="Links">
    <a href="mhw3.php">Home</a>
    <a href='login1.php'>Account</a>
    <a href='cont.html'>Contatti</a>
    <a href='login2.php' class="button">Area Riservata</a>
</div>
<div id="menu">
    <div></div>
    <div></div>
    <div></div>
  </div>
</nav>
<h1>
    <strong>BENVENUTO!</strong><br/>
    <br/>
    <a class="button" href="myshop.php">MY SHOP</a>
</h1>

</header>

<section>
    <h1 id='sium'>NEWS</h1>
    <div id='mhw3'></div>

</section>
<section>

<div id='preferiti' class ='hidden'>
    <h1 id='title'>Preferiti</h1>
    <div id='listapref'>

    </div>
</div>

<h1>Prodotti</h1>
<div id='lista'>

    
</div>
</section>

<form>Ricerca
    <input type="text" id='form'>
    <input type="submit" id='submit' value='cerca'>
</form>
<h1 id='v'>VIEWZ</h1>
<section id='screen'>
</section>


<footer>
    <div class="flexfoot">
        <div class="cose">
            <h5>Iscrivetevi alla newsletter!</h5>
            <form name='nl' method='post'>
               
                <div class="email">
                    <div><label for='email'>E-Mail</label></div>
                    <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                </div>
                <div class="nome">
                    <div><label for='nome'>Nome</label></div>
                    <div><input type='text' name='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>></div>
                </div>
               
                <div>
                    <input type='submit' value="Iscriviti">
                </div>
            </form>
            <h3>Dennis Zaffiro O46002284</h3>
        </div>
        <div class="cose">
            <h5>Mettetevi in contatto!</h5>
            <p>+39 11223344556</p>
            <p>emailpazzeska@libero.it</p>
        </div>
        <div class="cose">
            <h5>Trovateci sui social</h5>
            <a class="social" href="https://it-it.facebook.com/">facebook</a>
            <a class="social" href="https://twitter.com/?lang=it">Twitter</a>
            <a class="social" href="https://www.instagram.com/">instagram</a>
        </div>
        </div>
</footer>

</body>

</html>