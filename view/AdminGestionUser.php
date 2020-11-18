<?php

use modelo\UsuarioModelo as UsuarioModelo;

require_once("../modelo/UsuarioModelo.php");
    $modelo = new UsuarioModelo();
    $lista = $modelo->ListaUsuarios();

   

  
   
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
<body class="fondo">

<?php
    session_start();
    if(isset($_SESSION['usuario'])){
?>  

    <nav class="green">
        <div class="nav-wrapper">
        <a href="AdminGestionUser.php" class="brand-logo">Gestion de Usuarios</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="AdminGestionUser.php">Gestion de Usuarios</a></li>
            <li><a href="SalirAdmin.php"><i class="material-icons right">sensor_door</i>Cerrar Sesion</a></li>
        </ul>
        </div>
    </nav>

<div class="center">
       <div class="row">
           <div class="col l6 m6 s12">

               <?php if(!isset($_SESSION['editar'])) { ?>

           <h3>Crear Usuario</h3>
               <form action="../controllers/InsertAdmin.php" method="POST">

                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="rut" type="text" name="rut">
                        <label for="rut">Rut</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">face</i>
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>

                    <button class="btn green"><i class="material-icons left">person_add</i>Crear Usuario</button>

                </form>

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

            <?php }else{ ?>

                <h3>Editar Usuario</h3>
               <form action="../controllers/EditAdmin.php" method="POST">

               <input  type="hidden" name="id" value="<?= $_SESSION['user']['rut'] ?>">
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input readonly="readonly" id="rut" type="text" name="rut" value="<?= $_SESSION['user']['rut'] ?>">
                        <label for="rut">Rut</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">face</i>
                        <input readonly="readonly"  id="nombre" type="text" name="nombre" value="<?= $_SESSION['user']['nombre'] ?>">
                        <label for="nombre">nombre</label>
                    </div>

                    <div>
                        <select name="estado">
                            <option selected="true" value="" disabled >Seleccione</option>
                            <option value="1">HABILITADO</option>
                            <option value="0">BLOQUEADO</option>
                        </select>
                    </div>

                    <br>
                    <button class="btn orange"><i class="material-icons left">create</i>Editar Usuario</button>

                    

                </form>

                <?php
                    unset($_SESSION['editar']);
                    unset($_SESSION['user']);
                    
                    
                }

                ?>



           </div>

           <div class="col l6 m6 s12">
                <h3>Listado de Usuarios</h3>
            <form action="../controllers/ActionAdmin.php" method="POST">
                <table >

                    <tr>
                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>

                <?php foreach($lista as $list) { ?>

                    <tr>
                        <?php if($list["estado"] == 1) {
                            $estado = "HABILITADO";
                            $color = "black-text";
                        }else{
                            $estado = "BLOQUEADO";
                            $color = "red-text";
                        }

                        ?>
                        <td class="<?=$color?>"><?= $list["rut"]?></td>
                        <td class="<?=$color?>"><?= $list["nombre"]?></td>
                        <td class="<?=$color?>"><?= $estado?></td>
                        <td>
                            <button name="bt_edit" value="<?= $list["rut"] ?>" class="btn-floating orange">
                                <i class="material-icons">edit</i>
                            </button>
                            <button name="bt_delete" value="<?= $list["rut"] ?>" class="btn-floating red">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                        
                    </tr>

                <?php } ?>

              </table>
              </form>

            </div>
       </div>
</div>





<?php
    }else{ 
?>
    <p>
        <h3 class="red-text center">ACCESO DENEGADO!</h3>
        <h2 class="center">Debes Iniciar Sesion</h2>
        <p class="center"> <a class="center" href="../loginAdmin.php">Inicia Sesion</a></p>
           
    </p> 
<?php
    }
?> 



<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>
</body>
</html>