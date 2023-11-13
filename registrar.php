<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["nombre"]) || empty($_POST["apellidoPaterno"]) || empty($_POST["apellidoMaterno"]) || empty($_POST["edad"]) || empty($_POST["salario"]) || empty($_POST["telefono"]) || empty($_POST["turno"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $edad = $_POST["edad"];
    $salario = $_POST["salario"];
    $telefono = $_POST["telefono"];
    $turno = $_POST["turno"];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_empleado(nombre,apellidoPaterno,apellidoMaterno,edad,salario,telefono,turno) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellidoPaterno,$apellidoMaterno,$edad,$salario,$telefono,$turno]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>