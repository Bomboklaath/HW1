<?php
session_start();
if(!isset($_SESSION["username"])){
 header("Location: login1.php");
 exit;
}
?>

<html>
<head>
    
<script src="home.js" defer></script>

<meta charset="utf-8">
<title>NERDSTOP-HOME</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mhw3.css">
<link rel="stylesheet" href="home.css">
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

<div id="Links">
    <a href="mhw3.php">Home</a>
    <a href='logout.php'>Logout</a>
    <a href='cont.html'>Contatti</a>
    <a href='myshop.php' class="button">My Shop</a>
</div>
<div id="menu">
    <div></div>
    <div></div>
    <div></div>
  </div>
</nav>
<h1>
    <strong>BENTORNATO!</strong>
</h1>

</header>


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




<footer>
    <div class="flexfoot">
        <div class="cose">
            
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