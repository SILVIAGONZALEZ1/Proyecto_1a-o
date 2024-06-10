<?php
// Incluir el archivo que permite la conexión a la base de datos
require_once('lib/dbconect.inc.php');
$mysqli = Conectarse();

// Verificar si se va a modificar un alumno
if (isset($_REQUEST['modificar']) && $_REQUEST['modificar'] == '001') {
    $walu_dni = intval($_REQUEST['walu_dni']);
    $stmt = $mysqli->prepare("SELECT * FROM alumno WHERE alu_dni = ?");
    $stmt->bind_param('i', $walu_dni);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($row = $resultado->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM ALUMNOS BELGRANO</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="ejemplos.js"></script>
</head>

<body>
     <!-- Empieza el navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" href="index.php#formSection">Inscribete aqui</a>
        
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ingreso.php">Lista de Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="materia.php">Ingresar Materia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recepcionMaterias.php">Lista de Materias</a>
          </li>

        </ul>
      </div>
    </div>
    
  </nav>
    <header class="text-center my-4">
        <img src="img/headerr.png" class="img-fluid" alt="Header Image">
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form name="form2" method="get" action="actualizar.php" class="border p-4">
                    <input id="nrodoc" name="nrodoc" type="hidden" value="<?php echo $row['alu_dni'] ?>">

                    <h3 class="text-center">ACTUALIZACIÓN DE ALUMNOS</h3>
                    <h5 class="text-center mb-4">MODIFICACIÓN DE DATOS</h5>

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['alu_nombre'] ?>" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['alu_apellido'] ?>" maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="car">Carrera:</label>
                        <input type="text" class="form-control" id="car" name="car" value="<?php echo $row['alu_carrera'] ?>" maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="nrodoc_dis">Nro Doc:</label>
                        <input type="text" class="form-control" id="nrodoc_dis" name="nrodoc_dis" value="<?php echo $row['alu_dni'] ?>" maxlength="50" disabled>
                    </div>

                    <div class="form-group">
                        <label for="nrocel">Nro Cel:</label>
                        <input type="text" class="form-control" id="nrocel" name="nrocel" value="<?php echo $row['alu_cel'] ?>" maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="nroinsc">Nro Insc:</label>
                        <input type="text" class="form-control" id="nroinsc" name="nroinsc" value="<?php echo $row['alu_insc'] ?>" maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="provincia">Provincia:</label>
                        <select class="form-control" id="provincia" name="provincia">
                            <option value="">Seleccionar</option>
                            <option value="Mendoza" <?php echo ($row['alu_provincia'] == "Mendoza") ? 'selected' : ''; ?>>Mendoza</option>
                            <option value="Cordoba" <?php echo ($row['alu_provincia'] == "Cordoba") ? 'selected' : ''; ?>>Cordoba</option>
                            <option value="San Luis" <?php echo ($row['alu_provincia'] == "San Luis") ? 'selected' : ''; ?>>San Luis</option>
                            <option value="Neuquen" <?php echo ($row['alu_provincia'] == "Neuquen") ? 'selected' : ''; ?>>Neuquen</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="coment">Comentarios:</label>
                        <textarea class="form-control" id="coment" name="coment" rows="4"><?php echo $row['alu_coment'] ?></textarea>
                    </div>

                    <button type="submit" name="Actualizar_Alumno" class="btn btn-primary btn-block" value="Actualizar Alumno">Actualizar Alumno</button>
                    
                </form>
            </div>
        </div>
    </div>

    <footer class="text-center my-4">
        <img src="img/footerr.png" class="img-fluid" alt="Footer Image">
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
    }
    $stmt->close();
} else if (isset($_REQUEST['Actualizar_Alumno']) && $_REQUEST['Actualizar_Alumno'] == 'Actualizar Alumno') {
    // Sanitize and validate inputs
    $stamp_now = time();
    $w_fec_mod = date('Y-m-d', $stamp_now);
    $walu_nro_doc = intval($_REQUEST['nrodoc']);
    $walu_nro_cel = $mysqli->real_escape_string($_REQUEST['nrocel']);
    $walu_nombre = $mysqli->real_escape_string($_REQUEST['nombre']);
    $walu_apellido = $mysqli->real_escape_string($_REQUEST['apellidos']);
    $walu_nroinsc = $mysqli->real_escape_string($_REQUEST['nroinsc']);
    $walu_provincia = $mysqli->real_escape_string($_REQUEST['provincia']);
    $walu_coment = $mysqli->real_escape_string($_REQUEST['coment']);
    $wins_cod_car = $mysqli->real_escape_string($_REQUEST['car']);

    $stmt = $mysqli->prepare("UPDATE alumno SET alu_nombre=?, alu_apellido=?, alu_provincia=?, alu_carrera=?, alu_coment=?, alu_insc=?, alu_cel=? WHERE alu_dni=?");
    $stmt->bind_param('sssssssi', $walu_nombre, $walu_apellido, $walu_provincia, $wins_cod_car, $walu_coment, $walu_nroinsc, $walu_nro_cel, $walu_nro_doc);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        echo "<script>alert('Se ha actualizado exitosamente.'); document.location.href = 'ingreso.php';</script>";
    } else {
        echo "<script>alert('Error en la actualización de datos.'); document.location.href = 'actualizar.php?modificar=001&walu_dni=$walu_nro_doc';</script>";
    }
    $stmt->close();
} else {
    echo "Archivo incorrecto";
    header("Location: ./ingreso.php");
}
?>
