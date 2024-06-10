<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Validación de Formulario</title>

   <!-- Bootstrap v5.3 css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>


<?php
include_once 'layouts/header.php';
?>
<br>
<body>

   <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="img/1.png" class="d-block w-100" alt="chica estudiando">
         </div>
         <div class="carousel-item">
            <img src="img/2.png" class="d-block w-100" alt="pasantia">
         </div>
         <div class="carousel-item">
            <img src="img/3.png" class="d-block w-100" alt="startups">
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
   <br>

   <!-- inician las cards -->
    
   <div class="container">
      <div class="row">
         <div class="col-md-4">
         <div class="card" style="width: 18rem;">
               <img src="img/meca.jpg" class="card-img-top" alt="mecatronica">
               <div class="card-body">
                  <h5 class="card-title">Mecatronica</h5>
                  <p class="card-text">La mecatrónica es una disciplina de ingeniería que combina la mecánica, la electrónica, la informática y el control para diseñar y fabricar sistemas inteligentes y automatizados.</p>
                  <a href="#formSection" class="btn btn-primary">Inscribete aca</a>
               </div>
            </div>
         </div>
         <div class="col-md-4">
         <div class="card" style="width: 18rem;">
               <img src="img/ciencia2.jpg" class="card-img-top" alt="ciencia de datos">
               <div class="card-body">
                  <h5 class="card-title">Ciencia de datos</h5>
                  <p class="card-text">La ciencia de datos es una disciplina que combina estadísticas, informática y conocimientos específicos del dominio para extraer información y conocimientos valiosos a partir de datos.</p>
                  <a href="#formSection" class="btn btn-primary">Inscribete aca</a>
                  
               </div>
            </div>
         </div>
         <div class="col-md-4">
         <div class="card" style="width: 18rem;">
               <img src="img/delitos.jpg" class="card-img-top" alt="delitos informaticos">
               <div class="card-body">
                  <h5 class="card-title">Delitos informaticos</h5>
                  <p class="card-text">Los delitos informáticos, también conocidos como ciberdelitos, son actividades ilegales llevadas a cabo utilizando computadoras o redes informáticas.</p>
                  <a href="#formSection" class="btn btn-primary">Inscribete aca</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   
<!-- Inicia formulario -->
   <div id="formSection">
       <div class="container mt-5">
       <h2>Formulario de Inscripcion</h2>
         <form class="row g-3" method="get" action="ingreso.php">
            <div class="col-12">
               <label for="validationDefault01" class="form-label">Nombre:</label>
               <input type="text" class="form-control" name="nombre" id="nombre" value="" required>
            </div>
            <div class="col-12">
               <label for="validationDefault02" class="form-label">Apellido:</label>
               <input type="text" class="form-control" name="apellidos" id="apellidos" value="" required>
            </div>
            <div class="col-12">
               <label for="validationDefault02" class="form-label">Carrera:</label>
               <input type="text" class="form-control" name="car" id="car" value="" required>
            </div>

            <div class="col-12">
               <label for="validationDefault02" class="form-label">Nro Doc:</label>
               <input type="text" class="form-control" name="nrodoc" id="nrodoc" value="" required>
            </div>

            <div class="col-12">
               <label for="validationDefault02" class="form-label">Nro Insc:</label>
               <input type="text" class="form-control" name="nroinsc" id="nroinsc" value="" required>
            </div>

            <div class="col-12">
               <label for="validationDefault02" class="form-label">Nro Cel:</label>
               <input type="text" class="form-control" name="nrocel" id="nrocel" value="" required>
            </div>



            <div class="col-12">
               <label for="validationDefault04" class="form-label">Provincia</label>
               <select class="form-select" name="provincia" id="provincia" required>
                  <option selected disabled value="">Seleccionar</option>
                  <option>Mendoza</option>
                  <option>Cordoba</option>
                  <option>San Luis</option>
                  <option>Neuquen</option>
               </select>
            </div>

            <div class="container mt-5">
               <!-- Caja de Comentarios -->
               <div class="col-12">
                  <label for="coment" class="form-label">Escribe tus comentarios aquí:</label>
                  <textarea class="form-control" name="coment" id="coment" rows="10" cols="50"></textarea>
               </div>
            </div>

            <div class="col-8">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label" for="invalidCheck2">Terminos y Condiciones</label>
               </div>
            </div>


<!-- Botones de acción -->
            <div>
               <tr>
                  <TD colspan="2">
                     <INPUT TYPE="submit" name="insertar" value="Insertar Alumno" onClick="return Validar_formulario(this.form)" class="btn btn-primary">
                     <INPUT TYPE="Reset" value="borrar" class="btn btn-secondary">
                  </TD>
               </tr>
            </div>
         </form>
      </div>
   </div>



   <!-- Bootstrap v5.3 css -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <br><br>
   <td class=td><?php include_once 'layouts/footer.php'; ?></td>

</body>

</html>
