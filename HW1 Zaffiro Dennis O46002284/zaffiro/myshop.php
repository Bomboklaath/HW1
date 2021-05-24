<?php
session_start();

//$conn = mysqli_connect("127.0.0.1","root","","web") or die(mysqli_error($conn));
if(empty($_SESSION["username"])){
 print_r('NON HAI EFFETTUATO ALCUN ACCESSO, SEZIONE NON DISPONIBILE!');
 exit;
} 


?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">

   <title> MY SHOP </title>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@200&family=Padauk&display=swap" rel="stylesheet">
   
   
   <script src="myshop.js" defer></script>
   <link rel="stylesheet" href="shop.css">
   

</head>

  <body>

      <header>
      <nav>
        <div id="logo">
          <img src="ns.png" />
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

    </div>
  </nav>
  
</header>
  

      <section>
       
      <div id="griglia">
    
      
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