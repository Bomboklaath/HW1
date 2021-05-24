<?php
 session_start();
 if(isset($_SESSION["username"])){
    header("Location: home.php");
exit; }

    // Verifica l'esistenza di dati POST
    if ( !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]))
    {
        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "web") or die(mysqli_error($conn));
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
        
            $query = "SELECT cf FROM cliente WHERE cf = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Utente già registrato";
            }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 4) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
       
        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
           
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO cliente  VALUES('$username', '$password')";
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
        print_r($error);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
        print_r($error);
    }
       
?>
<html>
    <head>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
        <script src='signup.js' defer></script> 
        <link rel="stylesheet" href="signup.css">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>AK Informatica- Iscriviti</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
    <header>
    <nav>
<div id="Logo">
   <img src="ns.png"/>
</div>
<div id="Links">
    <a href="mhw3.php">Home</a>
    <a href='login1.php'>Account</a>
    <a href='cont.html'>Contatti</a>
</div>
<div id="menu">
    <div></div>
    <div></div>
    <div></div>
  </div>
</nav>


</header>
         <section class = "iscrizione">  
               
        <?php

       
        ?>
            <form name='iscrizione' method='post' enctype="multipart/form-data" autocomplete="off">
            <h1>Registrati!</h1>
            <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span >Nome utente non disponibile o già registrato!</span>
                </div>
               
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span>Inserisci almeno 4 caratteri.</span>
                </div>
                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                    <span>Le password non coincidono.</span>
                </div>
               
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="account">Hai gia' un account? </br><a href="login1.php">Accedi</a>
            </section>
    </body>
</html>