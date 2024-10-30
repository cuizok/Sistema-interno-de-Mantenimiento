<?php
include('header.php');  
?>


<div class="wrapper d-flex align-items-stretch">
<?php
include('menu_opc2.php');
?>

<div id="content" class="p-4">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
<div class="container-fluid">
    <div class="row" style="width:100%; margin:0px; padding:0px;">
    <div class="col-md-1" style="height:100%; padding-top:5px;">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
    </button>
    </div>
    <div class="col-md-11" style="height:100%; margin-bottom:-15px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Sistemas</li>
        <li class="breadcrumb-item active">Nuevo ticket</li>
        <li class="ml-auto"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></li>
    </ol>
    </div>  
    </div>
</div>
</nav>
    
    
        
<div class="card mb-4" id="tblPrincipal" style="width:100%">
        <div class="card-body" align="left"> 
            <div class="table-responsive" style="width:100%;">
                
                    
                

            </div>









            </div>     


<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>
      
                                                                           

    
    
    
<!DOCTYPE html>
<html>
<head>
  <title>Página de registro</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>   
    
                              <div id="alerta"></div>

    
                        
    
    <?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
	
	
?>
    
    
   
  
        <!-- Formulario de registro -->
        <form action="./php/guardar_ticket_produccion.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
            
            <!-- Campo de entrada para la contraseña -->
          <div class="row"> 
         <div class="col-sm-3">
             
            <div class="form-group">
              <label>Quien solicita</label>
              
              <input class="form-control inputP" type="text" name="quien_solicita"  maxlength="70" required readonly
                           
				    	value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>">
              
              
            
          </div>
              </div>
            
          
          <!-- Campo de entrada para la contraseña -->
             
            </div>
              <br>
              
            
            
            
            
            <br>
            <br>
           
              
		  <!-- Campo de entrada para el equipo -->
              <div class="row"> 
           <div class="col-sm-3">
    <div class="form-group">
        <label>Folio del equipo</label>
        <input type="text" class="form-control" name="folio" id="folio" placeholder="" required>
                               <button type="button" class="btn btn-success" onclick="buscarEquipo()">Buscar</button>

    </div>
</div>


                  
                     <div class="col-sm-3">
          <div class="form-group">
              <label>Equipo</label>
            <input type="text" class="form-control" name="equipo" id="equipo" placeholder="" required readonly>


          </div>
              </div>

                  
                 
              
              
              
            <!-- Campo de entrada para el nombre de usuario -->
              <div class="col-sm-3">
          <div class="form-group">
              <label>Fecha</label>
            <input type="date" class="form-control" name="fecha"  value="<?php echo $fechaActual; ?> "
                   
                   required>
          </div>
              </div>
            
             <!-- Campo de entrada para el nombre de usuario -->
              
              
              <div class="col-sm-3">
          <div class="form-group">
              <label>Problema</label>
            <input type="text" class="form-control" name="problema" placeholder="" required>
          </div>
              </div>
            
            
                  
              
            
             
            
            
            
              
             
                  
              
               <!-- Estatus -->
<div class="col-sm-3">
    <div class="form-group">     
        <label>Estatus</label>
        <select name="estatus" class="form-control" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="ABIERTA">Abierta</option>
            <option value="CERRADA">Cerrada</option>
            <option value="PROCESO">En proceso</option>
        </select>
    </div>
</div>

              
                  
            <div class="row"> 
              <div class="col-sm-3"> 
                  
                  <p><label for="w3review">Descripcion del problema:</label></p>
        <textarea  id="w3review" name="descripcion_del_problema" rows="4" cols="130" required></textarea> <br>
                  
                  <br>
        
                  <div class="row"> 
              <div class="col-sm-3"> 
                  <p><label for="w3review">Observaciones:</label></p>
        <textarea id="w3review"  disabled  name="observaciones" rows="4" cols="130"></textarea>   
           
            
            
            
            
          <!-- Botón para enviar el formulario de registro -->
              <div class="row">
                  <div class="form-group">
<div class="col-sm-12" align="right">
          <button type="submit" class="btn btn-primary btn btn-success info" name="registro">Generar Orden</button>
    
                  </div>
              </div>
              </div>
            </div>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        
      </div>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

  
document.addEventListener('DOMContentLoaded', function() {
               const sidebar = document.getElementById('sidebar');
               const sidebarCollapse = document.getElementById('sidebarCollapse');
               const content = document.getElementById('content');
       
               sidebar.classList.remove('active');
       
               sidebarCollapse.addEventListener('click', function() {
                   sidebar.classList.toggle('active');
                   content.classList.toggle('shifted');
               });
           });
  function buscarEquipo() {
    var codigo = document.getElementById('folio').value;
    
    fetch('buscar_equipo.php?codigo=' + codigo)
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Error al buscar el equipo');
            }
            return response.text();
        })
        .then(function(data) {
            if (data.startsWith('Error')) {
                // Muestra la alerta personalizada
                document.getElementById('alerta').innerHTML = `
                    <div class="alert alert-danger" role="alert">
                        ${data}
                    </div>`;
                // Limpiar el campo de equipo
                document.getElementsByName('equipo')[0].value = '';
            } else {
                // Limpiar la alerta si se recibe un dato válido
                document.getElementById('alerta').innerHTML = '';
                document.getElementsByName('equipo')[0].value = data;
            }
        })
        .catch(function(error) {
            // Mostrar el mensaje de error como una alerta
            alert(error.message);
        });
}


</script>

</body>
</html>
