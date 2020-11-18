<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="admin">

<div class="container center">

<div class="row">
    <div class="col l12 m4 s12">
    <h4>Iniciar Sesion</h4>
    <h5 class="center"><i class="material-icons center">person</i></h5>
    <h3>Administrador</h3>

    <p class="red-text ">
        <?php
        session_start();
        if(isset($_SESSION['error'])){
           echo $_SESSION['error'];
           unset($_SESSION['error']);
        }
        ?>
    </p>
    

   
    <form action="controllers/LoginAdmin.php" method="POST">
                <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="rut" type="text" name="rut">
                    <label for="rut">Rut</label>
                </div>
               
                <div class="input-field">
                    <i class="material-icons prefix">fingerprint</i>
                    <input id="clave" type="password" name="clave">
                    <label for="clave">Clave</label>
                </div>

                <button class="btn green waves-effect waves-light"><i class="material-icons left">person</i>Iniciar Sesion</button>
                <br> <br>
            </form>

            <a href="index.php">Volver al menu</a>
    </div>
</div>
    
            
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
</body>
</html>