<?php

use modelo\ClienteModel as ClienteModel;

require_once("../modelo/ClienteModel.php");
    $modelo = new ClienteModel();
    $lista = $modelo->ListaClientes();

   

  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="fondo2">
    
<?php
    session_start();
    if(isset($_SESSION['usuario'])){
?>  
    <nav class="blue">
        <div class="nav-wrapper">
        <a href="UserGestion.php" class="brand-logo">Gestion de Clientes</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="UserGestion.php">Crear Cliente</a></li>
            <li><a href="#">Buscar Receta</a></li>
            <li><a href="#">Ingreso</a></li>
            <li><a href="SalirUser.php"><i class="material-icons right">sensor_door</i>Cerrar Sesion</a></li>
        </ul>
        </div>
    </nav>

    <div class="center">
            <div class="row">

                <div class="col l4 m4 s12">

                <h3>Crear Cliente</h3>

                <p class="red-text ">
                <?php
                if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                }
                ?>
                </p>

                <p class="blue-text ">
                <?php
                if(isset($_SESSION['respuesta'])){
                echo $_SESSION['respuesta'];
                unset($_SESSION['respuesta']);
                } 
                ?>
                </p>


               <form action="../controllers/InsertCliente.php" method="POST">
                
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="rut_cliente" type="text" name="rut_cliente">
                        <label for="rut_cliente">Rut</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">face</i>
                        <input id="nombre_cliente" type="text" name="nombre_cliente">
                        <label for="nombre_cliente">Nombre</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">explore</i>
                        <input id="direccion_cliente" type="text" name="direccion_cliente">
                        <label for="direccion_cliente">Direccion</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">phone</i>
                        <input id="telefono_cliente" type="text" name="telefono_cliente">
                        <label for="telefono_cliente">Telefono</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">calendar_today</i>
                        <input id="fecha_creacion" type="text" class="datepicker" name="fecha_creacion">   
                        <label for="fecha_creacion">Fecha</label>
                    </div>

                    

                    <div class="input-field">
                        <i class="material-icons prefix">alternate_email</i>
                        <input id="email_cliente" type="text" name="email_cliente">
                        <label for="email_cliente">Email</label>
                    </div>

                    <button class="btn green"><i class="material-icons left">person_add</i>Crear Cliente</button>

                </form>
                



                </div>

                <div class="col l4 m4 s12">
                <h3>Lista de Clientes</h3>
                <table style="width: 800px;">

                    <tr>
                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>Telefono</th>
                        <th>FECHA</th>
                        <TH>EMAIL</TH>
                    </tr>

                    <?php foreach($lista as $list) { ?>

                    <tr>
                        <td><?= $list["rut_cliente"]?></td>
                        <td><?= $list["nombre_cliente"]?></td>
                        <td><?= $list["direccion_cliente"]?></td>
                        <td><?= $list["telefono_cliente"]?></td>
                        <td><?= $list["fecha_creacion"]?></td> 
                        <td><?= $list["email_cliente"]?></td>
                    </tr>

                    <?php } ?>

                    </table>
                </div>
            </div>
    </div>




<?php
    }else{ 
?>
    <p>
        <h3 class="red-text center">ACCESO DENEGADO!</h3>
        <h2 class="center">Debes Iniciar Sesion</h2>
        <p class="center"> <a class="center" href="../loginUser.php">Inicia Sesion</a></p>
           
    </p> 

<?php
    }
?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,{
        'autoClose': true,
        'format': 'yyyy-mm-dd',
        i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                cancel: 'Cancelar',
                clear: 'Limpiar',
                done: 'Ok'
            }
    });
  });
</script>
</body>
</html>