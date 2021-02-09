<?php 
session_start();

$_SESSION['tareas']= is_array($_SESSION['tareas']) ? $_SESSION['tareas'] : [];

$key= isset($_POST['tarea']) ? $_POST['tarea'] : null;

$error= '';

if(isset($_POST['Guardar'])){
    if(!empty($_POST['guardar'])){
        array_push($_SESSION['tareas'], $_POST['guardar']);
    }else{
        $error = 'campos_vacios';
    }
    
    header("location:index.php".($error ? "?error=$error" : $error));
};


if(isset($_POST['borrar'])){
    
    unset($_SESSION['tareas'][$key]);
    header('location:index.php');
}


?>