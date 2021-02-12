<?php 

include_once './logica.php';

if(isset($_POST['update'])){

  $_SESSION['tareas'][$_POST['key_temp']] = $_POST['tarea'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <?php 
    
   if(isset($_GET['error'])) {

        $error = $_GET['error'];

        if($error == 'campos_vacios'){
            echo "<strong style='color:red'>Introduce la tarea que quieres agregar</strong>";
        }
    }
    
    ?>

    <h1>Lista de tareas en PHP</h1>
    <label for="tarea">Agrega tu tarea</label>
        <form method="POST" action="logica.php" >
            <input type="text" placeholder="Escribe tu tarea" name="guardar"/>
            <input type="submit" value="Guardar" name="Guardar">
        </form>
    <ul>

    <?php 
    
    foreach($_SESSION['tareas'] as $key => $tarea){

        $bloqueEditar= '';

        if(isset($_POST['cargar_editar']) && isset($_POST['tarea']) && $_POST['tarea'] ==$key){

            $bloqueEditar= 

            "<form method='POST' action='index.php'>
                <input type='text' value=$tarea name='tarea'>
                <input type='hidden' value=$key name='key_temp'>
                <input type='submit' name='update' value='Update'>
            </form>
            ";     
            
        }

        echo "<li>

        <form method='POST' action ='logica.php'>
        <input type='hidden' name='tarea' value='$key'/>
        <input type='submit' name='borrar' value='Borrar'/>
        </form>

        <form action='index.php' method='POST'>
        <input type='hidden' name='tarea' value='$key'/>
        <input type='submit' name='cargar_editar' value='Editar'/>
        </form>
        $bloqueEditar

        $tarea</li>";
    }    
    ?>
    </ul>
</body>
</html>
