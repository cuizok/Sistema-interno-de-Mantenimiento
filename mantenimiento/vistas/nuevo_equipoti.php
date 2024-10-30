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
        <li class="breadcrumb-item active">Nuevo equipo</li>
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
                        
    
    <?php
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
	
	
?>
    
    
   
  
        <!-- Formulario de registro -->
        <form action="./php/guardar_equipoti.php" method="POST">
          <h2 class="mt-5 mb-4"></h2>
          <!-- Campo de entrada para el nombre de usuario -->
            
            <!-- Campo de entrada para la contraseña -->
          <div class="row"> 
         <div class="col-sm-3">
             
            <div class="form-group">
              <label>Quien agrega</label>
              
              <input class="form-control inputP" type="text" name="quien_solicita"  maxlength="70" required  
                           
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
              <label>Codigo</label>
            <input type="text" class="form-control" name="codigo" placeholder="" required>
          </div>
              
              </div>
              
              
              
              <div class="col-sm-3">
          <div class="form-group">
              <label>Usuario</label>
            <input type="text" class="form-control" name="usuario" placeholder="" required>
          </div>
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Nombre del equipo</label>
            <input type="text" class="form-control" name="nombre_equipo" placeholder="" required>
          </div>
              </div>
            
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Procesador</label>
            <input type="text" class="form-control" name="procesador" placeholder="" >
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Memoria RAM</label>
            <input type="text" class="form-control" name="memoria_ram" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Marca</label>
            <input type="text" class="form-control" name="marca" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Tarjeta red</label>
            <input type="text" class="form-control" name="tarjeta_red" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Capacidad disco</label>
            <input type="text" class="form-control" name="capacidad_disco" placeholder="" >
          </div>
              
              </div>
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Tarjeta sonido</label>
            <input type="text" class="form-control" name="tarjeta_sonido" placeholder="" required>
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Monitor</label>
            <input type="text" class="form-control" name="monitor" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>WI-FI</label>
            <input type="text" class="form-control" name="wifi" placeholder="" required>
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Version Windows</label>
            <input type="text" class="form-control" name="version_windows" placeholder="" >
          </div>
              
              </div>
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Version office</label>
            <input type="text" class="form-control" name="version_office" placeholder="" required>
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Antivirus</label>
            <input type="text" class="form-control" name="antivirus" placeholder="" required>
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Otros</label>
            <input type="text" class="form-control" name="otros" placeholder="" >
          </div>
              
              </div>
                  
                  
                   <div class="col-sm-3">
          <div class="form-group">
              <label>Ubicacion</label>
            <input type="text" class="form-control" name="ubicacion" placeholder="" >
          </div>
              
              </div>
                  
                    <div class="col-sm-3">
          <div class="form-group">
              <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" placeholder="" required>
          </div>
              
              </div>
                  
                   <!-- Estatus -->
                      
                 <div class="col-sm-3">
          <div class="form-group">     
             <label>Estatus</label>
            <select name="estatus" class="form-control"  required>
  <option selected>Seleccione una opción</option>
  <option value="ACTIVO">Activo</option>
  <option value="INACTIVO">Inactivo</option>
  
</select>
                     </div></div>
                  
             
                  
            
             <div class="col-sm-3">
          <div class="form-group">
              <label>MAC</label>
            <input type="text" class="form-control" name="mac" placeholder="" required>
          </div>
              
              </div>
            
                  
            
             
            
          
              <br>
            <br>
                  
        
                  <div class="row"> 
              <div class="col-sm-3"> 
                  <p><label for="w3review">Observaciones:</label></p>
        <textarea id="w3review"   name="observaciones" rows="4" cols="130"></textarea>   
           
            
            
            
            <br>
          <!-- Botón para enviar el formulario de registro -->
              <div class="row">
                  <div class="form-group">
<div class="col-sm-12" align="right">
          <button type="submit" class="btn btn-primary btn btn-success info" name="registro">Generar Orden</button><br>
    
                  </div>
              </div>
              </div>
            </div>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        
      </div>
  
 

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
