<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Materia</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="STYLESHEET" type="text/css" href="estilo.css">
   <script src="validarmateria.js"></script>
</head>

<body>
   <?php include_once 'layouts/header.php';
   ?>
   <br><br>

   <div class="container">
      <h2>Ingrese la Materia a Validar</h2>
      <form class="row g-3" name="form1" method="get" action="recepcionMaterias.php">
         <div class="col-12">
            <label for="validationDefault01" class="form-label">Nombre de la Materia:</label>
            <input type="text" class="form-control" name="materia" id="materia" value="" required>
         </div>

         <!-- Botones de acción -->
         <div>
            <tr>
               <TD colspan="2">
                  <INPUT TYPE="submit" name="insertar" value="Insertar Materia" onClick="return Validar_materia(this.form)" class="btn btn-primary">
                  <INPUT TYPE="Reset" value="borrar" class="btn btn-secondary">
               </TD>
            </tr>
         </div>
        </form>
        </div>

 <br><br>
   
     
        <td class=td><?php include_once 'layouts/footer.php'; ?></td>
      

     
        
      

</body>

</html>
