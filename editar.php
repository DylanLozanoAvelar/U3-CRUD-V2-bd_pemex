<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idEmpleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idEmpleado = $_GET['idEmpleado'];

    $sentencia = $bd->prepare("select * from tbl_empleado where idEmpleado = ?;");
    $sentencia->execute([$idEmpleado]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" required 
                        value="<?php echo $empleado->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno: </label>
                        <input type="text" class="form-control" name="apellidoPaterno" required 
                        value="<?php echo $empleado->apellidoPaterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno: </label>
                        <input type="text" class="form-control" name="apellidoMaterno" required 
                        value="<?php echo $empleado->apellidoMaterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="edad" autofocus required
                        value="<?php echo $empleado->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salario: </label>
                        <input type="number" step="0.01" class="form-control" name="salario" autofocus required
                        value="<?php echo $empleado->salario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="telefono" required 
                        value="<?php echo $empleado->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turno: </label>
                        <input type="text" class="form-control" name="turno" required 
                        value="<?php echo $empleado->turno; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idEmpleado" value="<?php echo $empleado->idEmpleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php include 'template/footer.php' ?>