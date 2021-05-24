<?php
 
 session_start();
if(isset($_SESSION["username"])){
 header("Location: areariservata.php");
 exit;
}

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect("127.0.0.1", "root","","web") or die(mysqli_error($conn));
        // Preparazione 
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
     
        
        $query = "SELECT cf,password FROM commesso WHERE cf = '$username' and password='$password'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
         print(mysqli_num_rows($res));
        if (mysqli_num_rows($res) > 0) {
            $entry=mysqli_fetch_assoc($res);

           
                
            $_SESSION["username"] = $username;
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
               
                header("Location: areariservata.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            
            }
            else {
                $error="Non sei autorizzato a entrare in questa sezione";
            }
        
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
        }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }

?>


<html>
    <head>
    <link rel="stylesheet" href="login.css">
        
        <title>AREA RISERVATA- Accedi</title>
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
    <a href='login2.php' class="button">Area Riservata</a>
</div>
<div id="menu">
    <div></div>
    <div></div>
    <div></div>
  </div>
</nav>

</header>
        <main class="login">

        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>ACCEDI ALL'AREA WORKERS</h1>
            <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
            ?>
            <div class="roba">
            <form name='login' method='post'>
                <!-- Seleziono il valore di ogni campo sulla base dei valori inviati al server via POST -->
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>
                <div class="remember">
                    <div><input type='checkbox' name='remember' value="1" <?php if(isset($_POST["remember"])){echo $_POST["remember"] ? "checked" : "";} ?>></div>
                    <div><label for='remember'>Ricorda l'accesso</label></div>
                </div>
                <div>
                    <input type='submit' value="Accedi">
                </div>
            </form>
            </div>
            
        </section>
        </main>
    </body>
</html>