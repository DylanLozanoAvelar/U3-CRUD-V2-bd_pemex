<?php
    print_r($_POST);
    if(!isset($_POST['idEmpleado'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idEmpleado = $_POST['idEmpleado'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];
    $telefono = $_POST['telefono'];
    $turno = $_POST['turno'];

    $sentencia = $bd->prepare("UPDATE tbl_empleado SET nombre = ?, apellidoPaterno = ?, apellidoMaterno = ?, edad = ?, salario = ?, telefono = ?, turno = ? where idEmpleado = ?;");
    $resultado = $sentencia->execute([$nombre, $apellidoPaterno, $apellidoMaterno, $edad, $salario, $telefono, $turno, $idEmpleado]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>